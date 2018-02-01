<?php

class answer{

    var $Id;
    var $AccountId;
    var $QuestionId;
    var $Answer;


public function _Construct($Id,$AccountId,$QuestionId,$Answer)
{
    $this ->$Id;
    $this ->$Account;
    $this ->$Question;
    $this ->$Answer;

}




    public function setId($param)
    {
        $this->$Id($param);
    }
    public function getId($param)
    {
        return $this->$Id;
    }

    public function setAccountId($param)
    {
        $this->$AccountId($param);
    }

    public function getAccountId($param)
    {
        return $this->$AccountId;
    }
    public function setQuestionId($param)
    {
        $this->$QuestionId($param);
    }
    public function getQuestionId($param)
    {
        return $this->QuestionId;
    }
    public function setAnswer($param)
    {
        $this->$answer($param);
    }
    public function getanswer($param)
    {
        return $this->$Answer;
    }

    



}
?>