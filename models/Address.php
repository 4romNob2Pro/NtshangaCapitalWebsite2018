<?php
    class Address{
        var $Id;
        var $Address;
        var $PostCode;
        var $CityId;

        public function _construct($Id, $Address, $PostCode, $CityId){
            $this->Id = $Id;
            $this->Address = $ddress;
            $this->PostCode = $PostCode;
            $this->CityId = $CityId;
        }

        public function setId($param){
            $this->Id = $param;
        }
        public function getId(){
            return $this->Id;
        }

        public function setAddress($param){
            $this->Address = $param;
        }
        public function getAddress(){
            return $this->Address;
        }

        public function setPostCode($param){
            $this->PostCode = $param;
        }
        public function getPostCode(){
            return $this->PostCode;
        }
    }
?>