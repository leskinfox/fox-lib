<?php
use Phalcon\Mvc\Controller;
define("ORDERS_LIMIT",     3);

class OrderController extends Controller
{
    public function initialize() {
        $data = new Data();
        if ($data->getName()=="")
            return $this->view->pick('404/404');
        $this->view->setVar("admin", $data->isAdmin());
        $this->view->setVar("user_name", $data->getName());
    }

    public function bookAction ($id) {
        $data = new Data();
        $cons = new ViewConstructor();
        if ($data->getOrdersCount() > ORDERS_LIMIT) {
            $params = $cons->message("Превышен лимит");
            foreach ($params as $key => $value)
                $this->view->setVar($key, $value);
            return $this;
        }
        $success = $data->bookBook($id);
        if($success)
            return $this->response->redirect($this->request->getHTTPReferer());
        $params = $cons->message("Произошла ошибка, попробуйте позже");
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);
    }

}