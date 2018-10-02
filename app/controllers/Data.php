<?php

use  Phalcon\Di\Injectable;

class Data extends Injectable
{
    private $ini=null;

    public function prooveCapcha($response) {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe',
            'response' => $response
        );
        $options = array(
            'http' => array (
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success=json_decode($verify);
        return $captcha_success->success;
    }

    public function grab($url, $start, $end) {
        $str = mb_convert_encoding(file_get_contents($url), 'HTML-ENTITIES', "UTF-8");
        $arr1 = explode($start, $str, 2);
        if (count($arr1)<2)
            return "";
        $arr2 = explode($end, $arr1[1], 2);
        if (count($arr2)<2)
            return "";
        return strip_tags($arr2[0]);
    }

    public function createBook($arr){
        $book = new Books();
        if (!$book->create($arr))
            return 0;
        return $book->id;
    }

    public function updateBook($arr){
        $book = $this->getBook($arr["id"]);
        return $book->update($arr);
    }

    public function bookBook($id) {
        $orders = new Orders();
        $book = $this->getBook($id);
        if (!$book)
            return 0;
        if ($book->state!="" && $book->state!="free")
            return 0;
        if (!$this->updateBook(array(
            "id"=>$id,
            "state" => "wait"
        )))
            return 0;
        $d = date('d-m-Y H:i:s');
        return $orders->save(array(
            "client_name" => $this->getName(),
            "client_contact" => $this->getContact(),
            "date" => $d,
            "book_id" => $id,
            "type" => "book",
            "status" => "wait"
        ));
    }

    public function getIni($section, $field) {
        if (!$this->ini)
            $this->ini = parse_ini_file("../app/conf.ini",true);
        return $this->ini[$section][$field];
    }

    public function getBookList($book_name, $book_author)
    {
        return Books::query()
            ->where("name LIKE :name:")
            ->andWhere("author LIKE :author:")
            ->orderBy("name")
            ->limit(100)
            ->bind(array("name" => "%" . $book_name ."%", "author" => "%" . $book_author ."%"))
            ->execute();
    }

    public function getOrdersCount() {
        $orders = Orders::find(["client_name = '".$this->getName().
            "' AND client_contact = '".$this->getContact()."' AND status = 'wait'"]);
        return count($orders);
    }

    public function getBook($id)
    {
        return Books::query()
            ->where("id = :id:")
            ->bind(array("id" => $id))
            ->execute()->getFirst();
    }

    public function delBook($id)
    {
        return Books::query()
            ->where("id = :id:")
            ->bind(array("id" => $id))
            ->execute()->getFirst()->delete();
    }

    public function sendGift($book_name, $book_author, $user_name, $user_contact, $comment)
    {
        $orders = new Orders();
        $d = date('d-m-Y H:i:s');
        return $orders->save(array(
            "client_name" => $user_name,
            "client_contact" => $user_contact,
            "book_name" => $book_name,
            "book_author" => $book_author,
            "comment" => $comment,
            "date" => $d,
            "status" => "wait",
            "type" => "gift"
        ));
    }

    public function getHist() {
        $name = $this->getName();
        $contact = $this->getContact();
        return Orders::query()
            ->where("client_name = :name:")
            ->andWhere("client_contact = :contact:")
            ->orderBy("date")
            ->limit(100)
            ->bind(array("name" => $name, "contact" => $contact))
            ->execute()->toArray();
    }

    public function getOrders() {
        return Orders::query()
            ->where("status = 'wait'")
            ->orderBy("date")
            ->execute()->toArray();
    }

    public function getOrder($id) {
        return Orders::query()
            ->where("id = :id:")
            ->bind(array("id" => $id))
            ->execute()->getFirst();
    }



    public function cancelOrder($id) {
        $d = date('d-m-Y H:i:s');
        $order = Orders::query()
            ->where("id = :id:")
            ->bind(array("id" => $id))
            ->execute()->getFirst();
        $book_id = $order->book_id;
        if ($book_id)
            $this->updateBook(array( 'id'=>$book_id, 'state'=>'free', 'holder_name'=>'', 'holder_contact'=>''));
        return $order->update(array("status" => "cancel", "date" => $d));
    }


    public function getName(){
        return $this->getSes("name");
    }

    public function getContact(){
        return $this->getSes("contact");
    }




    public function setCook($name, $value)
    {
        $this->cookies->set($name, $value);
    }

    public function setSes($name, $value)
    {
        $this->session->set($name, $value);
    }

    public function getCook($name)
    {
        if ($this->cookies->has($name))
            return $this->cookies->get($name)->getValue();
        return "";
    }

    public function getSes($name)
    {
        if ($this->session->has($name))
            return $this->session->get($name);
        return "";
    }

    public function isAdmin(){
        $adm = $this->getSes('adm');
        if ($adm)
            return true;
        return false;
    }
}