<?php
require_once("config.php");

session_start();
if(!(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "")) {
    header('location: login.php');
} else {
    $id = (int)$_GET['id'];
    $query = $connection->prepare("UPDATE users SET status=? WHERE id=?");
    $update = $query->execute(array(0, $id));

    if($query){
        header('location: index.php');
    }else{
        echo "<script>alert('Silme İşlemi Başarısız.');</script>";
        header('location: index.php');
    } 
}
?>