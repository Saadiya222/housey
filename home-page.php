<?php session_start(); //we stored email and fname ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="webproject.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title> Housey | Home Page</title>
</head>
<body>
    <header>
        <a href="#" class="logo">housey</a>
        <nav class="navigation">
            <a href="#get-started">Home</a>
            <a href="services.php">Services</a>
            <a href="#About-us">About us</a>
            <a href="mailto:housekeeper@gmail.com">Contact</a>
        </nav>
        <a href="sign-up.php" class="sign-up-head">Sign Up</i></a>
    </header>
    <section class="main" id="get-started">
        
        <div class="background1">
            <div class="welcome">
                <h1 class="background">Welcome to <br><span class="housey">Housey</span> <br>
                <a href="sign-up.php" class="getstarted">Get Started &gt;</a></h1>
               <!--<div class="slider">
                    <span id="slide-1"></span>
                    <span id="slide-2"></span>
                    <span id="slide-3"></span>
                    <div class="image-container">
                        <img src="C:\Users\Saadi\OneDrive\Documents\level 7\381 SWE\web project\p1.jpg" 
                        class="p" width="600" height="350">
                        <img src="C:\Users\Saadi\OneDrive\Documents\level 7\381 SWE\web project\p2.jpg"
                        class="p" width="600" height="350">
                        <img src="C:\Users\Saadi\OneDrive\Documents\level 7\381 SWE\web project\p3.jpg"
                        class="p" width="600" height="350">
                    </div>
                    <div class="buttons">
                        <a href="#slide-1">&gt;</a>
                        <a href="#slide-2">&gt;</a>
                        <a href="#slide-3">&gt;</a>
                    </div>
                </div> -->
    
            </div>
        </div>
        
        
        <fieldset class="frame" >
            <p class="aboutus" id="About-us">
                <img  class="houseylogo" src="housey1.png" alt="housey logo" >
                <p class="description" >
                   <span class="aboutus1" > About us</span> 
                   <br> 
                   <br>
                   Due to the increasing reliance on technology 
                   at the present time,<br> and the increasing preoccupations
                   of homeowners and housewives,<br> we have sought to improve
                   the quality of life and facilitate it for them.<br>
                   Therefore, the idea of establishing a Housey company 
                   was launched,<br> which includes a number of qualified and 
                   trained housekeepers at the <br>hands of experts in various 
                   fields that serve home owners and make<br> their lives easier and faster.
                </p> 
            </p>

        </fieldset>
        <hr>
        <fieldset class="values">
            <h1 class="h1values">Our Values</h1> 
            <button class="pr"><img src="22.png" class="val"><br>Professional services</button>
            <button class="tm"><img src="20.png" class="val"><br> Time management</button>
            <button class="res"><img src="23.png" class="val"><br>Responsibility</button>
            <button class="fle"><img src="21.png" class="val"><br>Flexibility</button>
        </fieldset>

        <button class="getstarted2"><a href="#get-started" class="getstarted-2">Go up</a></button>
    </section>
    
    <footer class="footer">
        <p class="footer-title">Copy rights</p>
        <div class="social-icons">
         <a href="#"><i class="fa-brands fa-instagram"></i></a>
         <a href="#"><i class="fa-brands fa-twitter"></i></a>
         <a href="#"><i class="fa-sharp fa-regular fa-envelope"></i></a>
        </div>
    </footer>

</body>
</html>