<?php
use Phalcon\Mvc\Controller;

class SearchController extends Controller
{
    public function indexAction() {

    }
    public function resultAction() {
        $data = $this->request->getQuery();
        $name = $data['name'];
        $author = $data['author'];
        $books = Books::query()
            ->where("name LIKE :name:")
            ->andWhere("author LIKE :author:")
            ->orderBy("name")
            ->limit(100)
            ->bind(array("name" => "%" . $name ."%", "author" => "%" . $author ."%"))
            ->execute();
        $this->view->books = $books;
       // $this->view->disable();

    }
    public  function  testAction() {
        $html = file_get_contents("https://www.labirint.ru/search/война и мир/?stype=0");
        echo $html;

    }

}