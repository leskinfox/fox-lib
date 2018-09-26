<?php
use Phalcon\Mvc\Controller;

class OrdersController extends Controller
{
    public function initialize() {
        $data = new Data();
        if (!$data->isAdmin())
            return $this->view->pick('404/404');
        $this->view->setVar("admin", true);
        $this->view->setVar("user_name", $data->getName());

    }

    public function cancelAction($id) {
        $data = new Data();
        $data->cancelOrder($id);
        return $this->response->redirect($this->request->getHTTPReferer());
    }

    public function addAction($id) {
        $data = new Data();
        $order = $data->getOrder($id);
        $comment = "Книга была подарена $order->client_name $order->client_contact";
        $book_id = $data->createBook(array(
            "fond" => "",
            "about" => "",
            "img" => "",
            "name" => $order->book_name,
            "author" => $order->book_author,
            "comment" => $comment
        ));
        $data->cancelOrder($id);
        return $this->response->redirect("/description/search/$book_id");

    }

    public function bookAction($id) {
        $data = new Data();
        $order = $data->getOrder($id);
        $book_id = $order->book_id;
        $state = 'busy';
        $data->updateBook(array(
            "id" => $book_id,
            "holder_name" => $order->client_name,
            "state" => $state,
            "holder_contact" => $order->client_contact
        ));
        $data->cancelOrder($id);
        return $this->response->redirect("/edit/index/$book_id");
    }

    public function indexAction() {
        $data = new Data();
        $cons = new ViewConstructor();
        $items = array();
        $orders = $data->getOrders();
        foreach($orders as $order){
            $type = $order['type'];
            if ($type == "book") {
                $title = "Заказ";
                $book = $data->getBook($order['book_id']);
                $title.= "<p>$book->author $book->name";
                $title.="<p><a href=\"/orders/book/$order[id]\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">Обработать</a>";
                $title.="<p><a href=\"/orders/cancel/$order[id]\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">Отменить</a>";
                array_push($items, $cons->item_text_list($title));
            }
            if ($type == "gift") {
                $title = "Подарок";
                $title.= "<p>$order[book_author] $order[book_name]";
                $title.="<p><a href=\"/orders/add/$order[id]\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">Добавить книгу</a>";
                $title.="<p><a href=\"/orders/cancel/$order[id]\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">Отменить</a>";
                array_push($items, $cons->item_text_list($title));
            }
        }
        if (count($items)==0) {
            $this->view->setVar("title", "Заказов нет :)");
        }
        $this->view->setVar("items", $items);
    }
}