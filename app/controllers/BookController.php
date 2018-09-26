<?php
use Phalcon\Mvc\Controller;

class BookController extends Controller
{
    public function initialize() {
        $data = new Data();
        if ($data->getName()=="")
            return $this->view->pick('404/404');
        $this->view->setVar("admin", $data->isAdmin());
        $this->view->setVar("user_name", $data->getName());
    }

    public function indexAction($id) {
        $data = new Data();
        $cons = new ViewConstructor();
        $book = $data->getBook($id);
        if (!$book)
            return $this->response->redirect("/home");
        $title = $book->name . " - " . $book->author;
        if ($book->state == "free" || $book->state == "") {
            $button = "Отложить";
            $status_text = "Свободна";
            $link = "/order/book/$book->id";
        }
        else {
            $button = "Назад";
            $status_text = "Книга занята";
            $link = $this->request->getHTTPReferer();
        }
        $description = $book->about . "<p>Фонд №" . $book->fond;
        $img = $book->img;

        $edit_link = $data->isAdmin() ? "/edit/index/".$book->id : "";
        $params = $cons->card($title, $status_text, $description, $img, $button, $link, $edit_link);
        foreach ($params as $key => $value) {
            $this->view->setVar($key, $value);
        }
    }

}