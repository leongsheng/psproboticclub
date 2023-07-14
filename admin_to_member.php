<?php
session_start();
// Store data in session variables
$_SESSION["member_login"] = true;                         

// Redirect user to welcome page
header("location: userpage.php");
 
exit;
?>