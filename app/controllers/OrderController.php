<?php
use Phalcon\Mvc\Controller;

class OrderController extends Controller
{
    public function initialize() {
        $data = new Data();
        $this->view->setVar("admin", $data->isAdmin());
        $this->view->setVar("user_name", $data->getName());
    }

    public function bookAction ($id) {
        $data = new Data();
        $success = $data->bookBook($id);
        $cons = new ViewConstructor();
        if($success)
            return $this->response->redirect($this->request->getHTTPReferer());
        $params = $cons->message("Произошла ошибка, попробуйте позже");
        foreach ($params as $key => $value)
            $this->view->setVar($key, $value);


    }

}