<?php 
include("conn_db.php");
if(!empty($_GET['id'])){
    $id=$_GET['id'];
    mysqli_query($conn,"UPDATE member SET status='member' WHERE id='$id' ");
    header("location: member_request.php");
}
?>
