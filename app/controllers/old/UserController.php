<?php

use Phalcon\Mvc\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;





class UserController extends Controller
{
    private function send_mail($title, $message) {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.yandex.ru';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'muzicazub@yandex.ru';                 // SMTP username
            $mail->Password = '89134574718';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('muzicazub@yandex.ru', 'FOX-LIB');
            $mail->addAddress('auzubarev@gmail.com');     // Add a recipient

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

    private function getName() {
        if($this->session->has("name"))
            return $this->session->get("name");
        return "";
    }

    private function getContact() {
        if($this->session->has("contact"))
            return $this->session->get("contact");
        return "";
    }

    public function homeAction(){

    }

    public function giftAction(){
        $input_name = Parts::input("name", "Название");
        $input_author = Parts::input("author", "Автор");
        $input_user_name = Parts::input("user_name", "Ваше имя", $this->getName());
        $input_user_contact = Parts::et_input("user_contact", "Телефон или e-mail",
            "Неккоректный телефон или адрес", $this->getContact());
        $button = Parts::button("Подарить", "right");
        $elements = array($input_name, $input_author, $input_user_name, $input_user_contact, $button);
        $title = "Подарить книгу";
        $description = "Мы всегда рады новым книгам в нашей библиотеке. Введите данные о книге и Ваши контакты и мы свяжися с вами";
        $params = Parts::form($title, $description, "post", "/user/send_gift", $elements);

        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);

    }

    public function send_giftAction() {
        $d = date('d-m-Y H:i:s');
        $data = $this->request->getPost();
        $order = new Orders();
        $success = $order->save(array(
            "client_name" => $data["user_name"],
            "client_contact" => $data["user_contact"],
            "book_name" => $data["name"],
            "book_author" => $data["author"],
            "date" => $d,
            "type" => "gift"
        ));
        $hist = new Hist();
        $hist->save(array(
            "client" => $data["user_contact"],
            "book_name" => $data["name"],
            "book_author" => $data["author"],
            "date" => $d,
            "type" => "gift"
        ));

        if ($success)
            $params = Parts::message("Спасибо за подарок!");
        else
            $params = Parts::message( "Что-то пошло не так попробуйте позже");
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }

    public function feedbackAction() {
        $this->view->name = $this->getName();
        $this->view->contact = $this->getContact();
       // $this->request->getQuery()["s"]=="captcha_error"

    }

    public function send_feedbackAction() {
        $this->view->name = $this->getName();
        $this->view->contact = $this->getContact();


        $data = $this->request->getPost();
        $response = $data["g-recaptcha-response"];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe',
            'response' => $response
        );
        $options = array(
            'http' => array (
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success=json_decode($verify);

        if (!$captcha_success->success) {
            $this->view->message = "Вы не прошли проверку";
            return;
        }
        $message = "Обратная связь от ".$data["name"]." ".$data["contact"].":\n".$data["message"];
        $success = $this->send_mail($data["subject"], $message);
        if ($success)
            $this->view->message = "Сообщение успешно отправленно";
        else
            $this->view->message = "Что-то пошло не так попробуйте позже";

    }

    public function historyAction() {
        $contact = $this->getContact();
        $history = Hist::getHistory($contact);

        $items = array();
        foreach ($history as $h) {
            if($h->type == "gift")
                $s = "Подарена книга:<br>";
            elseif($h->type == "stored")
                $s = "Отправленна в резерв книга:<br>";
            elseif($h->type == "take")
                $s = "Взята книга:<br>";
            else
                $s = "Возвращенна книга:<br>";
            $s=$s."$h->book_author<br> $h->book_name<br>";
            $item = Parts::item_text_list($s, $h->date, "history");
            array_push($items, $item);
        }
        $this->view->items = $items;
    }


}