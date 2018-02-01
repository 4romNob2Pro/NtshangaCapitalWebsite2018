<?PHP
// include ('connection.php');
// include ('command.php');

class CustomerDataMapper{
    public function __construct(){

    }

    public function Save($Customer,$Conn,$Comm){
        try{
            $stmt = $Conn->Connect()->prepare($Comm->SqlInsertCustomer);
            $stmt->execute(
                ['FirstName' => $Customer->FirstName
                , 'LastName' => $Customer->LastName
                , 'ContactNumber' => $Customer->Phone
                , 'AddressId' => $Customer->AddressId
                , 'LastUpdate' => date('y/m/d')
                , 'AccountId' => $Customer->AccountId
                , 'Email' => $Customer->Email]);
                return $Conn->lastInsertId();
        }catch(PDOException $e){
            echo 'ERROR: ' ."<br>" . $e->getMessage();
            return 0;
        }
    }
}
?>
