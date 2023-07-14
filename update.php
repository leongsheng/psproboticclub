<?php 
  include "conn_db.php";

  session_start();

  $id=$_SESSION['id'];
  $matric=$_SESSION['matric'];

  $query=mysqli_query($conn, "select * from member where id like '%$id%'");

  $row = mysqli_fetch_array($query);
  $name = $row['name'];
  $program = $row['program'];
  $ic_number= $row['ic_number'];
  $tel_number= $row['tel'];
  $status=$row['status'];
  $sem=$row['sem'];

  $name_update = $ic_update = $tel_update = $sem_update = $password_update = $cofirm_password_update = "";
  $password_error=$param_password="";

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name_update=mysqli_real_escape_string($conn,$_POST['name']);
    $ic_update=mysqli_real_escape_string($conn,$_POST['ic']);
    $tel_update=mysqli_real_escape_string($conn,$_POST['tel']);
    $sem_update=mysqli_real_escape_string($conn,$_POST['sem']);
    $password_update = mysqli_real_escape_string($conn,$_POST['new_password']);
    $confirm_password_update = mysqli_real_escape_string($conn,$_POST['confirm_password']);

    if($sem_update=="" && $password_update==""){
      mysqli_query($conn,"UPDATE member SET name='$name_update', ic_number='$ic_update', tel='$tel_update' WHERE id='$id'");
      header("location: userpage.php");
    }
    elseif($sem_update=="" && $password_update!=""){
      if(strlen(trim($password_update))<6){
        $password_error="Password must have atleast 6 characters.";
      }
      elseif($password_update != $confirm_password_update){
        $password_error="Password did not match.";
      }
      else{
        $param_password=password_hash($password_update,PASSWORD_DEFAULT);
        mysqli_query($conn,"UPDATE member SET name='$name_update', ic_number='$ic_update', tel='$tel_update', password='$param_password' WHERE id='$id'");
        $password_error="Password reset success full.";
      }
    }
    elseif($sem_update!="" && $password_update==""){
      mysqli_query($conn,"UPDATE member SET name='$name_update', ic_number='$ic_update', tel='$tel_update', sem='$sem_update' WHERE id='$id'");
      header("location: userpage.php");
    }
    else{
      if(strlen(trim($password_update))<6){
        $password_error="Password must have atleast 6 characters.";
      }
      elseif($password_update != $confirm_password_update){
        $password_error="Password did not match.";
      }
      else{
        $param_password=password_hash($password_update,PASSWORD_DEFAULT);
        mysqli_query($conn,"UPDATE member SET name='$name_update', ic_number='$ic_update', tel='$tel_update', sem='$sem_update', password='$param_password' WHERE id='$id'");
        header("location: update.php");
      }
    }

    
  }
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="assets/css/update.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Update Info</div>
    <div class="content">
      <form action="update.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span> 
            <?php
              if($name == ""){
                echo '<input type="text" placeholder="Enter your name" name="name" required>';
              }
              else{
                echo "<input type='text' value='$name' name='name' required>";
              }
            ?>
          </div>
          <div class="input-box">
            <span class="details">Matric No:</span>
            <label class="status"><?php echo $matric ?></label>
          </div>
          <div class="input-box">
            <span class="details">IC Number</span>
            <?php
              if($ic_number == ""){
                echo '<input type="text" placeholder="Enter your ic number" name="ic" required>';
              }
              else{
                echo "<input type='text' value='$ic_number' name='ic' required>";
              }
            ?>
          </div>
          <div class="input-box">
            <span class="details">Program:</span>
            <label class="status"><?php echo $program ?></label>
          </div>
          <div class="input-box">
            <span class="details">Tel No</span>
            <?php
              if($tel_number == ""){
                echo '<input type="text" placeholder="Enter your tel number" name="tel" required>';
              }
              else{
                echo "<input type='text' value='$tel_number' name='tel' required>";
              }
            ?>
          </div>
          <div class="input-box">
            <span class="details status">Sem:
              <?php
                if($sem == "0"){
                  echo "No Update yet";
                } 
                else{
                  echo $sem;
                }
              ?>
            </span>
            <div class="select">
                <select name="sem" id="sem" class="select-selectdown">
                    <option value="">Update Now?</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
          </div>
          <div class="input-box">
            <span class="details">Reset your Password</span>
            <input type="password" name="new_password" placeholder="Enter your password(Optional)">
            <label class="status"><?php echo $password_error ?></label>
          </div>
          <div class="input-box">
            <span class="details">Confirm reset Password</span>
            <input type="password" name="confirm_password" placeholder="Confirm your password(Optional)">
          </div>
          <div class="input-box">
            <span class="details">Status</span>
            <label class="status"><?php echo $status ?></label>
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
