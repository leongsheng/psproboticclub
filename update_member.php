<?php 
  include "conn_db.php";

  session_start();
  $id=$_GET['id'];
  if(!empty($_GET['id'])){
    $_SESSION['id_now']=$id;
  }
  $query=mysqli_query($conn, "select * from member where id like '%$id%'");

  $row = mysqli_fetch_array($query);
  $matric=$row['matric_no'];
  $name = $row['name'];
  $program = $row['program'];
  $ic_number= $row['ic_number'];
  $tel_number= $row['tel'];
  $status=$row['status'];
  $sem=$row['sem'];

  $password_update = $status_update="";
  $param_password="";

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $password_update = mysqli_real_escape_string($conn,$_POST['new_password']);
    $status_update=mysqli_real_escape_string($conn,$_POST['status']);
    $id=$_SESSION['id_now'];

    if(($status_update=="member" || $status_update=="") && $password_update!=""){
        $param_password=password_hash($password_update,PASSWORD_DEFAULT);
        mysqli_query($conn,"UPDATE member SET password='$param_password' WHERE id='$id'");
        header("location: member.php");
    }
    elseif($status_update!="member" && $password_update==""){
      mysqli_query($conn,"UPDATE member SET status='$status_update' WHERE id='$id'");
      header("location: member.php");
    }
    else{
        $param_password=password_hash($password_update,PASSWORD_DEFAULT);
        mysqli_query($conn,"UPDATE member SET status='$status_update', password='$param_password' WHERE id='$id'");
        header("location: member.php");
    } 
  }
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="assets/css/update_member.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Update Info</div>
    <div class="content">
      <form action="update_member.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name:</span> 
            <label class="status"><?php echo $name ?></label>
          </div>
          <div class="input-box">
            <span class="details">Matric No:</span>
            <label class="status"><?php echo $matric ?></label>
          </div>
          <div class="input-box">
            <span class="details">IC Number:</span>
            <label class="status"><?php echo $ic_number ?></label>
          </div>
          <div class="input-box">
            <span class="details">Program:</span>
            <label class="status"><?php echo $program ?></label>
          </div>
          <div class="input-box">
            <span class="details">Tel No:</span>
            <label class="status"><?php echo $tel_number ?></label>
          </div>
          <div class="input-box">
            <span class="details">Sem:</span>
            <label class="status"><?php echo $sem ?></label>
          </div>
          <div class="input-box">
            <span class="details">Reset Password</span>
            <input type="password" name="new_password" placeholder="Enter new password(Optional)">
          </div>
          <div class="input-box">
            <span class="details">Status:</span>
            <?php 
                if($status == "member"){
                    Print '<div class="select">
                                <select name="status" id="status" class="select-selectdown">
                                    <option value="member">Member</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>';
                }
                elseif($status == "admin"){
                    Print '<div class="select">
                                <select name="status" id="status" class="select-selectdown">
                                    <option value="admin">Admin</option>
                                    <option value="member">Member</option>
                                </select>
                            </div>';
                }
            ?>
            
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Update Now">
        </div>
        <a href="userpage.php"><i class="uil uil-signout"></i>Back</a>
      </form>
    </div>
  </div>

</body>
</html>