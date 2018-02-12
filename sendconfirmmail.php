<?php
Session_Start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!isset($_POST['ConfirmAccount'])){
    header('Location: Login.html');
}

if(!isset($_SESSION["userconfirm"]) && !isset($_SESSION["userid"])){
    header('Location: Login.php');
}
else{
    
    $userid = $_SESSION["userid"];
    //Load composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 3;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'mtsatse.sibulele@gmail.com';                 // SMTP username
        $mail->Password = '';
        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('mtsatse.sibulele@gmail.com', 'Demo Mailer');
        $mail->addAddress('mtsatse.sibulele@gmail.com', 'Sbu Mtsi');     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Ntshanga Capital: Confirm Account';
        $mail->Body    = '<p>To confirm your account please click the link below:</p><b><a href="http://localhost:8080/Ntshanga Capital/confirm.php?userid='.$userid.'">Confirm Account</a></b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        header('Location: confirmemailsent.php');
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>