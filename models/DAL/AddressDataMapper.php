<?php

class AddressDataMapper{
    public function __construct(){

    }
    public function Save($Address){
        try{
            $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlInsertAddress);
            $stmt->execute();
        }catch(PDOException $e){
            echo 'ERROR: ' ."<br>" . $e->getMessage();
        }
    }
    public function GetAddress($Id){
        try{
            $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlSelectAddress);
            $stmt->execute(['addressId' => $Id]);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'ERROR: ' ."<br>" . $e->getMessage();
        }
    }
    public function UpdateAddress($Addr){
        try{
            $stmt = $this->Conn->Connect()->prepare($this->Comm->SqlUpdateAddress);
            $stmt->execute(['addressId' => $Addr->Id
            , 'address' => $Addr->Address
            , 'postCode' => $Addr->PostCode
            , 'cityId' => $Addr->CityId]);
        }catch(PDOException $e){
            echo 'ERROR: ' ."<br>" . $e->getMessage();
        }
    }
}
?>