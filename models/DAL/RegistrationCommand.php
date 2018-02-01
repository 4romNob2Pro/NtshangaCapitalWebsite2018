<?php

class RegistrationCommand{
    var $SqlInsertDetails = "INSERT INTO customer(CustomerId, Firstname,Lastname, lastUpdate,answerID,questionId,ContactNumber,Email) VALUES(:CustomerId, :Firstname, :Lastname, :lastUpdate,:answerID,:questionId,:ContactNumber,:Email)";
    var $SqlSelectCustomerbyId = "SELECT * FROM customer WHERE CustomerId = :CustomerId";
    var $SqlSelectallCustomer = "SELECT * FROM customer";

    
    public function __constructor(){

    }




}
?>