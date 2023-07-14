<?php
//Include required phpmailer files
require "includes/PHPMailer.php";
require "includes/SMTP.php";
require "includes/Exception.php";

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] === true){
    header("location: member.php");
    exit;
}
// Check if the user is already logged in, if yes then redirect him to welcome page
elseif(isset($_SESSION["member_login"]) && $_SESSION["member_login"] === true){
    header("location: userpage.php");
    exit;
}

// Include config file
require_once "conn_db.php";
 
// Define variables and initialize with empty values (Register)
$matricno = $password = $confirm_password = "";
$matricno_err = $password_err = $confirm_password_err = "";
$error_message="";

// Define variables and initialize with empty values (Login)
$matric = $pass = "";
$matric_err = $pass_err = $login_err = "";

//login function
if(isset($_POST['btn_login'])){
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["matric"]))){
        $matric_err = "Please enter matric.";
    } else{
        $matric = trim($_POST["matric"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pass"]))){
        $pass_err = "Please enter your password.";
    } else{
        $pass = trim($_POST["pass"]);
    }
    
    // Validate credentials
    if(empty($matric_err) && empty($pass_err)){
        // Prepare a select statement
        $sql = "SELECT id, matric_no, password ,status FROM member WHERE matric_no = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_matric);
            
            // Set parameters
            $param_matric = $matric;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $matric, $hashed_password,$status);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_password)){
                            if($status == "admin"){
                                // Password is correct, so start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["admin_login"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["matric"] = $matric;
                                $_SESSION["type"] =1;                            
                                
                                // Redirect user to welcome page
                                header("location: member.php");
                            }

                            elseif($status == "member"){
                                    // Password is correct, so start a new session
                                    session_start();
                                    
                                    // Store data in session variables
                                    $_SESSION["member_login"] = true;
                                    $_SESSION["id"] = $id;
                                    $_SESSION["matric"] = $matric;
                                    $_SESSION["type"] =2;                            
                                    
                                    // Redirect user to welcome page
                                    header("location: userpage.php");
                            }
                            elseif($status == ""){
                                $login_err = "Your register request still pending";
                            }     
                        } 
                        else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid matric no or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid matric ";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
}


//register function
if(isset($_POST['btn_register'])){
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["matricno"]))){
        $matricno_err = "Please enter a matricno.";
        $error_message='<i class="uil uil-question-circle"></i>If click the button submit in Sign Up page and back to this page. Please click the button sign up for check error.';
    } elseif(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["matricno"]))){
        $matricno_err = "matricno can only contain letters, numbers";
        $error_message='<i class="uil uil-question-circle"></i>If click the button submit in Sign Up page and back to this page. Please click the button sign up for check error.';
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM member WHERE matric_no = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_matricno);
            
            // Set parameters
            $param_matricno = trim($_POST["matricno"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $matricno_err = "This matric no is already taken.";
                    $error_message='<i class="uil uil-question-circle"></i>If click the button submit in Sign Up page and back to this page. Please click the button sign up for check error.';
                } else{
                    $matricno = trim($_POST["matricno"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
        $error_message='<i class="uil uil-question-circle"></i>If click the button submit in Sign Up page and back to this page. Please click the button sign up for check error.';   
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
        $error_message='<i class="uil uil-question-circle"></i>If click the button submit in Sign Up page and back to this page. Please click the button sign up for check error.';
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
        $error_message='<i class="uil uil-question-circle"></i>If click the button submit in Sign Up page and back to this page. Please click the button sign up for check error.'; 
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($matricno_err) && empty($password_err) && empty($confirm_password_err)){

        $program=strtoupper(substr($matricno,-10,-7));

        if($program == "DDT"){
            $class="JTMK";
        }
        elseif($program == "DEE" || $program == "DEP" || $program == "DTK"){
            $class="JKE";
        }
        elseif($program == "DKM" || $program == "DMT" || $program == "DJL" || $program=="DTP"){
            $class="JKM";
        }
        elseif($program == "DAT" || $program == "DIB" || $program == "DPM" || $program=="DLS"){
            $class="JP";
        }
        else{
            $class="";
        }
        
        // Prepare an insert statement
        $sql = "INSERT INTO member (matric_no, program, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_matricno, $param_program, $param_password);
            
            // Set parameters
            $param_matricno = $matricno;
            $param_program= $class;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page

                //Createinstance of phpmailer
                $mail=new PHPMailer();
                //Set mailer to use smtp
                $mail->isSMTP();
                //define smtp host
                $mail->Host = "smtp.gmail.com";
                //enable smtp authentication
                $mail->SMTPAuth = "true";
                //set type of encryption (ssl/tls)
                $mail->Port = "587";
                //set gmail username
                $mail->Username = "psproboticclub@gmail.com";
                //set gmail password
                $mail->Password = "yzmglrxkvleghank";
                //set email subject
                $mail->Subject = "Robotic have a new register request";
                //set sender email
                $mail->setFrom("psproboticclub@gmail.com");
                //Attachment
                $mail->addAttachment('assets/img/member_register.png');
                //Email body
                $mail->Body = "You have receive a new register request from matrix no :".$matricno;
                //Add recipient
                $mail->addAddress("leongsheng0516@gmail.com");
                //Finally send email
                $mail->Send();
                //Closing smtp connection
                $mail->smtpClose();

                $error_message="successful register, your request will be process in 1 or 2 workday, if login unsuccessful please try to contact us";
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
}
?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login/Register Form</title>
        <link rel="stylesheet" type="text/css" href="assets/css/login.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    </head>
    <body>
        <div class="container">
            <div class="loginBg">
                <div class="box signin">
                    <h2>Already Have an Account ?</h2>
                    <button class="signinBtn">Sign in</button>
                </div>
                <div class="box signup">
                    <h2>Don't Have an Account?</h2>
                    <button class="signupBtn">Sign up</button>
                </div>
            </div>
            <div class="formBx">
                <div class="form signinForm">
                <?php 
                    if(!empty($login_err)){
                        echo '<span style="color:red;">'.$login_err."</span>";
                    }        
                ?>
                    <form action="login.php" method="post">
                        <h3>Sign In</h3>
                        <input type="text" name="matric" class="form-control <?php echo (!empty($matric_err)) ? 'is-invalid' : ''; ?>" placeholder="Matric No">
                        <span style="color:red;"><?php echo $matric_err; ?></span>
                        <input type="password" name="pass" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password">
                        <span style="color:red;"><?php echo $pass_err; ?></span>
                        <input type="submit" value="Login" name="btn_login">
                        <a href="index.php" style="color: hsl(340,69%,61%);"><i class="uil uil-sign-out-alt"></i>Back</a>
                        <h5><?php echo $error_message; ?></h5>
                    </form>
                </div>

                <div class="form signupForm">
                    <form action="login.php" method="post">
                        <h3>Sign Up</h3>
                        <input type="text" name="matricno" class="form-control <?php echo (!empty($matricno_err))? 'is-invalid' : ''; ?>"  placeholder="Matric No">
                        <span style="color:red;"><?php echo $matricno_err; ?></span>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err))? 'is-invalid' : ''; ?>" placeholder="Password">
                        <span style="color:red;"><?php echo $password_err; ?></span>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err))? 'is-invalid' : ''; ?>" placeholder="Confirm Password">
                        <span style="color:red;"><?php echo $confirm_password_err; ?></span>
                        <input type="submit" value="Submit" name="btn_register">
                    </form>
                </div>
            </div>
        </div>

        <script>
            const signinBtn = document.querySelector('.signinBtn');
            const signupBtn = document.querySelector('.signupBtn');
            const formBx = document.querySelector('.formBx');
            const body = document.querySelector('body')

            signupBtn.onclick = function(){
                formBx.classList.add('active')
                body.classList.add('active')
            }

            signinBtn.onclick = function(){
                formBx.classList.remove('active')
                body.classList.remove('active')
            }
        </script>
    </body>
</html>