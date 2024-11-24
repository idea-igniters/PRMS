<?php

$host="localhost";
$user="root";
$pass="";
$db="patientrecords";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    die("something went wrong!");
}
?>