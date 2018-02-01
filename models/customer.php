<?php

class Customer{
    var $Id;
    var $AccountId;
    var $FirstName;
    var $LastName;
    var $Phone;
    var $AddressId;
    var $Email;
    var $LastUpdate;

    public function __construct($Id, $AccountId, $FirstName, $LastName, $Phone, $AddressId, $Email){
        $this->Id = $Id;
        $this->AccountId = $AccountId;
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Phone = $Phone;
        $this->AddressId = $AddressId;
        $this->Email = $Email;
    }

    public function getId(){
        return $this->Id;
    }
    public function setId($param){
        $this->Id = $param;
    }

    public function getAccountId(){
        return $this->AccountId;
    }
    public function setAccountId($param){
        $this->AccountId = $param;
    }

    public function getFirstName(){
        return $this->FirstName;
    }
    public function setFirstName($param){
        $this->FirstName = $param;
    }

    public function getLastName(){
        return $this->LastName;
    }
    public function setLastName($param){
        $this->LastName = $param;
    }

    public function getPhone(){
        return $this->Phone;
    }
    public function setPhone($param){
        $this->Phone = $param;
    }

    public function getAddressId(){
        return $this->AddressId;
    }
    public function setAddressId($param){
        $this->AddressId = $param;
    }

    public function getEmail(){
        return $this->Email;
    }
    public function setEmail($param){
        $this->Email = $param;
    }
    
    public function getLastUpdate(){
        return $this->LastUpdate;
    }
    public function setLastUpdate($param){
        $this->LastUpdate = $param;
    }
}




?>