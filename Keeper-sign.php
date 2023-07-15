<?php
session_start();
            include "database.php";
            $rowcount = 0;
            $password = "";  
             $Confirmpassword = "";
            if($_SERVER["REQUEST_METHOD"] == "POST" ){
            $First_name=$_POST["First_name"];
            $Last_name=$_POST["Last_name"];
            $Email=$_POST["Email"];
            $password=$_POST["password"];
            $Confirmpassword=$_POST["Confirmpassword"];
            $Phone=$_POST["Phone"];
            $city = $_POST["city"];
            $ID = $_POST["ID"];
            $Age = $_POST["Age"];
            $Gender = $_POST["Gender"];
            $Bio = $_POST["Bio"];


            $sql = "select HK_email from housekeeper where HK_email = '$Email'";
            $sqlres=mysqli_query($conn, $sql);
            $rowcount=mysqli_num_rows($sqlres);

            if($password != $Confirmpassword){
                echo "Confirm password properly";
            }
            if(($rowcount ==0) && ($password == $Confirmpassword)){
            
                $sql = "INSERT INTO housekeeper (HK_first_name, HK_last_name, HK_gender, HK_email, HK_password, HK_phone, HK_city, HK_bio) VALUES ('$First_name','$Last_name','$Gender','$Email','$password','$Phone','$city','$Bio')";
                $sqlres=mysqli_query($conn, $sql);

                //session need
                $_SESSION["email"] = $Email;
                $_SESSION["name"] = $First_name;
        
                
                header("Location: home-page-HK.php");
                exit();

            }
           }
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="Style6.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <title>Housey | Sign up</title>
</head>
<body>
    <header>
        <a href="#" class="logo">housey</a>
        <nav class="navigation">
            <a href="home-page-HK.php">Home</a>
            <a href="services.php">Services</a>
            <a href="home-page.php">About us</a>
            <a href="mailto:Housy@gmail.com">Contact</a>
        </nav>
        <i class="menu"></i>
    </header>
     
    <section class="main">
        
        <div class="signupkeeper-box">
            <h1>Sign Up</h1>
            <h4>welcome  </h4>
           
            
            <form action="Keeper-sign.php" method="post">
              
              <label>First Name<span class="req">*</span></label>
              <input type="text" required placeholder="" name="First_name" />
              <label>Last Name<span class="req">*</span></label>
              <input type="text" required placeholder="" name="Last_name"/>
              <label>ID<span class="req">*</span></label>
              <input type="text" required placeholder="" name="ID"/>
              <label>Phone number</label>
              <input type="text" name="Phone"/>
              <label>age<span class="req">*</span></label>
              <input type="text" required placeholder="" name="Age"/>
              <label>Email<span class="req">*</span></label>
              <input type="email" required placeholder="" name="Email"/>
              <label>gender<span class="req">*</span></label><select name="Gender">
                <option selected>Open this select menu</option>
                <option value="1">Famile</option>
                <option value="2">male</option>
              </select>
              <label for="bio">Bio:</label>
              <textarea id="bio" name="Bio"></textarea>
              <label>Password<span class="req">*</span></label>
              <input type="password" required placeholder="" name="password"/>
              <label>Confirm Password<span class="req">*</span></label>
              <input type="password" required placeholder="" name="Confirmpassword"/>
              <label>City<span class="req">*</span></label><select name="city">
                <option selected>Open this select menu</option>
                <option value="1">Khobar</option>
                <option value="2">Riyadh</option>
                <option value="3">jeddah</option>
              </select>
              <label for="photo">Personal Photo:<span class="req">*</span></label>
              <input type="file" id="photo" name="photo" accept="image/*">
              
              <input type="submit" name="sub" value="Sign Up" />
            <closeform></closeform></form>
            <p class="para-2">
                Already have an account? <a href="log-in.php">Login here</a>
              </p>
              <p><a class="back-sign" href="sign-up.php">Back</a></p>
          </div>
          
        
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