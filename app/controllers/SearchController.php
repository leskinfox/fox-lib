<?php
use Phalcon\Mvc\Controller;

class SearchController extends Controller
{
    public function initialize() {
        $data = new Data();
        $this->view->setVar("admin", $data->isAdmin());
        $this->view->setVar("user_name", $data->getName());
    }

    public function indexAction() {
        $cons = new ViewConstructor();
        $input_name = $cons->input("book_name", "Название");
        $input_author = $cons->input("book_author", "Автор");
        $button = $cons->button("Найти", "right");
        $params = $cons->form("Поиск книги", "", "get", "/search/result",
            array($input_name, $input_author, $button));
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }

    public function resultAction() {

        $cons = new ViewConstructor();
        $data = new Data();
        $form_data = $this->request->getQuery();
        $book_name = $form_data['book_name'];
        $book_author = $form_data['book_author'];
        $books = $data->getBookList($book_name, $book_author);
        $items = array();
        foreach ($books as $book) {
            if ($book->state == "" || $book->state =="free") {
                $text_link = "Хочу прочитать";
                $link = "/order/book/" . $book->id;
            } else {
                $text_link = "Подробнее...";
                $link = "/book/index/" . $book->id;
            }
            $more_link = "/book/index/" . $book->id;
            $item = $cons->item_img_list($book->name, $book->author." (".$book->fond.")",
                $book->img, $book->about, $text_link, $link, $more_link);
            array_push($items, $item);
        }
        if (count($items)==0) {
            $this->view->setVar("title", "Ничего не найдено :(");
        }

        $this->view->setVar("items", $items);
    }
}