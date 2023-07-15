<?php session_start(); //we stored email and fname ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="STYLE-shahad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <title>Housey | Services</title>
</head>
<body>
    <header>
        <a href="#" class="logo">housey</a>
        <nav class="navigation">
            <a href="home-page.php">Home</a>
            <a href="services.php">Services</a>
            <a href="home-page.php">About us</a>
        <a href="mailto:Housy@gmail.com">Contact</a>
        </nav>
        <a href="sign-up.php" class="sign-up-head">Sign Up</i></a>
    </header>

    <section class="main">

            <h2 class="title">Services</h2>
            <div class="content">
    
                <div class="card">
                    <div class="icon">
                        <img src = "chef.png" alt="Cooker"> 
                    </div>
                    <div class="info">
                        <h3>Cooker</h3>
                        <p>To enjoy wonderful and delicious meals by cooker with high professional skills.</p>
                         
                    </div>
                </div>
    
                <div class="card">
                    <div class="icon">
                        <img src = "household.png" alt="Cleaner">
                    </div>
                    <div class="info">
                        <h3>Cleaner</h3>
                        <p>To make your house shiny our cleaners will use best tools and appropriate cleaning materials.</p>
                        
                    </div>
                </div>
    
                <div class="card">
                    <div class="icon">
                        <img src = "nurse.png" alt="Nurse"> 
                    </div>
                    <div class="info">
                        <h3>Nurse</h3>
                        <p>To provide home health care to anyone who needs by highly experienced nurses.</p>
                        
                    </div>
                </div>
    
                <div class="card">
                    <div class="icon">
                        <img src = "driver.png" alt="Driver"> 
                    </div>
                    <div class="info" >
                        <h3>Driver</h3>
                        <p>To arraive to your destination safely and in the exacpt time with our best drivers.</p>
                        
                    </div>
                </div>
                
            </div>
            <a href="sign-up.html" class="book" id="book-btn"><button>book now</button></a>
            
       
       
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