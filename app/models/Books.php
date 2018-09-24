<?php
/**
 * Created by PhpStorm.
 * User: leskinfox
 * Date: 15.08.2018
 * Time: 10:04
 */
use Phalcon\Mvc\Model;

class Books extends Model
{
    public $id;
    public $name;
    public $author;
    public $fond;
    public $about;
    public $img;
    public $holder_name;
    public $holder_contact;
    public $comment;
    public $state;
}