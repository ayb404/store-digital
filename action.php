<?php
session_start();
if(!isset($_SESSION["email"])){
    header('location:login.php');
}

include "db.php";

    $cmd=$_GET['cmd'];
    $reqdelete="DELETE FROM orders WHERE id ='".$cmd."'";
    $con->exec($reqdelete);
    header ('location:admin.php');  

?>