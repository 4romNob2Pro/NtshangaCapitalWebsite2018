<?php
include ('models/DAL/Connection.php');
include ('models/DAL/Command.php');
include ('models/account.php');
include ('models/customer.php');
include ('models/DAL/AccountDataMapper.php');
include ('models/DAL/CustomerDataMapper.php');

if(isset($_POST['signin'])){
    header('Location: login.html');
}

$msg = '';
$loginurl = 'Location: Login.html';
$validate = new Validate();

if($validate->EmailMissing()){
    $msg = $msg.'em=Email is required';
}
if($validate->PasswordMissing()){
    $msg = ($msg != '') ? $msg.'&&ps=Password is required' 
    : $msg.'ps=Password is required';
}
if($msg != ''){
    header($loginurl.'?'.$msg);
}else{
    $email = $validate->GetEmail();
    $password = $validate->GetPassword();
    try
    {
        $Conn = new Connection();
        $Comm = new Command();
        $acc_datamapper = new AccountDataMapper();

        if(!$acc_datamapper->Exist($email, $Conn, $Comm))
        { // Check if already have an account
            $msg = $msg.'exist=You do not have and account';
            header($loginurl.'?'.$msg);
        }
        else
        {
            // Check if is confirmed
            if(!$acc_datamapper->IsConfirmed($email, $Conn, $Comm))
            { 
                $msg = $msg.'confirm=Please confirm your account!';
                header('Location: confirmaccount.html?'.$msg);
            }
            else
            {
                // Check if is locked
                if($acc_datamapper->IsLocked($email, $Conn, $Comm))
                { 
                    $msg = $msg.'locked=Your account is temporarily locked. Please contact our support team for more information!';
                    header($loginurl.'?'.$msg);
                }
                else
                {
                    // Check if password is correct
                    if(PasswordMatch($email, $password, $Conn, $Comm))
                    { 
                        // TODO: Create Session for user
                        // TODO: Redirect to profile
                        header('Location: profile.html');
                    }
                    else
                    {
                        echo 'Incorrect password!';
                    }
                }
            } 
        }
    }catch(PDOException $e){
        echo 'ERROR: '. "<br>" . $e->getMessage();
    }
}

class Validate{
    
    public function __construct(){

    }
    public function GetEmail(){
        return filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    }
    public function GetPassword(){
        return filter_var($_POST["password"], FILTER_SANITIZE_STRING);
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
    public function PasswordMissing(){
        try{
            $pass = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
            if($pass == '' || $pass == null){
                return true;
            }
            return false;
        }catch(PDOException $e){
            return true;
        }
    }
}
?>