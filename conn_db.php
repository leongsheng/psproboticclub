<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dbhost = "localhost:3306";

$dbusername = "root";

$dbpassword = "";

$db_name = "robotic";



$conn = new mysqli($dbhost,$dbusername,$dbpassword,$db_name);

//Check connection
if($conn === false){
    die("Error: Could not connect. " . mysqli_connect_error());
}



?>