<?php
session_start();
include 'database.php';

 

if(isset($_POST["sub"])){
    $First = $_POST["first_name"];
    $Last = $_POST["last_name"];
    $City = $_POST["city"];
    $ID = $_POST['id'];
    $Age = $_POST['age'];
    $Gender = $_POST['gender'];
    $Phone = $_POST['phone'];
    $Bio = $_POST['bio'];
    $email=$_SESSION['email'];


    

    $sql = "UPDATE housekeeper SET HK_first_name = '$First', HK_last_name = '$Last', HK_ID = '$ID', HK_city = '$City', age = '$Age', HK_gender = '$Gender', HK_phone = '$Phone', HK_bio = '$Bio' WHERE HK_email = '$email'";

    if ($conn->query($sql) === TRUE) 
       header("Location: HK-profile.php");
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
            <a href="home-page-HK.php">Home</a>
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
           <form method="post" action="edit-HK-profile.php">
            <div>
              <label>First Name:</label>
              <input type="text" name="first_name" placeholder="your first name">
              <label>Last Name:</label>
              <input type="text" name="last_name" placeholder="your second name">
            </div>
            <br>
            <div>
                <label>ID:</label>
                <input type="text" name="id" placeholder="your ID">
            </div>
            <br>
            <div>
                <label>Age:</label>
                <input type="text" name="age" placeholder="your age">
            </div>
            <br>
            <div>
                <label class="genders">Gender:</label><br>
                <label class="genders">Male
                    <input type="radio" id="Male" value="1" name="gender">
                    <span class="checkmark"></span>
                </label><br>

                
                <label class="geners">Female
                    <input type="radio" id="Female" value="2" name="gender" checked>
                    <span class="checkmark"></span></label>
            </div>
            <br>
            <div>
                <label>Email:</label>
                <input type="email" name="email" placeholder="example@gmail.com">
            </div>
            <br>
            <div>
                <label>Phone No.:</label>
                <input type="text" name="phone" placeholder="your phone number">
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
                <label>Bio:</label>
                <input type="text" name = "bio" value="i worked with Housey for 3 Years and i'm fluent in Arabic and English " placeholder="years of experience,education, languages spoken, skills">
            </div>
            <br>
            <input type="submit"  name = "sub" value="Save">
           </form>

           <div class="btns">
            <a href="HK-profile.php" class="btn">Cancle</a>
            <a href="HK-profile.php" class="btn">Back</a>
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