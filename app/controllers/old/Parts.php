<?php
/**
 *      text_list [TEXT, SUBTEXT, BUTTON, LINK]*
 *      form [TITLE, DESCRIPTION, METHOD, ACTION, [element]*]
 *      message [TEXT, TEXT_LINK, LINK]
 *      img_list [TITLE, SUBTITLE, IMG, TEXT, TEXT_LINK, LINK]*
 */


class Parts
{
    public static function item_text_list($text="", $subtext="", $button="", $link=""){
        return array (
            "text" => $text,
            "subtext" => $subtext,
            "button" => $button,
            "link" => $link
        );
    }

    public static function item_img_list($title="", $subtitle="", $img="", $text="", $text_link="", $link=""){
        return array (
            "title" => $title,
            "subtitle" => $subtitle,
            "img" => $img,
            "text" => $text,
            "text_link" => $text_link,
            "link" => $link
        );
    }

    public static function form ($title="", $description="", $method="", $action="", $elements){
        return array (
            "title" => $title,
            "description" => $description,
            "method" => $method,
            "action" => $action,
            "elements" => $elements,
        );
    }

    public static function input ($name="", $label="", $value=""){
        return array (
            "type" => "input",
            "name" => $name,
            "label" => $label,
            "value" => $value
        );
    }

    public static function et_input ($name="", $label="", $error="", $value=""){
        return array (
            "type" => "et_input",
            "name" => $name,
            "label" => $label,
            "value" => $value,
            "error" => $error
        );
    }

    public static function multiple_input ($name="", $label="", $value=""){
        return array (
            "type" => "et_input",
            "name" => $name,
            "label" => $label,
            "value" => $value,
        );
    }

    public static function captcha (){
        return array (
            "type" => "captcha",
        );
    }

    public static function button ($label="", $align=""){
        return array (
            "type" => "button",
            "label" => $label,
            "align" => $align,
        );
    }

    public static function message($text="", $text_link="на главную", $link="/user/home"){
        return array (
            "text" => $text,
            "text_link" => $text_link,
            "link" => $link,
        );
    }

}