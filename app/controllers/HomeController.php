<?php
/**
 * Created by PhpStorm.
 * User: leskinfox
 * Date: 18.08.2018
 * Time: 12:58
 */
use Phalcon\Mvc\Controller;

class HomeController extends Controller
{
    public function initialize() {
        $data = new Data();
        $this->view->setVar("admin", $data->isAdmin());
        $this->view->setVar("user_name", $data->getName());
    }

    public function indexAction() {

    }

}