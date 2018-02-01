<?php

//include 'customer.php';
//include '../Models/DAL/RegistrationCommand.php';
//include '../dbConnection.php';

require 'customer.php';
require 'DAL/RegistrationCommand.php';
require '../dbConnection.php';

  class registerdataMapper{
public function _constructor()
{

}


public function registerCustomer($customer)
{
   $comm = new registerationCommand();
   $con = new Connection();
   try{
    $stmt = $Conn->Connect()->prepare($Comm->SqlInsertDetails);
    $stmt->execute(
        ['CustomerId' => $customer->Id
        , 'FirstName' => $customer->FirstName
        , 'LastName' => $customer->LastName
        , 'ContactNumber' => $customer->ContactNumber
        , 'Email'=>$customer->Email
        , 'AddressId'=>$customer->AddressId
        , 'Lastupdate'=>$customer->Lastupdate
        , 'AccountId'=>$customer->AccountId
        , 'QuestionId'=>$customer->QuestionId
        , 'AnswerId'=>$customer->AnswerId
        ]);
        
}catch(PDOException $e){
    echo 'ERROR: ' ."<br>" . $e->getMessage();
}




}



  }





?>