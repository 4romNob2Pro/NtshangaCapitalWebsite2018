<?php
Session_Start();
?>

<?php
if(!isset($_SESSION['user'])){
    header('Location: Login.html');
}
?>