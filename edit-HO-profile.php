<?php 
session_start();
include 'database.php';

 

if(isset($_POST["sub"])){
    $First = $_POST["first_name"];
    $Last = $_POST["last_name"];
    $Password = $_POST["password"];
    $City = $_POST["city"];
    

    

    $sql = "UPDATE homeowner SET first_name = '$First' , last_name = '$Last' , password = '$Password', city = '$City' WHERE email = '" . $_SESSION['email'] . "'";
    if ($conn->query($sql) === TRUE) 
       header("Location: HO-profile.php");
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <title>Housey | Edit profile</title>
</head>
<body>
    <header>
        <a href="#" class="logo">housey</a>
        <nav class="navigation">
            <a href="home-page-HO.php">Home</a>
            <a href="services.php">Services</a>
            <a href="home-page.php">About us</a>
            <a href="mailto:Housy@gmail.com">Contact</a>
        </nav>
        <a id="profile-dropdown"><i class="fa-solid fa-circle-user"></i></a>
    </header>


    <div class="imgs">
    <div class="user-banner"></div>
    <div class="user-img"><img src="profile.jpg" alt="profile img"></div>
    </div>
    

    <section class="main">
        <div class="profile-details">
           <form method="post" action="edit-HO-profile.php">
            <div>
              <label>First Name:</label>
              <input type="text" name="first_name" placeholder="your first name">
              <label>Last Name:</label>
              <input type="text" name="last_name" placeholder="your second name">
            </div>
            <br>
            <div>
                <label>Email:</label>
                <input type="email" name="email"  placeholder="example@gmail.com">
            </div>
            <br>
            <div>
                <label>Password:</label>
                <input type="password" name="password"  placeholder="Enter new passowrd to change it">
            </div>
            <br>
            <div>
                <label>City:</label>
                <select name="city" id="city">
                    <option value="1">Riyadh</option>
                    <option value="2">Abha</option>
                    <option value="3">Jedda</option>
                </select>
            </div>
            <br>
            <div>
                <label>Location:</label>
                <input type="text" placeholder="paste the location's URL here">
            </div>
            <br>
            <input type="submit" name="sub" value="Save">
           </form>

           <div class="btns">
            <a href="HO-profile.html" class="btn">Cancle</a>
            <a href="HO-profile.html" class="btn">Back</a>
            <a href="delete-profile.html" class="btn">Delete</a>
           </div>
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
</html>