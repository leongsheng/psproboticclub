<?php
    include("conn_db.php");

    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        $id=$_GET['id'];
        mysqli_query($conn,"DELETE FROM member WHERE id='$id'");
        header("location: member_request.php");
    }
?>