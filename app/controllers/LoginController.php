<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        $data = new Data();
        $this->view->setVar("name", $data->getCook("name"));
        $this->view->setVar("contact", $data->getCook("contact"));
    }

    public function goAction ()
    {
        $data = new Data();
        $form_data = $this->request->getPost();
        $name = $form_data['name'];
        $contact = $form_data['contact'];
        $data->setSes('name', $name);
        $data->setSes('contact', $contact);
        $data->setCook('name', $name);
        $data->setCook('contact', $contact);
        $admin_name = $data->getIni("admin", "name");
        $admin_psw = $data->getIni("admin", "password");
        if ($admin_name == $name && $admin_psw == sha1($contact))
            $data->setSes('adm', true);
        else
            $data->setSes('adm', false);
        return $this->response->redirect('/home/');
    }

    public function exitAction () {
        $data = new Data();
        $data->setSes('name', '');
        $data->setSes('contact', '');
        return $this->response->redirect('/login/');
    }





}