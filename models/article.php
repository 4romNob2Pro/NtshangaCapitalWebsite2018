<?php
class Article{

    // PROPERTIES
    var $id;
    var $person_id;
    var $title;
    var $intro;
    var $descr;

    // CONSTRUCTORS
    
    public function __construct($param_person_id, $param_title, $param_intro, $param_descr)
    {
        $this->person_id = $param_person_id;
        $this->title = $param_title;
        $this->intro = $param_intro;
        $this->descr = $param_descr;
    }

    // GETTERS AND SETTERS
    public function SetId($param){
        $this->id = $param;
    }
    public function GetId(){
        return $this->id;
    }
    public function SetPersonId($param){
        $this->person_id = $param;
    }
    public function GetPersonId(){
        return $this->person_id;
    }

    public function SetTitle($param){
        $this->title = $param;
    }
    public function GetTitle(){
        return $this->title;
    }

    public function SetIntro($param){
        $this->intro = $param;
    }
    public function GetIntro(){
        return $this->intro;
    }

    public function SetDescr($param){
        $this->descr = $param;
    }
    public function GetDescr(){
        return $this->descr;
    }
}
?>