<?php
Session_Start();
?>

<?php
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
//if(!isset($_SERVER[""])){
    //echo $_SERVER["uid"];
    //header('Location: errorresetingpassword.html');
//}

$msg = '';
$reseturl = 'Location: resetpassword.php';

if(isset($_POST['resetpassword'])){
     //header($reseturl);

if($validate->PasswordMissing()){
    $msg = ($msg != '') ? $msg.'&&ps=Password is required' 
    : $msg.'ps=Password is required';
}
if($validate->RePasswordMissing()){
    $msg = ($msg != '') ? $msg.'&&reps=Password is required' 
    : $msg.'reps=Password is required';
}
if(!$validate->RePasswordMissing() && !$validate->PasswordMissing()){
    if($validate->GetPassword() != $validate->GetRePassword()){
        $msg = ($msg != '') ? $msg.'&&reps=Password do not match' 
        : $msg.'reps=Password do not match';
    }
}
if($validate->GetPassword() != $validate->GetRePassword()){
    $msg = ($msg != '') ? $msg.'&&reps=Password do not match' 
    : $msg.'reps=Password do not match';
}
if($msg != ''){
    header($reseturl.'?'.$msg);
}

try{
    if(isset($_GET["uid"])){
        $uid = $_GET["uid"];
        if($uid != ''){
            $AccId = $accUIDDataMapper->GetAccountId($uid, $Conn, $Comm);
            $acc_datamapper->ChangePassword($AccId, $validate->GetPassword(), $Conn, $Comm);
            $accUIDDataMapper->DeleteUID($AccId, $Conn, $Comm);
            header('Location: Login.html');
        }
    }
}catch(PDOException $e){
    echo 'ERROR: '.$e->getMessage();
}

}
class Validate{
    
    public function __construct(){

    }
    public function GetPassword(){
        return filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    }
    public function GetRePassword(){
        return filter_var($_POST["repassword"], FILTER_SANITIZE_STRING);
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
<!DOCTYPE html>
<html lang="en">	
    <head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Reset Password</title>
        <!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <script type="text/javascript" src="vendor/jquery.2.2.3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/v.js"></script>
    </head>
    <body>
        <div class="div-label-span div-margin-bottom-5px">
            <!-- Logo -->
			<div class="logo float-left tran4s" style="background-color:#00d747;margin-top:-20px;padding:2%;">
                <a href="index.html">
                    <img src="images/logo/logo_white.png" width="200" alt="Logo">
                </a>
            </div>
            <div>
                <h2>Reset your password</h2>
            </div>
        </div>
        <div id="form-container">
            <form id="form-resetpassword" action="" method="POST">
                <div>
                    <div class="div-margin-bottom-5px">
                        <div class="div-label-span div-margin-bottom-5px">
                            <span>New Password.</span>
                        </div>
                        <div style="background-color:#fff;border:1px solid #ddd;overflow:auto;border-radius: 5px;">
                            <span id="div-icon1" class="glyphicon glyphicon-lock div-icon">
                            </span>
                            <input id="txtPass" type="Password" name="password" data-id="1" pattern=".{6,}" class="txt" title="6 or more characyers" placeholder="New Password" autocomplete="off" oninput="ValidatePassword(this)" oninvalid="ValidatePassword(this)" required />
                            <span id="span-error-msgp1" class="span-error-msg"></span>
                            <span id="span-warning-msgp1" class="span-warning-msg"></span>
                        </div>
                    </div>
                    <div class="div-margin-bottom-5px">
                            <div class="div-label-span div-margin-bottom-5px">
                                <span>Re-Password</span>
                            </div>
                            <div style="background-color:#fff;border:1px solid #ddd;overflow:auto;border-radius: 5px;">
                                <span id="div-icon2" class="glyphicon glyphicon-lock div-icon">
                                </span>
                                <input id="txtRePass" type="Password" name="repassword" data-id="2" class="txt" pattern=".{6,}" title="6 or more characyers" placeholder="Re-Password" autocomplete="off" oninput="ValidatePassword(this)" oninvalid="ValidatePassword(this)" required />
                                <span id="span-error-msgp2" class="span-error-msg"></span>
                                <span id="span-warning-msgp2" class="span-warning-msg"></span>
                            </div>
                        </div>
                    <div class="div-margin-bottom-5px">
                        <input id="btnFindAccount" type="submit" class="btnStyle btnWidth" value="Continue" name="resetpassword" />
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
