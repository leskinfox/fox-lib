<?php
use Phalcon\Mvc\Controller;

class DescriptionController extends Controller
{
    public function initialize() {
        $data = new Data();
        $this->view->setVar("admin", $data->isAdmin());
        $this->view->setVar("user_name", $data->getName());
    }

    public function searchAction($id) {
        $data = new Data();
        $book = $data->getBook($id);
        if(!$book)
            return $this->response->redirect("/book/index/id");
        $url1 = "https://www.labirint.ru/search/$book->name $book->author";
        $start1 = "<div class=\"products-row \" >
														<div class=\"product \" data-product-id=\"";
        $end1 = "\"";
        $str1 = $data->grab($url1, $start1, $end1);
        $url2 = "https://www.labirint.ru/books/".$str1;
        $start2 ="<div id=\"product-about\">";
        $end2 = "</div>";
        $about = $data->grab($url2, $start2, $end2);
        $start3="<meta name=\"twitter:image\" content=\"";
        $img=$data->grab($url2, $start3, $end1);
        $local_img = "./img/covers/".$str1;
        file_put_contents($local_img, file_get_contents($img));

        $success = $data->updateBook(array(
            "id" => $id,
            "about" => $about,
            "img" => "/public/img/covers/$str1"
        ));
        if ($success)
             return $this->response->redirect("/edit/index/$id");
        $cons = new ViewConstructor();
        $params = $cons->message("Описание не удалось найти");
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }

}