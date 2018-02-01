<?php
    class ProvinceDataMapper{
        public function __construct(){
            
        }

        public function Save($Province){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlInsertProvince);
                $stmt->execute(['provinceId' => $Province->Id, 'province' => $Province->city, 'countryId' => $Province->provinceId]);
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
            }
        }

        public function GetProvincies(){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlSelectProvincies);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
                return null;
            }
        }

        public function GetProvince($Id){
            try{
                $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlSelectProvince);
                $stmt->execute(['provinceId' => $Id]);
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'ERROR: ' ."<br>" . $e->getMessage();
            }
        }
    }
?>