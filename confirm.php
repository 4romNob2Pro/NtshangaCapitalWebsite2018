<?php
Session_Start();
?>
<?php
if(!isset($_GET['userid'])){
    header('Location: confirmfailed.php');
}
?>
<?php // INCLUDES
include ('models/DAL/Connection.php');
include ('models/DAL/Command.php');
include ('models/DAL/AccountDataMapper.php');
?>

<?php // INSTANTIATION
$Conn = new Connection();
$Comm = new Command();
$acc_datamapper = new AccountDataMapper();
?>

<?php // CONFIRM
try{
    $AccId = $_GET['userid'];
    $confirmed = $acc_datamapper->Confirm($AccId, $Conn, $Comm);
    if($confirmed){
        header('Location: confirmed.php?id='.$AccId);
    }else{
        header('Location: confirmfailed.php?id='.$AccId);
    }
}catch(PDOException $e){

}
?>