<?php

//Include required phpmailer files
require "includes/PHPMailer.php";
require "includes/SMTP.php";
require "includes/Exception.php";

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name_post=$email_post=$tel_post=$content_post="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name_post=$_POST['name'];
    $email_post=$_POST['email'];
    $tel_post=$_POST['tel'];
    $content_post=$_POST['content'];
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
    $mail->Subject = "You get a new touch from ".$name_post;
    //set sender email
    $mail->setFrom("psproboticclub@gmail.com");
    //Attachment
    //$mail->addAttachment('assets/img/member_register.png');
    //Email body
    $mail->Body = "Email: ".$email_post."\nTel: ".$tel_post."\n\n".$content_post;
    //Add recipient
    $mail->addAddress("leongsheng0516@gmail.com");
    //Finally send email
    $mail->Send();
    //Closing smtp connection
    $mail->smtpClose();
}

?>

<!DOCTYPE html>
    <html lang="en">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--==================== UNICONS ====================-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        
        <!--==================== SWIPER CSS ====================-->
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
        
        <!--==================== CSS ====================-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>PSP Robotic Club Website</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">PSP Robotic</a>
                <div class="nav__menu" id="nav-menu"> 
                    <ul class="nav__list grid">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">
                                <i class="uli uil-estate nav__icon"></i>Home
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">
                                <i class="uli uil-user nav__icon"></i>About
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#achievement" class="nav__link">
                                <i class="uil uil-file-alt nav__icon"></i>Achievement
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#robottype" class="nav__link">
                                <i class="uil uil-scenery nav__icon"></i>Robot Type
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#developTeam" class="nav__link">
                                <i class="uil uil-briefcase-alt nav__icon"></i>Developer Team
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#contact" class="nav__link">
                                <i class="uil uil-message nav__icon"></i>Contactme
                            </a>
                        </li>
                    </ul>
                    <i class="uil uil-times nav__close" id="nav-close"></i>
                </div>

                <div class="nav__btns">
                    <!--Theme change button-->
                    <i class="uil uil-moon change-theme" id="theme-button"></i>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class="uil uil-apps"></i>
                    </div>
                </div>
            </nav>
        </header>

        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home section" id="home">
                <div class="home_container container grid">
                    <div class="home__content grid">
                        <div class="home__social">
                            <!--
                            <a href="#" target="_blank" class="home__social-icon">
                                <i class="uil uil-linkedin-alt"></i>
                            </a>

                            <a href="#" target="_blank" class="home__social-icon">
                                <i class="uil uil-dribbble"></i>
                            </a>

                            <a href="#" target="_blank" class="home__social-icon">
                                <i class="uil uil-github-alt"></i>
                            </a>-->
                        </div>
                        <div class="home__img">
                            <svg class="home__blob" viewBox="0 0 200 187" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0" mask-type="alpha">
                                    <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 165.547 
                                    130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 129.362C2.45775 
                                    97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 -0.149132 97.9666 
                                    0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 
                                    165.547 130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 
                                    129.362C2.45775 97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 
                                    -0.149132 97.9666 0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>
                                    <image class="home__blob-img" x='12' y='18' xlink:href="assets/img/perfil.png"/>
                                </g>
                            </svg>
                        </div>

                        <div class="home__data">
                            <h1 class="home__title">Robotic Club</h1>
                            <h3 class="home__subtitle">Politeknik Seberang Perai</h3>
                            <p class="home__description">Welcome to PSP Robotic Club website<br><b>Learn together, Explore together, Share together</b></p>
                            <a href="login.php" class="button button--flex">
                                Log In/Sign Up<i class="uil uil-message button__icon"></i>
                            </a>
                        </div>
                    </div>

                    <div class="home__scroll">
                        <a href="#about" class="home__scroll-button button--flex">
                            <i class="uil uil-mouse-alt home__scroll-mouse"></i>
                            <span class="home__scroll-name">Scroll down</span>
                            <i class="uil uil-arrow-down home__scroll-arrow"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <h2 class="section__title">About Us</h2>
                <span class="section__subtitle">Coordinator</span>

                <div class="about__container container grid">
                    <img src="assets/img/about.jpg" alt="" class="about__img">
                

                <div class="about__data">
                    <p class="about__description"><b>Fadlilhisham Bin Ahmad</b><br>Lecturer DH44<br>Electrical Engineering Department, fadlil@psp.edu.my</p>

                    <div class="about__info">
                        <div>
                            <span class="about__info-title">13+</span>
                            <span class="about__info-name">Years<br>Work<br>experience</span>
                        </div>

                        <div>
                            <span class="about__info-title">06+</span>
                            <span class="about__info-name">Years<br>Robotic<br>experience</span>
                        </div>

                        <div>
                            <span class="about__info-title">04+</span>
                            <span class="about__info-name">College<br>worked</span>
                        </div>
                    </div>
                    
                    <div class="about__buttons">
                        <a href="organisation.html" class="button button--flex">
                            Organisation Chart
                        </a>
                    </div>
                </div>
                </div>
            </section>

            <!--==================== Achievement ====================-->
            <section class="achievement section" id="achievement">
                <h2 class="section__title">Achievement</h2>
                <span class="section__subtitle">Fira Malaysia & Fira Roboworld</span>

                <div class="achievement__container container">
                    <div class="achievement__tabs">
                        <div class="achievement__button button--flex achievement__active" data-target="#malaysia">
                            <i class="uil uil-location-pin-alt achievement__icon"></i>
                            Malaysia Cup
                        </div>

                        <div class="achievement__button button--flex" data-target="#robotworld">
                            <i class="uil uil-globe achievement__icon"></i>
                            Robotworld Cup
                        </div>
                    </div>

                    <div class="achievement__sections">
                        <!--==================== Achievement CONTENT 1===============-->
                        <div class="achievement__content achievement__active" data-content id="malaysia">
                            <!--==================== Achievement 1====================-->
                            <div class="achievement__data">
                                <div>
                                    <h3 class="achievement__title">2 Gold & 1 Bronze</h3>
                                    <span class="achievement__subtitle">8th FIRA Malaysia Cup
                                        <img src="assets/img/8th_Malaysia.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2015
                                        </i>
                                    </div>
                                </div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <span class="achievement__line"></span>
                                </div>
                            </div>

                             <!--==================== Achievement 2====================-->
                             <div class="achievement__data">
                                <div></div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <span class="achievement__line"></span>
                                </div>

                                <div>
                                    <h3 class="achievement__title">1 Gold, 2 Silver & 1 Bronze</h3>
                                    <span class="achievement__subtitle">9th FIRA Malaysia Cup
                                        <img src="assets/img/9th_Malaysia.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2016 
                                        </i>
                                    </div>
                                </div>
                            </div>

                             <!--==================== Achievement 3====================-->
                             <div class="achievement__data">
                                <div>
                                    <h3 class="achievement__title">3 Gold & 1 Silver</h3>
                                    <span class="achievement__subtitle">11th FIRA Malaysia Cup
                                        <img src="assets/img/11th_Malaysia.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2018 
                                        </i>
                                    </div>
                                </div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <span class="achievement__line"></span>
                                </div>
                            </div>

                             <!--==================== Achievement 4====================-->
                             <div class="achievement__data">
                                <div></div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <!--<span class="achievement__line"></span>-->
                                </div>

                                <div>
                                    <h3 class="achievement__title">1 Gold & 1 Silver</h3>
                                    <span class="achievement__subtitle">12th Malaysia Cup
                                        <img src="assets/img/12th_Malaysia.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2019
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--==================== Achievement CONTENT 2===============-->
                        <div class="achievement__content" data-content id="robotworld">
                            <!--==================== Achievement 1====================-->
                            <div class="achievement__data">
                                <div>
                                    <h3 class="achievement__title">1 Bronze</h3>
                                    <span class="achievement__subtitle">15th FIRA RoboWorld Cup, India
                                        <img src="assets/img/15th_World.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2010 
                                        </i>
                                    </div>
                                </div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <span class="achievement__line"></span>
                                </div>
                            </div>

                             <!--==================== Achievement 2====================-->
                             <div class="achievement__data">
                                <div></div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <span class="achievement__line"></span>
                                </div>

                                <div>
                                    <h3 class="achievement__title">1 Gold</h3>
                                    <span class="achievement__subtitle">19th FIRA RoboWorld Cup, China
                                        <img src="assets/img/19th_World.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2014 
                                        </i>
                                    </div>
                                </div>
                            </div>

                             <!--==================== Achievement 3====================-->
                             <div class="achievement__data">
                                <div>
                                    <h3 class="achievement__title">1 Gold & 2 Silver</h3>
                                    <span class="achievement__subtitle">20th FIRA Roboworld Cup, Korea
                                        <img src="assets/img/20th_World.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2015
                                        </i>
                                    </div>
                                </div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <!--<span class="achievement__line"></span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== Robot Type ====================-->
            <section class="robottype section" id="robottype">
                <h2 class="section__title">Robot Type</h2>
                <span class="section__subtitle">Let's know some robot</span>

                <div class="robottype__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== Robot Type 1====================-->
                        <div class="robottype__content grid swiper-slide">
                            <img src="assets/img/robottype1.png" alt="" class="robottype__img">

                            <div class="robottype__data">
                                <h3 class="robottype__title">Hurocup Robot</h3>
                                <p class="robottype__description">The HuroCup competition emphasizes the development of flexible, robust, and versatile robots that can perform many different tasks in different domains. </p>
                                <a href="https://firamalaysia.mypolycc.edu.my/index.php/category-rule2/hurocup" target="_blank" class="button button-flex button--small robottype__button">
                                    Know More
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                        <!--==================== Robot Type 2====================-->
                        <div class="robottype__content grid swiper-slide">
                            <img src="assets/img/robottype2.png" alt="" class="robottype__img">

                            <div class="robottype__data">
                                <h3 class="robottype__title">Aibot</h3>
                                <p class="robottype__description">Artificial Intelligent Robot (AiBot) Was derived from Robosot category.</p>
                                <a href="https://firamalaysia.mypolycc.edu.my/index.php/category-rule2/aibot" target="_blank" class="button button-flex button--small robottype__button">
                                    Know More
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                        <!--==================== Robot Type 3====================-->
                        <div class="robottype__content grid swiper-slide">
                            <img src="assets/img/robottype3.png" alt="" class="robottype__img">

                            <div class="robottype__data">
                                <h3 class="robottype__title">Drone</h3>
                                <p class="robottype__description">a drone is a flying robot that can be remotely controlled or fly autonomously using software-controlled flight plans in its embedded systems, that work in conjunction with onboard sensors and a global positioning system (GPS).</p>
                                <a href="https://www.techtarget.com/iotagenda/definition/drone" target="_blank" class="button button-flex button--small robottype__button">
                                    Know More
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Add Arrows-->
                    <div class="swiper-button-next">
                        <i class="uil uil-angle-right-b swiper-robottype-icon"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="uil uil-angle-left-b swiper-robottype-icon"></i>
                    </div>

                    <!--Add Pagination-->
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <!--==================== Join Us ====================-->
            <section class="joinUs section">
                <div class="joinUs__bg">
                    <div class="joinUs__container container grid">
                        <div class="joinUs__data">
                            <h2 class="joinUs__title">Want to join Us?</h2>
                            <p class="joinUs__description">Feel free come to <b>Robotic Center</b> or Contact our</p>
                            <a href="#contact" class="button button--flex button--white">
                                Contact Us
                                <i class="uil uil-message joinUs__icon button__icon"></i>
                            </a>
                        </div>
                        <img src="assets/img/op2.png" alt="" class="joinUs__img">
                    </div>
                </div>
            </section>

            <!--==================== Develop Team ====================-->
            <section class="developTeam section" id="developTeam">
                <h2 class="section__title">Develop Team</h2>
                <span class="section__subtitle">Final Year Project(No.19)</span>

                <div class="developTeam__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== Develop Member 1====================-->
                        <div class="developTeam__content swiper-slide">
                            <div class="developTeam__data">
                                <div class="developTeam__header">
                                    <img src="assets/img/developTeam1.png" alt="" class="developTeam__img">

                                    <div>
                                        <h3 class="developTeam__name">KHOR CHUN LEONG</h3>
                                        <span class="developTeam__client">Web Developer</span>
                                    </div>
                                </div>

                                <div>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                </div>
                            </div>

                            <p class="developTeam__description">Hi, my name is Chun Leong. I'm the web developer of this final year project</p>
                        </div>
                        <!--==================== Develop Member 2====================-->
                        <div class="developTeam__content swiper-slide">
                            <div class="developTeam__data">
                                <div class="developTeam__header">
                                    <img src="assets/img/developTeam2.png" alt="" class="developTeam__img">

                                    <div>
                                        <h3 class="developTeam__name">AKMAL ANIQ</h3>
                                        <span class="developTeam__client">Web Developer</span>
                                    </div>
                                </div>

                                <div>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                </div>
                            </div>

                            <p class="developTeam__description">Hi, my name is Aniq. I'm the web developer of this final year project.</p>
                        </div>
                        <!--==================== Develop Member 3====================-->
                        <div class="developTeam__content swiper-slide">
                            <div class="developTeam__data">
                                <div class="developTeam__header">
                                    <img src="assets/img/developTeam3.png" alt="" class="developTeam__img">

                                    <div>
                                        <h3 class="developTeam__name">ASYRAAF FIKRI</h3>
                                        <span class="developTeam__client">Auditor</span>
                                    </div>
                                </div>

                                <div>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                </div>
                            </div>

                            <p class="developTeam__description">Hi, my name is Asyraaf Fikri. I'm the auditor of this final year project.</p>
                        </div>
                    </div>
                    <!--Add Pagination-->
                    <div class="swiper-pagination swiper-pagination-developTeam"></div>
                </div>
            </section>

            <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">
                <h2 class="section__title">Contact Me</h2>
                <span class="section__subtitle">Get in touch</span>

                <dic class="contact__container container grid">
                    <div>
                        <div class="contact__information">
                            <i class="uil uil-phone contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Call Me</h3>
                                <span class="contact__subtitle">+60 17-459-4404</span>
                            </div>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-envelope contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Email</h3>
                                <span class="contact__subtitle">leong10722@email.com</span>
                            </div>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-map-marker contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Location</h3>
                                <span class="contact__subtitle">Politeknik Seberang Perai<br> Robotic Center</span>
                            </div>
                        </div>
                    </div>

                    <form action="index.php" class="contact__form grid" method="POST" name="myform">
                        <div class="contact__inputs grid">
                            <div class="contact__content">
                                <label for="" class="contact__label">Name</label>
                                <input type="text" class="contact__input" name="name">
                            </div>

                            <div class="contact__content">
                                <label for="" class="contact__label">Email</label>
                                <input type="email" class="contact__input" name="email">
                            </div>
                        </div>
                        <div class="contact__content">
                            <label for="" class="contact__label">Phone number</label>
                            <input type="tel" class="contact__input" name="tel">
                        </div>

                        <div class="contact__content">
                            <label for="" class="contact__label">Why you want to join us?</label>
                            <textarea id="" cols="0" rows="7" class="contact__input" name="content"></textarea>
                        </div>

                        <div>
                            <a href="javascript: submitform()" class="button button--flex">
                                Send Message
                                <i class="uil uil-message button__icon"></i>
                            </a>
                        </div>
                    </form>
                </dic>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer">
            <div class="footer__bg">
                <div class="footer__container container grid">
                    <div>
                        <h1 class="footer__title">PSP</h1>
                        <span class="footer__subtitle">Robotic Club</span>
                    </div>

                    <ul class="footer__links">
                        <li>
                            <a href="#about" class="footer__link">About_Us</a>
                        </li>

                        <li>
                            <a href="#robottype" class="footer__link">Robot_Type</a>
                        </li>

                        <li>
                            <a href="#contact" class="footer__link">Contact_Me</a>
                        </li>
                    </ul>

                    <div class="footer__socials">
                        <!--<a href="" target="_blank" class="footer__social" >
                            <i class="uil uil-facebook-f"></i>
                        </a>

                        <a href="" target="_blank" class="footer__social">
                            <i class="uil uil-instagram"></i>
                        </a>

                        <a href="" target="_blank" class="footer__social">
                            <i class="uil uil-twitter-alt"></i>
                        </a>-->
                    </div>
                </div>

                <p class="footer__copy">&#169; Politeknik Seberang Perai Robotic Club. All right reserved</p>
            </div>
        </footer>
        
        <!--==================== SCROLL TOP ====================-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="uil uil-arrow-up scrollup__icon"></i>
        </a>

        <!--==================== SWIPER JS ====================-->
        <script src="assets/js/swiper-bundle.min.js"></script>

        <!--==================== MAIN JS ====================-->
        <script src="assets/js/main.js"></script>

        <script type="text/javascript"> 
            function submitform() {   
                document.myform.submit();
            } 
        </script> 
    </body>
</html>
