<?php 
session_start();

$servername="localhost";
$username="root";
$password="";
$dbname="s";

//Create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if(!$conn){
    die("Connection failed");
}

if(!mysqli_select_db($conn,$dbname)){
    die("Couldn't open the ".$dbname."database");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <link rel="stylesheet" href="style-bookings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Housey | My Bookings</title>

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

    <section class="main">
        <h1 class="mybookings">My Bookings</h1>
        <br>

        <div class="candp">
        <div class="current" id="cbutton"onclick="document.getElementById('currentbookings').style.display='block';document.getElementById('previousbookings').style.display='none';document.getElementById('cbutton').style.backgroundColor='#755309';document.getElementById('pbutton').style.backgroundColor='#C5901A'">Current</div> <br>
        <div class="previous" id="pbutton"onclick="document.getElementById('previousbookings').style.display='block';document.getElementById('currentbookings').style.display='none';document.getElementById('pbutton').style.backgroundColor='#755309';document.getElementById('cbutton').style.backgroundColor='#C5901A'"> Previous </div>
      </div>

       <div class="list">

       <?php
$sql1 = "SELECT housekeeper.HK_first_name, housekeeper.HK_photo, req.service, req.TYPE, req.start_date, req.end_date, offers.offer_status 
FROM housekeeper 
INNER JOIN offers ON housekeeper.HK_ID = offers.keeperId 
INNER JOIN req ON req.request_Id = offers.request_fk 
WHERE housekeeper.HK_email = '".$_SESSION['email']."'";

$result1 = mysqli_query($conn, $sql1);
if ($result1 && mysqli_num_rows($result1) > 0) {
    $currentOffers = [];
    $previousOffers = [];

    while ($row = mysqli_fetch_assoc($result1)) {
        if (($row['offer_status'] == "accepted")&&(date("Y-m-d")<$row['end_date'])) {
            $currentOffers[] = $row;
        } elseif (($row['offer_status'] == "accepted")&&(date("Y-m-d")>$row['end_date'])) {
            $previousOffers[] = $row;
        } 
    }

    if (!empty($currentOffers)) {
        ?>
        <div id="currentbookings" style="display:none">
        <?php
            foreach ($currentOffers as $currentOffer) {
        ?>
        <div class="cbooking"><span class="t">Name:</span> <?php echo $currentOffer['HK_first_name'];?><br>
            <span class="t">Kind of job:</span> <?php echo $currentOffer['service'];?> <br>
            <span class="t">Type of job:</span> <?php echo $currentOffer['TYPE'];?> <br>
            <span class="t">Start date:</span> <?php echo $currentOffer['start_date'];?> <br>
            <span class="t">End date:</span> <?php echo $currentOffer['end_date'];?> <br>
            <img src="<?php echo $currentOffer['HK_photo'];?>" class="man"> <a href="HK-profile.html" class="profile">view profile</a>
            <button class="time">5:45:33</button></div>
            <?php
            }
            ?>
            <?php
    } else {
        echo "No current bookings ";
    }?></div>

<?php
    if (!empty($previousOffers)) {
        ?>

        <div id=previousbookings style="display:none">
        <?php
            foreach ($previousOffers as $previousOffer) {
        ?>
        <div class="pbooking"><span class="t">Name:</span><?php echo $previousOffer['HK_first_name'];?><br>
        <span class="t">Kind of job:</span> <?php echo $previousOffer['service'];?> <br>
            <span class="t">Type of job:</span> <?php echo $previousOffer['TYPE'];?> <br>
            <span class="t">Start date:</span> <?php echo $previousOffer['start_date'];?> <br>
            <span class="t">End date:</span> <?php echo $previousOffer['end_date'];?> <br>
            <img src="<?php echo $previousOffer['HK_photo'];?>" class="man"> <a href="HK-profile.html" class="profile">view profile</a>
            <button class="review"><a class="link-butt" href="rate.html" >review</a></button>
        </div>
        <?php
            }
            ?>
        <?php
    } else {
        echo "No previous bookings ";
    }?>
</div>
<?php
} else {
    echo "No bookings available";
}

?>
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