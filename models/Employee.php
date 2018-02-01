<?php
    class Employee{
        var $Id;
        var $FirstName;
        var $LastName;
        var $EmpNo;
        var $Email;
        var $CellPhone;
        var $AccountId;
        var $AddressId;
        var $LastUpdated;

        public function __construct(){

        }

        public function setId($param){
            $this->Id = $param;
        }
        public function getId($param){
            return $this->Id;
        }

        public function setFirstName($param){
            $this->FirstName = $param
        }
        public function getFirstName(){
            return $this->FirstName;
        }

        public function setLastName($param){
            $this->LastName = $param
        }
        public function getLastName(){
            return $this->LastName;
        }

        public function setEmpNo($param){
            $this->EmpNo = $param
        }
        public function getEmpNo(){
            return $this->EmpNo;
        }

        public function setEmail($param){
            $this->Email = $param
        }
        public function getEmail(){
            return $this->Email;
        }

        public function setCellPhone($param){
            $this->CellPhone = $param
        }
        public function getCellPhone(){
            return $this->CellPhone;
        }

        public function setAccountId($param){
            $this->AccountId = $param
        }
        public function getAccountId(){
            return $this->AccountId;
        }

        public function setAddressId($param){
            $this->AddressId = $param
        }
        public function getAddressId(){
            return $this->AddressId;
        }

        public function setLastUpdated($param){
            $this->LastUpdated = $param
        }
        public function getAddressId(){
            return $this->LastUpdated;
        }
    }
?>