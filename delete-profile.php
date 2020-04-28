<?php 
require_once('has-access.php');
require_once('db_crud.php');

if(isset($_SESSION['sUserId'])){
    $sUserID = $_SESSION['sUserId'];

    $deleteUserQ = $db->prepare("DELETE FROM user WHERE userID = '$sUserID'");
    $deleteUserQ->execute();
}

echo "user Deleted successfully";
header('Location: index.php');

?>