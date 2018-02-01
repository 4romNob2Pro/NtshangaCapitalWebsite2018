<?php
include ('../models/City.php');
    class CityDataMapper{
        public function __construct(){
            
        }

        public function Save($City){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlUpdateEmployee);
                $stmt->execute(['cityId' => $City->Id, 'city' => $City->city, 'provinceId' => $City->provinceId]);
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
            }
        }

        public function GetCities(){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlSelectCities);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
                return null;
            }
        }

        public function GetCity($Id){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlSelectCity);
                $stmt->execute(['cityId' => $Id]);
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
                return null;
            }
        }
    }
?>