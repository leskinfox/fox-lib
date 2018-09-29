<?php
use Phalcon\Mvc\Controller;

class EditController extends Controller
{
    public function initialize() {
        $data = new Data();
        if (!$data->isAdmin())
            return $this->view->pick('404/404');
        $this->view->setVar("admin", true);
        $this->view->setVar("user_name", $data->getName());

    }

    public function indexAction($id) {
        $data = new Data();
        $book = $data->getBook($id);
        if (!$book || !$data->isAdmin())
            return $this->response->redirect("/home");
        $cons = new ViewConstructor();
        $name = $cons->input("book_name", "Название", $book->name);
        $author = $cons->input("book_author", "Автор", $book->author);
        $fond = $cons->input("fond", "Фонд", $book->fond);
        $about = $cons->multiple_input("about", "Описание", $book->about);
        $img = $cons->input("img", "URL изображения", $book->img);
        $pic = $cons->img($book->img);
        $comment = $cons->multiple_input("comment", "Комментарий", $book->comment);
        $holder_name = $cons->input("holder_name", "Имя держателя", $book->holder_name);
        $holder_contact = $cons->input("holder_contact", "Контакты держателя", $book->holder_contact);
        $state = $cons->radio(array(
            array("name"=>"busy", "label"=>"На руках"),
            array("name"=>"free", "label"=>"Свободна"),
            array("name"=>"wait", "label"=>"Ждёт")), $book->state);
        $del = $cons->checkbox("del", "Удалить", false);
        $button = $cons->button("Изменить", "right");
        $params = $cons->form("Редактирование книги", "", "post", "/edit/apply/".$id,
            array($name, $author, $fond, $about, $img, $pic, $comment,
                $holder_name, $holder_contact, $state, $del, $button));
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }

    public function applyAction($id)
    {
        $data = new Data();
        $post = $this->request->getPost();
        if ($post['del']) {
            $success = $data->delBook($id);
            if ($success)
                $msg = "Книга удалена";
            else
                $msg = "Неудача";
            $cons = new ViewConstructor();
            $params = $cons->message($msg);
            foreach ($params as $key => $value)
                $this->view->setVar($key, $value);
            return $this;
        }
        $success = $data->updateBook(array(
            "id" => $id,
            "name" => $post['book_name'],
            "author" => $post['book_author'],
            "fond" => $post['fond'],
            "about" => $post['about'],
            "img" => $post['img'],
            "holder_name" => $post['holder_name'],
            "state" => $post['radio'],
            "holder_contact" => $post['holder_contact'],
            "comment" => $post['comment']
        ));
        if ($success)
            $msg = "Книга успешно сохранена";
        else
            $msg = "Неудача";
        $cons = new ViewConstructor();
        $params = $cons->message($msg);
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }
}