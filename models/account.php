<?php
class account{

    var $Id;
    var $IsConfirmed;
    var $IsLocked;
    var $AccountType;
    var $LastUpdate;
    var $UserName;
    var $Password;

    public function __construct($Id,$IsConfirmed,$IsLocked,$AccountType,$LastUpdate,$UserName,$Password)
    {
        $this->Id = $Id;
        $this->IsConfirmed = $IsConfirmed;
        $this->IsLocked = $IsLocked;
        $this->AccountType = $AccountType;
        $this->LastUpdate = $LastUpdate;
        $this->UserName = $UserName;
        $this->Password = $Password;
    }
    //----------------
    public function setId($parama)
    {
        $this->Id = $param;
    }
    public function getId()
    {
        return $this->Id;
    }
    //--------------------------
    public function setUserName($parama)
    {
        $this->UserName = $param;
    }
    public function getUserName()
    {
        return $this->UserName;
    }
    //-----------------------------
    public function setPassword($parama)
    {
        $this->Password = $param;
    }
    public function getPassword()
    {
        return $this->Password;
    }
    //-----------------------------
    public function setisConfirmed($parama)
    {
        $this->IsConfirmed = $param;
    }
    public function getisConfirmed()
    {
        return $this->IsConfirmed;
    }
    //--------------------------------
    public function setisLocked($parama)
    {
        $this->isLocked = $param;
    }
    public function getisLocked()
    {
        return $this->isLocked;
    }
    //-------------------------------------
    public function setAccountType($parama)
    {
        $this->AccountType = $param;
    }
    public function getAccountType()
    {
        return $this->AccountType;
    }
    //------------------------------------
    public function setLastUpdate($parama)
    {
        $this->LastUpdate = $param;
    }
    public function getLastUpdate()
    {
        return $this->LastUpdate;
    }
}
?>