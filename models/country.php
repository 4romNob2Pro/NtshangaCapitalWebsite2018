<?php

class country{

    var $Id;
    var $Country;

public function _Constructor($Id,$Country)
{
  $this->$Id;
  $this ->$Country;

}



    public function setid($param)
    {
        $this->$Id($param);
    }

    public function getid($param)
    {
        return $this->Id;
    }

    public function setCountry($param)
    {
        $this->$Country($param);
    }


    public function getCountry($param)
{
    return $this->$Country;
}

}

?>