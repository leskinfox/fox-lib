<?php
use Phalcon\Mvc\Controller;
class CreateController extends Controller
{
    public function initialize() {
        $data = new Data();
        if (!$data->isAdmin())
            return $this->view->pick('404/404');
        $this->view->setVar("admin", true);
        $this->view->setVar("user_name", $data->getName());

    }

    public function indexAction() {
        $cons = new ViewConstructor();
        $name = $cons->input("book_name", "Название");
        $author = $cons->input("book_author", "Автор");
        $fond = $cons->input("fond", "Фонд");
        $about = $cons->multiple_input("about", "Описание");
        $img = $cons->input("img", "URL изображения");
        $checkbox = $cons->checkbox("search_about", "Найти описание в интернете?");
        $comment = $cons->multiple_input("comment", "Комментарий");
        $button = $cons->button("Добавить", "right");
        $params = $cons->form("Добавление книги", "", "post", "/create/apply",
            array($name, $author, $fond, $about, $img, $checkbox, $comment, $button));
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }

    public function applyAction() {
        $post = $this->request->getPost();
        $data = new Data();
        $id = $data->createBook(array(
            "name" => $post['book_name'],
            "author" => $post['book_author'],
            "fond" => $post['fond'],
            "about" => $post['about'],
            "img" => $post['img'],
            "comment" => $post['comment']
        ));

        if (!$id) {
            $cons = new ViewConstructor();
            $params = $cons->message("Не удалось создать книгу");
            foreach ($params as $key => $value)
                $this->view->setVar($key, $value);
            return;
        }

        if ($post['search_about'])
            return $this->response->redirect("/description/search/$id");

        $cons = new ViewConstructor();
        $params = $cons->message("Книга успешно сохранена");
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }
}