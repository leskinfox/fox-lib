<?php
/**
 * Created by PhpStorm.
 * User: leskinfox
 * Date: 15.08.2018
 * Time: 10:04
 */
use Phalcon\Mvc\Model;

class Orders extends Model
{
    public $id;
    public $client_name;
    public $client_contact;
    public $date;
    public $type;
    public $book_name;
    public $book_author;
    public $book_id;
    public $comment;
    public $status;


}