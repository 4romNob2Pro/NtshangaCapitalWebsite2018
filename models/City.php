<?php
    class City{
        var $Id;
        var $Name;
        var $ProvinceId

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

        public function setProvinceId($param){
            $this->Id = $param;
        }
        public function getProvinceId(){
            return $this->Id;
        }
    }
?>