<?php 
session_start(); //

include 'database.php';
$sql = " SELECT * FROM housekeeper WHERE HK_email = '" . $_SESSION['email'] . "'";
$result = $conn->query($sql);

$rows = $result->fetch_assoc();
if (isset($_POST["sub_dele"])){

    $sql = "DELETE FROM housekeeper WHERE HK_email = '14@gmail.com' ";
    
    
    if ($conn->query($sql) === TRUE) 
       header("Location: delete-profile.php");
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
    <title>Housey | My profile</title>
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
    <a href="mailto:<?php echo $rows['HK_email'] ?>" class="contact-user"><i class="fa-regular fa-envelope"></i></a> <!--can use -->
    <a href="#" class="user-bio"><i class="fa-solid fa-id-badge"></i></a>
    <div class="reviews">
        <p id="rate">Rate:</p>
        <p id="user-rate">4.5/5</p>
        <p id="reviews">Reviews:</p>
        <p id="user-reviews">.....</p>
        <a href="#" class="view-btn">View More</a>
       </div>
    </div>
    

    <section class="main">
        <div class="profile-details">
           <ul>
            <li>Name:</li>
            <span id="user-info"><?php echo $rows['HK_first_name'] ." ".$rows['HK_last_name'] ?></span>
            <li>ID:</li>
            <span class="user-info"><?php echo $rows['HK_ID']?></span>
            <li>age:</li>
            <span class="user-info"><?php echo $rows['age']?></span>
            <li>gender:</li>
            <span class="user-info"><?php
            if($rows['HK_gender']=='1')
             echo 'female';
            elseif($rows['HK_gender']=='2')
             echo 'male';
            ?></span>
            <li>email:</li>
            <span class="user-info"><?php echo $rows['HK_email']?></span> <!--or from sesstion-->
            <li>phone:</li>
            <span class="user-info"><?php echo $rows['HK_phone']?></span>
            <li>city:</li>
            <span class="user-info"><?php
            if($rows['HK_city']=='1')
             echo 'Khobar';
            elseif ($rows['HK_city']=='2')
             echo'Riyadh';
            elseif ($rows['HK_city']=='3')
            echo'jeddah';
             ?></span>
           </ul>

           <div class="btns">
            <a href="edit-hk-profile.php" class="btn">Edit</a>
            <form action="HK-profile.php" method="post">
            <input type="submit" name="sub_dele" value="Delete"></form>
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