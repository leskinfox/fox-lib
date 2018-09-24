<?php
/**
 * @var Data $data
 */
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        $data = new Data();
        $name = $data->getCook("name");
        $contact = $data->getCook("contact");
        $data->setSes("name", $name);
        $data->setSes("contact", $contact);

        if ($name == "" || $contact == "")
            return $this->response->redirect('/login/');
        return $this->response->redirect('/home/');
    }
}