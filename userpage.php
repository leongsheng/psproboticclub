<?php
// Initialize the session
include "conn_db.php";
session_start();
$id=$_SESSION['id'];

$query=mysqli_query($conn, "select * from member where id like '%$id%'");
$row = mysqli_fetch_array($query);
$name = $row['name'];
$status=$row['status'];
$_SESSION["login_name"]=$name;
$_SESSION["login_type"]=$status;
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["member_login"]) || $_SESSION["member_login"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Page</title>

        <!--font awesome cdn link-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">

        <!--GOOGLE FONTS (MONTSERRAT)-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapic.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <!-- custom css file link-->
        <link rel="stylesheet" href="assets/css/userpage.css">
    </head>

    <body> 
        <section class="courses">
            <h2>Welcome to Robotic User Page</h2>
            <div class="container courses__container">
                <article class="course">
                    <div class="course__image">
                        <img src="/assets/img/info.png">
                    </div>
                    <div class="course__info">
                        <h4>Update Info</h4>
                        <p>
                            Kindly update your personal information if have any change, let's improve the management more easy.
                        </p>
                        <a href="update.php" class="btn btn-primary">Update Now</a>
                    </div>
                </article>

                <article class="course">
                    <div class="course__image">
                        <img src="/assets/img/forum.png">
                    </div>
                    <div class="course__info">
                        <h4>Forum</h4>
                        <p>
                            Welcome to this community, feel free to ask any question you have faced or help another member to solve their problem.
                        </p>
                        <a href="forum.php" class="btn btn-primary">Ask/Answer?</a>
                    </div>
                </article>

                <article class="course">
                    <div class="course__image">
                        <img src="/assets/img/tutorial.png">
                    </div>
                    <div class="course__info">
                        <h4>Tutorial</h4>
                        <p>
                            Welcome to tutorial page, you may know more information about robot in this side, any video, report are include.
                        </p>
                        <a href="tutorial.html" class="btn btn-primary">Learn More</a>
                    </div>
                </article>
                <a class="button" href="logout.php"><i class="uil uil-signout"></i>Logout </a>
            </div>
        </section>
        <br>
        

        

        <!--==================== custom js file link ====================-->
        <script src="assets/js/userpage.js"></script>
    </body>
</html>