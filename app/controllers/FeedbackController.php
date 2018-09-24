<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Phalcon\Mvc\Controller;
class FeedbackController extends Controller
{
    public function initialize() {
        $data = new Data();
        $this->view->setVar("admin", $data->isAdmin());
        $this->view->setVar("user_name", $data->getName());
    }

    private function send_mail($title, $message) {
        $data = new Data();
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = $data->getIni("mail", "host");                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $data->getIni("mail", "mail_sender");                 // SMTP username
            $mail->Password = $data->getIni("mail", "password");                          // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($data->getIni("mail", "mail_sender"), 'FOX-LIB');
            $mail->addAddress($data->getIni("mail", "mail"));     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'FOX-LIB '.strip_tags(trim($title));
            $mail->Body    = strip_tags(trim($message));
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendAction() {
        $data = new Data();
        $cons = new ViewConstructor();
        $post = $this->request->getPost();
        $success = $data->prooveCapcha($post['g-recaptcha-response']);
        if (!$success)
            return $this->response->redirect("/feedback/index/capcha_err");
        $message = "Обратная связь от " . $data->getName() . " " . $data->getContact() . " :\n $post[message]";
        $success = $this->send_mail("FOX-LIB", $message);
        if($success)
            $params = $cons->message("Запрос принят, ожидайте ответа");
        else
            $params = $cons->message("Произошла ошибка, попробуйте позже");
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }


    public function indexAction ($error="") {
        $cons = new ViewConstructor();
        $message = $cons->multiple_input("message", "Текст сообщения");
        $button = $cons->button("Отправить", "right");
        $capcha = $cons->captcha();
        $msg="";
        if ($error == "capcha_err")
            $msg="Вы не прошли провекрку на робота";
        $params = $cons->form("Обратная связь", $msg,"post", "/feedback/send/", array (
            $message, $capcha, $button));
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }

}