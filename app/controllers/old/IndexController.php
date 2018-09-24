<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    private function getCook($name) {
        if($this->cookies->has($name))
            return $this->cookies->get("name")->getValue();
        return "";
    }

    private function getSes($name) {
        if($this->session->has($name))
            return $this->session->get("name");
        return "";
    }

    private function setSes($name, $value) {
        $this->session->set($name,  $value);
    }

    private function setCook($name, $value) {
        $this->cookies->set($name,  $value);
    }

    
    public function indexAction()
    {
        if($this->cookies->has("name"))
            $this->view->name = $this->cookies->get("name")->getValue();
        else
            $this->view->name = "";
        if($this->cookies->has("contact"))
            $this->view->contact = $this->cookies->get("contact")->getValue();
        else
            $this->view->contact = "";
    }
    public function signinAction() {
        $ini = parse_ini_file("../app/conf.ini",true);
        $admin_name = $ini["admin"]["name"];
        $admin_psw = $ini["admin"]["password"];
        $data = $this->request->getPost();
        if (!$data["name"]) {
            $this->view->message = "Вы не ввели имя :(";
            return;
        }

        if (!$data["contact"]) {
            $this->view->message = "Вы не указали контакты :(";
            return;
        }

        $this->cookies->set("name", $data["name"], time() + 15 * 86400);
        $this->cookies->set("contact", $data["contact"], time() + 15 * 86400);
        $this->session->set("name",  $data["name"]);
        $this->session->set("contact",  $data["contact"]);
        if ($data["name"]==$admin_name && $admin_psw == sha1($data["contact"])) {
            $this->session->set("mode", "admin");
            return $this->response->redirect('/admin/home/');
        } else {
            $this->session->set("mode",  "user");
            return $this->response->redirect('/user/home/');
        }
    }
}