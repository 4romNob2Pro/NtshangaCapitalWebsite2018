<?php
include ('models/DAL/Connection.php');
include ('models/DAL/Command.php');
include ('models/account.php');
include ('models/customer.php');
include ('models/DAL/AccountDataMapper.php');
include ('models/DAL/CustomerDataMapper.php');
// TODO: Session
// TODO: send confirmation email

$validate = new Validate();
//print_r($validate->LastNameMissing());

// $firstname = $validate->GetFirstName();
// $lastname = $validate->GetLastName();
// $email = $validate->GetEmail();
// $password = $validate->GetPassword();
// $repassword = $validate->GetRePassword();
$msg = '';
$createaccounturl = 'Location: createaccount.html';

if(!isset($_POST['CreateAccount'])){
    header($createaccounturl);
}
if($validate->FirstNameMissing()){
    $msg = $msg.'fn=First name is required';
}
if($validate->LastNameMissing()){
    $msg = ($msg != '') ? $msg.'&&ln=Last name is required' 
    : $msg.'ln=Last name is required';
}
if($validate->EmailMissing()){
    $msg = ($msg != '') ? $msg.'&&em=Email is required' 
    : $msg.'em=Email is required';
}
if($validate->PasswordMissing()){
    $msg = ($msg != '') ? $msg.'&&ps=Password is required' 
    : $msg.'ps=Password is required';
}
if($validate->RePasswordMissing()){
    $msg = ($msg != '') ? $msg.'&&reps=Password is required' 
    : $msg.'reps=Password is required';
}
if($validate->GetPassword() != $validate->GetRePassword()){
    $msg = ($msg != '') ? $msg.'&&reps=Password do not match' 
    : $msg.'reps=Password do not match';
}
if($msg != ''){
    header($createaccounturl.'?'.$msg);
}
else{
    // 
    $firstname = $validate->GetFirstName();
    $lastname = $validate->GetLastName();
    $email = $validate->GetEmail();
    $password = $validate->GetPassword();
    $repassword = $validate->GetRePassword();
    try{
        // Create Account
        $Conn = new Connection();
        $Comm = new Command();

        $DateNow = date("Y-m-d h:i:sa");
        $IsConfirmed= false;
        $IsLocked = false;
        $AccountType = 1;
        $acc_datamapper = new AccountDataMapper();
                    
        if($password != $repassword){
            //header($createaccounturl);
        }
        if($acc_datamapper->Exist($email, $Conn, $Comm)){
            //header('Location: createaccount.html');
        }
        $account = new account(0, $IsConfirmed, $IsLocked, $AccountType, $DateNow, $email, $password);
        $acc_id = $acc_datamapper->Save($account, $Conn, $Comm);
        // Create User Profile
        if($acc_id > 0)
        {
            $customer = new Customer(0, $acc_id, $firstname, $lastname, null, null, $email);
            $customer_datamapper = new CustomerDataMapper();
            $customer_id = $customer_datamapper->Save($customer, $Conn, $Comm);
            if($customer_id > 0){
                header('Location: profile.html');
            }else{
                header('Location: editprofile.html');
            }
        }else{
            header('Location: createaccount.html?msg=error');
        }
    }catch(PDOException $e){
        echo 'ERROR: '. "<br>" . $e->getMessage();
    }
}

class Validate{
    
    public function __construct(){

    }
    public function GetFirstName(){
        return filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
    }
    public function GetLastName(){
        return filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
    }
    public function GetEmail(){
        return filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    }
    public function GetPassword(){
        return filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    }
    public function GetRePassword(){
        return filter_var($_POST["repassword"], FILTER_SANITIZE_STRING);
    }
    public function FirstNameMissing(){
        try{
            $fn = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
            if($fn == '' || $fn == null){
                return true;
            }
            return false;
        }catch(PDOException $e){
            return null;
        }
    }
    public function LastNameMissing(){
        try{
            $ln = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
            if($ln == '' || $ln == null){
                return true;
            }
            return false;
        }catch(PDOException $e){
            return true;
        }
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
    public function RePasswordMissing(){
        try{
            $repass = filter_var($_POST["repassword"], FILTER_SANITIZE_STRING);
            if($repass == '' || $repass == null){
                return true;
            }
            return false;
        }catch(PDOException $e){
            return true;
        }
    }
}
?>