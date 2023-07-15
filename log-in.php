<?php
session_start();

if(isset($_POST["sub"])){
    include "database.php";
    $Email=$_POST["Email"];
    $password=$_POST["password"];
    $LogInType=$_POST["LogInType"];

    if($LogInType == "1"){
        $sql = "SELECT HO_email,HO_password FROM houseowner WHERE HO_email = '$Email' and HO_password = '$password'";
        $sqlres=mysqli_query($conn, $sql);
        $rowcount=mysqli_num_rows($sqlres);

        if($rowcount == 1){  
            $_SESSION['email'] = $Email; ////add
            
                header("Location: home-page-HO.php");
                exit;
            
        //    header("Location: C:\Users\Saadi\OneDrive\Documents\xampp\htdocs\webproject\home-page-HO.php"); 
          //  exit;
        }  
        else{  
            echo 'Login failed. Invalid username or password';  
        }   
    }
    if($LogInType == "2"){
        $sql = "select HK_email,HK_password from housekeeper where HK_email = '$Email' and HK_password = '$password'";
        $sqlres=mysqli_query($conn, $sql);
        $rowcount=mysqli_num_rows($sqlres);

        if($rowcount == 1){  
            $_SESSION['email'] = $Email; ///
            header("Location: C:\Users\Saadi\OneDrive\Documents \xxampp\htdocs\webproject\home-page-HK.php"); 
            exit;
        }  
        else{  
            echo 'Login failed. Invalid username or password';  
        }   
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
    <link href="style6.css?v=<?php echo time(); ?>" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <title>Housey | Log in</title>
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
        <i class="menu"></i>
    </header>
     
    <section class="main">
        
     
        <div class="login-box">
            <h1>Login</h1>
            <form action="log-in.php" method="post">
              <label>Email</label>
              <input type="email" name = "Email" placeholder="" />
              <label>Password</label>
              <input type="password" name = "password" placeholder="" />
              <label >Choose log in type:</label>
              <select name="LogInType">
              <option value="1">Home Owner</option>
              <option value="2">House Keeper</option>
              </select>
              <input type="submit" name="sub" value="Log In" />
              <p class="para-2">
                Not have an account? <a href="sign-up.html">Sign Up Here</a>
              </p>
              <p><a class="back-sign" href="home-page.html">Back</a></p>
            <closeform></closeform></form>
            
            
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