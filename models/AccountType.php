<?php
    class AccountType{
        var $Id;
        var $Name;

        public function __construct()
        {
            
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
    }
?>