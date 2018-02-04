<?php
Session_Start();
include ('models/AccountUID.php');
include ('models/DAL/Connection.php');
include ('models/DAL/Command.php');
include ('models/DAL/AccountDataMapper.php');
include ('models/DAL/AccountUIDDataMapper.php');

$Comm = new Command();
$Conn = new Connection();
$acc_datamapper = new AccountDataMapper();
$validate = new Validate();
$accountUID = new AccountUID();
$accUIDDataMapper = new AccountUIDDataMapper();

if(!isset($_POST['findaccount'])){
    header('Location: findaccount.html');
}
else{
    if($validate->EmailMissing()){
        header('Location: findaccount.html?msg=Email is required');
    }else{
        try{
            $AccId = $acc_datamapper->GetAccountId($validate->GetEmail(), $Conn, $Comm);
            if($AccId > 0){
                $accUIDDataMapper->DeleteUID($AccId, $Conn, $Comm);
                $accUIDDataMapper->CreateUID($AccId, $Conn, $Comm);
                $uid = $accUIDDataMapper->SelectUID($AccId, $Conn, $Comm);
                $_SESSION["uid"] = $uid;
                echo $_SESSION["uid"];
                // SEND EMAIL WITH LINK TO RECOVER PASSWORD
                header('Location: sendmail.php');
            }else{
                echo "Account not found";
            }
        }catch(PDOException $e){
            echo 'ERROR: '.$e->getMessage();
        }
    }
}

class Validate{
    
    public function __construct(){

    }
    public function GetEmail(){
        return filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    }
    
    public function EmailMissing(){
        try{
            $em = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            if($em == '' || $em == null){
                return true;
            }
            return false;
        }catch(PDOException $e){
            return true;
        }
    }
}
?>