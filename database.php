<?php

$host="localhost";
$user="root";
$pass="";
$db="login_register";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    die("something went wrong!");
}
?>