<?php
    include ('../models/AccountType.php');
    class AccountTypeDataMapper{
        public function __construct(){

        }

        public function Save($AccountType){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlUpdateAccountType);
                $stmt->execute(['AccountTypeId' => $AccountType->Id, 'typename' => $AccountType->Name]);
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
            }
        }

        public function GetAccountTypes(){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlSelectAccountTypes);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
                return null;
            }
        }

        public function GetAccountType($Id){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlSelectAccountType);
                $stmt->execute(['AccountTypeId' => $Id]);
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
                return null;
            }
        }
    }
?>