

<?php 
session_start();

include 'database.php';
$sql = " SELECT * FROM houseowner WHERE HO_email = '" . $_SESSION['email'] . "'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
if (isset($_POST["sub_dele"])){

    $sql = "DELETE FROM houseowner WHERE HO_email = '" . $_SESSION['email'] . "'";
    
    
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
           <ul>
            <li>Name:</li>
            <span id="user-info"><?php echo $rows['HO_first_name'] ." ".$rows['HO_last_name'] ?></span>
            <li>Email:</li>
            <span class="user-info"><?php echo $rows['HO_email']?></span>
            <li>City:</li>
            <span class="user-info"><?php
            if($rows['city']=='1')
             echo 'Khobar';
            elseif ($rows['city']=='2')
             echo'Riyadh';
            elseif ($rows['city']=='3')
            echo'jeddah';
             ?></span>
            <li>Location:</li>
            <a href="https://goo.gl/maps/VduwVsAr5a5SL5oz9" id="location" target="_blank"><i class="fa-solid fa-location-dot"></i></a>
           </ul>

           <div class="btns">
            <a href="edit-ho-profile.php" class="btn">Edit</a>
            <form action="HO-profile.php" method="post">
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