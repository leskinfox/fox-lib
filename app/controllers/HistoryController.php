<?php
use Phalcon\Mvc\Controller;

class HistoryController extends Controller
{
    public function initialize() {
        $data = new Data();
        $this->view->setVar("admin", $data->isAdmin());
        $this->view->setVar("user_name", $data->getName());
    }

    public function indexAction() {
        $data = new Data();
        $cons = new ViewConstructor();
        $orders = array_reverse($data->getOrders());
        $items = array();
        foreach($orders as $order) {
            if ($order['type'] == "book") {
                $book = $data->getBook($order['book_id']);
                $type = "Заказ<p>";
                $type.= $book ? "$book->name $book->author" : "";
            } else
                $type = "Подарок<p> $order[book_name] $order[book_author]";
            $type.= "<p>$order[date]";
            if ($order['status'] == "wait") {
                $txt ="Принято в обработку";
                $button = "delete";
            } elseif ($order['status'] == "done") {
                $txt ="Выполнено";
                $button = "delete";
            } else {
                $txt="Отменено";
                $button = "";
            }

            array_push($items, $cons->item_text_list($type, $txt, $button, "/history/cancel/$order[id]"));
        }
        if (count($items)==0) {
            $this->view->setVar("title", "Ваша история пуста :(");
        }
        $this->view->setVar("items", $items);
    }

    public function cancelAction($id) {
        $data = new Data();
        $success = $data->cancelOrder($id);
        $cons = new ViewConstructor();
        if(!$success) {
            $params = $cons->message("Произошла ошибка, попробуйте позже");
            foreach ($params as $key => $value)
                $this->view->setVar($key, $value);
        } else
            return $this->response->redirect($this->request->getHTTPReferer());
    }

}