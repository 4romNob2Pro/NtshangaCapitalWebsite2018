<?php

    include ('command.php');
    include ('connection.php');

    class EmployeeDataMapper{
        var $Comm = new Command();
        var $Conn = new Connection();
        public function __construct(){

        }

        public function Save($Employee){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlInsertEmployee);
                $stmt->execute(
                    ['employeeId' => $Employee->Id
                    , 'firstname' => $Employee->FirstName
                    , 'lastname' => $Employee->LastName
                    , 'emplNo' => $Employee->EmpNo
                    , 'email' => $Employee->Email
                    , 'Cellphone' => $Employee->CellPhone
                    , 'accountId' => $Employee->AccountId
                    , 'addressId' => $Employee->AddressId
                    , 'lastUpdated' => $Employee->LastUpdated]);
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
            }
        }

        public function Update($Employee){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlUpdateEmployee);
                $stmt->execute(
                    ['employeeId' => $Employee->Id
                    , 'firstname' => $Employee->FirstName
                    , 'lastname' => $Employee->LastName
                    , 'emplNo' => $Employee->EmpNo
                    , 'email' => $Employee->Email
                    , 'Cellphone' => $Employee->CellPhone
                    , 'accountId' => $Employee->AccountId
                    , 'addressId' => $Employee->AddressId
                    , 'lastUpdated' => $Employee->LastUpdated]);
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
            }
        }

        public function Delete($Id){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlDeleteEmployee);
                $stmt->execute(['employeeId' => $Id]);
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
            }
        }

        public function GetEmployee($Id){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlSelectEmployee);
                $stmt->execute(['employeeId' => $Id]);
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
                return null;
            }
        }

        public function GetEmployees(){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlSelectEmployees);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
                return null;
            }
        }
    }
?>