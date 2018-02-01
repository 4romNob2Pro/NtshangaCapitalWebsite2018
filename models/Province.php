<?php
    class Province{
        var $Id;
        var $Name;
        var $CountryId;

        public function __construct(){

        }

        public function setId($param){
            $this->Id = $param;
        }
        public function getId(){
            return $this->Id;
        }

        public function setName($param){
            $this->Name = $param;
        }
        public function getName(){
            return $this->Name;
        }

        public function setCountryId($param){
            $this->Id = $param;
        }
        public function getCountryId(){
            return $this->CountryId;
        }
    }
?>