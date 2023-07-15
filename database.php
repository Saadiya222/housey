<?php 
//session_start();

$servername="localhost";
$username="root";
$password="";
$dbname="s";

//Create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if(!$conn){
    die("Connection failed");
}

if(!mysqli_select_db($conn,$dbname)){
    die("Couldn't open the ".$dbname."database");
}
?>