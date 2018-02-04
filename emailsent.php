<?php 
Session_Start();

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
        <title>Email Sent</title>
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
                <h2>Email sent</h2>
            </div>
        </div>
        <div id="form-container">
            <form id="form-findaccount" action="findaccount.php" method="POST">
                <div>
                    <div class="div-margin-bottom-5px">
                        <div class="div-label-span div-margin-bottom-5px">
                            <span style="color:green;">We have sent you an email with instructions to reset your password. Please check your emails.</span>
                        </div>
                        <div>
                            <div class="div-margin-bottom-5px">
                                <a href="sendmail.php" class="btn-atag resend-link">Resend email</a>
                            </div>
                            <div class="div-margin-bottom-5px">
                                <a href="#" id="no-access-to-my-e">I don't have access to my email.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
<?php

?>