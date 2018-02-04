<?php
    Session_Start();
    if(!isset($_SESSION['userconfirm'])){
        header('Location: Login.html');
    }
    // include ('models/AccountUID.php');
    // include ('models/DAL/Connection.php');
    // include ('models/DAL/Command.php');
    // include ('models/DAL/AccountDataMapper.php');
    // include ('models/DAL/AccountUIDDataMapper.php');
    
    // $Comm = new Command();
    // $Conn = new Connection();
    // $acc_datamapper = new AccountDataMapper();
    // $validate = new Validate();
    // $accountUID = new AccountUID();
    // $accUIDDataMapper = new AccountUIDDataMapper();
?>
<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8">
            <!-- For IE -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
            <!-- For Resposive Device -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <title>Create Account</title>
            <link rel="stylesheet" type="text/css" href="css/style1.css">
            <script type="text/javascript" src="vendor/jquery.2.2.3.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/v.js"></script>
    </head>
    <body>
            <div class="div-label-span div-margin-bottom-5px">
                    <h2>Confirm your account</h2>
                </div>
                <div id="form-container">
                    <form id="form-findaccount" action="sendconfirmmail.php" method="POST">
                        <div>
                            <div class="div-margin-bottom-5px">
                                <input id="btnCreateAccount" type="submit" class="btnStyle btnWidth" value="Send email to confirm my account" name="ConfirmAccount" />
                            </div>
                        </div>
                    </form>
                </div>
    </body>
</html>