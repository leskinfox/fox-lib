<?php
/**
 * Created by PhpStorm.
 * User: leskinfox
 * Date: 21.08.2018
 * Time: 0:34
 */

use Phalcon\Mvc\Controller;

class GiftController extends Controller
{
    public function initialize() {
        $data = new Data();
        $this->view->setVar("admin", $data->isAdmin());
        $this->view->setVar("user_name", $data->getName());
    }

    public function indexAction(){
        $data = new Data();
        $cons = new ViewConstructor();
        $book_name = $cons->input("book_name", "Название");
        $book_author = $cons->input("book_author", "Автор");
        $comment = $cons->multiple_input("comment", "Комментарий");
        $user_name = $cons->input("user_name", "Ваше имя", $data->getName());
        $user_contact = $cons->et_input("user_contact", "Ваши контакты",
            "Введите телефон или e-mail", $data->getContact());
        $button = $cons->button("Подарить книгу", "right");
        $s = "Вы можете подарить библиотеке свою книгу. Для этого укажите ее название и автора, а также Ваши
        контактные данные и мы обязательно свяжемся с Вами.";
        $params = $cons->form("Подарить книгу", $s, "post", "/gift/send",
            array($book_name, $book_author, $comment, $user_name, $user_contact, $button));
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }

    public function sendAction() {
        $d = $this->request->getPost();
        $cons = new ViewConstructor();
        $data = new Data();
        $success = $data->sendGift($d["book_name"], $d["book_author"], $d["user_name"],
            $d["user_contact"], $d["comment"]);
        if($success)
            $params = $cons->message("Запрос принят, ожидайте ответа");
        else
            $params = $cons->message("Произошла ошибка, попробуйте позже");
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }

}