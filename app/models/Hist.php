<?php
/**
 * Created by PhpStorm.
 * User: leskinfox
 * Date: 15.08.2018
 * Time: 10:03
 */
use Phalcon\Mvc\Model;

class Hist extends Model
{
    public $id;
    public $client;
    public $date;
    public $type;
    public $book_name;
    public $book_author;

    public static function getHistory ($contact)
    {
        return Hist::query()
            ->where("client = :contact:")
            ->orderBy("date DESC")
            ->limit(200)
            ->bind(array("contact" => $contact))
            ->execute();
    }
}