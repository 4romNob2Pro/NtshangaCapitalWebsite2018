<?php
include ('errorlogger.php');
class AccountDataMapper{

    public function __construct(){
        
    }
    public function Save($Account,$Conn,$Comm){
        try{
            $stmt = $Conn->Connect()->prepare($Comm->SqlInsertAccount);
            $stmt->execute(['isConfirmed' => $Account->IsConfirmed
                , 'isLocked' => $Account->IsLocked
                , 'accountTypeId' => $Account->AccountType
                , 'lastUpdate' => $Account->LastUpdate
                , 'Username' => $Account->UserName
                , 'Password' => $Account->Password]);
                $id = $Conn->lastInsertId();
                return $id;
        }catch(PDOException $e){
            $Error = new errorlogger();
            echo $e->getMessage();
            $Error.GetErrorInfo($e->getMessage());
            return 0;
        }
    }
    public function Exist($email, $Conn, $Comm){
        try{
            $stmt = $Conn->Connect()->prepare($Comm->CheckIfAccExists);
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();
            $condition = ($stmt->fetchColumn()) ? true : false;
            return $condition;
        }catch(PDOException $e){
            $Error = new errorlogger();
            echo $e->getMessage();
            $Error.GetErrorInfo($e->getMessage());
            return false;
        }
    }
    public function PasswordMatch($email, $password, $Conn, $Comm){
        try{
            $stmt = $Conn->Connect()->prepare($Comm->CheckIfPassMatch);
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->bindParam(2, $password, PDO::PARAM_STR);
            $stmt->execute();
            $condition = ($stmt->fetchColumn()) ? true : false;
            return $condition;
        }catch(PDOException $e){
            $Error = new errorlogger();
            echo $e->getMessage();
            $Error.GetErrorInfo($e->getMessage());
            return false;
        }
    }
    public function IsConfirmed($email, $Conn, $Comm){
        try{
            $int = 1;
            $stmt = $Conn->Connect()->prepare($Comm->CheckIfPassMatch);
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->bindParam(2, $int, PDO::PARAM_INT);
            $stmt->execute();
            $condition = ($stmt->fetchColumn()) ? true : false;
            return $condition;
        }catch(PDOException $e){
            $Error = new errorlogger();
            echo $e->getMessage();
            $Error.GetErrorInfo($e->getMessage());
            return false;
        }
    }
    public function IsLocked($email, $Conn, $Comm){
        try{
            $int = 1;
            $stmt = $Conn->Connect()->prepare($Comm->CheckIfPassMatch);
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->bindParam(2, $int, PDO::PARAM_INT);
            $stmt->execute();
            $condition = ($stmt->fetchColumn()) ? true : false;
            return $condition;
        }catch(PDOException $e){
            $Error = new errorlogger();
            echo $e->getMessage();
            $Error.GetErrorInfo($e->getMessage());
            return false;
        }
    }
}
?>