<?php
/**
 *      text_list [TEXT, SUBTEXT, BUTTON, LINK]*
 *      form [TITLE, DESCRIPTION, METHOD, ACTION, [element]*]
 *      message [TEXT, TEXT_LINK, LINK]
 *      img_list [TITLE, SUBTITLE, IMG, TEXT, TEXT_LINK, LINK]*
 *      card [TITLE STATUS_TEXT DESCRIPTION IMG BUTTON, LINK, IS_EDIT]
 */


class ViewConstructor
{
    public function card($title="", $status_text="", $description="", $img="", $button="", $link="", $edit_link="") {
        return array (
            "title" => $title,
            "status_text" => $status_text,
            "description" => $description,
            "img" => $img,
            "button" => $button,
            "link" => $link,
            "edit_link" => $edit_link
        );
    }
    public function item_text_list($text="", $subtext="", $button="", $link=""){
        return array (
            "text" => $text,
            "subtext" => $subtext,
            "button" => $button,
            "link" => $link
        );
    }

    public function qr() {
        return array (
            "type" => "qr"
        );
    }

    public function item_img_list($title="", $subtitle="", $img="", $text="", $text_link="", $link="", $more_link=""){
        return array (
            "title" => $title,
            "subtitle" => $subtitle,
            "img" => $img,
            "text" => $text,
            "text_link" => $text_link,
            "link" => $link,
            "more_link" => $more_link
        );
    }

    public function form ($title="", $description="", $method="", $action="", $elements){
        return array (
            "title" => $title,
            "description" => $description,
            "method" => $method,
            "action" => $action,
            "elements" => $elements,
        );
    }

    public function input ($name="", $label="", $value=""){
        return array (
            "type" => "input",
            "name" => $name,
            "label" => $label,
            "value" => $value
        );
    }

    public function checkbox ($name="", $label="", $checked=true){
        return array (
            "type" => "checkbox",
            "name" => $name,
            "label" => $label,
            "checked" => $checked
        );
    }

    public function radio ($items = array(), $checked=""){
        return array (
            "type" => "radio",
            "items" => $items,
            "checked" => $checked
        );
    }

    public function et_input ($name="", $label="", $error="", $value=""){
        return array (
            "type" => "et_input",
            "name" => $name,
            "label" => $label,
            "value" => $value,
            "error" => $error
        );
    }

    public function multiple_input ($name="", $label="", $value=""){
        return array (
            "type" => "multiple_input",
            "name" => $name,
            "label" => $label,
            "value" => $value,
        );
    }

    public function captcha (){
        return array (
            "type" => "captcha",
        );
    }

    public function button ($label="", $align=""){
        return array (
            "type" => "button",
            "label" => $label,
            "align" => $align,
        );
    }

    public function img ($img=""){
        return array (
            "type" => "img",
            "img" => $img,
        );
    }

    public function message($text="", $text_link="на главную", $link="/home", $img=""){
        return array (
            "img" => $img,
            "text" => $text,
            "text_link" => $text_link,
            "link" => $link,
        );
    }

}