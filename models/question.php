<?php
class question{
  var  $Id;
   var $Question;

    
   public function construct()
   {
     $this->$Id;
     $this->$Question;

   }

   public function setId($param)
   {
      $this->Id=$param;
   }

   public function getId($param)
   {
       return $this->Id;
   }


public function setquestion($param)
{
    $this->question=$param;
}
public function get($param)
{
    return $this->question;
}














}


?>