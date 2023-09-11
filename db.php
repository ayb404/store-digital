<?php

// require "config/constants.php";


$servername="localhost";
$username="root";
$password="";
$db="sixteen";


// Create connection
$con= new PDO("mysql:host=$servername;dbname=$db",$username,$password);

// Check connection
if (!$con) {
    echo "Connection Failed Not Connected !";
}

?>