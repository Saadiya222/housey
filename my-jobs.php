<?php 
//session_start();

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


$email = $_SESSION['HK_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="my jobs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <title>Housey | My jobs</title>
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

    <section class="main">


        <h1 class="myjobs">My jobs</h1>
        <br>

        <div class="candp">
        <div class="current" id="cbutton"onclick="document.getElementById('currentbookings').style.display='block';document.getElementById('previousbookings').style.display='none';document.getElementById('cbutton').style.backgroundColor='#755309';document.getElementById('pbutton').style.backgroundColor='#C5901A'">Current</div> <br>
        <div class="previous" id="pbutton"onclick="document.getElementById('previousbookings').style.display='block';document.getElementById('currentbookings').style.display='none';document.getElementById('pbutton').style.backgroundColor='#755309';document.getElementById('cbutton').style.backgroundColor='#C5901A'"> Previous </div>
      </div>

       <div class="list">
       <?php
//$sql1="SELECT houseowner.HO_first_name,offers.price,offers.offer_status,req.service,req.TYPE,req.availability,req.start_date,req.end_date FROM houseowner INNER JOIN req ON houseowner.HO_no=req.owner_no INNER JOIN offers ON offers.offerId=req.offer_id";
$sql1 = "SELECT houseowner.HO_first_name, offers.price, offers.offer_status, req.service, req.TYPE, req.availability, req.start_date, req.end_date 
         FROM houseowner 
         INNER JOIN req ON houseowner.HO_no = req.owner_no 
         INNER JOIN offers ON offers.offerId = req.offer_id 
         WHERE houseowner.email = '$email'";

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
        <div class="cbooking">
            <a href="" class="profile"><img src="man-1.png" class="man" title="view profile"> </a><br>
            <span class="t">Name:</span> <?php echo $currentOffer['HO_first_name'];?><br>
            <span class="t">Start date:</span> <?php echo $currentOffer['start_date'];?> <br>
            <span class="t">End date:</span><?php echo $currentOffer['end_date'];?> <br>
            <span class="t">Type of job:</span> <?php echo $currentOffer['TYPE'];?> <br>
            <span class="t">Availability:</span> <?php echo $currentOffer['availability'];?> <br>
            <a href=""><img src="location.png" title="view location" class="location"></a>
            <button class="time" style="display:hidden">5:45:33</button></div>
            <?php
            }
            ?>
            <?php
    } else {
        echo "No current jobs ";
    }?></div>
<?php
    if (!empty($previousOffers)) {
        ?>

        <div id="previousbookings"style="display:none">
        <?php
            foreach ($previousOffers as $previousOffer) {
        ?>
        <div class="pbooking">
            <a href="" class="profile"><img src="man-1.png" class="man" title="view profile"> </a><br>
            <span class="t">Name:</span><?php echo $previousOffer['HO_first_name'];?><br>
            <span class="t">Start date:</span> <?php echo $previousOffer['start_date'];?> <br>
            <span class="t">End date:</span><?php echo $previousOffer['end_date'];?> <br>
            <span class="t">Type of job:</span> <?php echo $previousOffer['TYPE'];?> <br>
            <span class="t">Availability:</span> <?php echo $previousOffer['availability'];?> <br>
            <button class="review">view review</button>
        </div>
        <?php
            }
            ?>
        <?php
    } else {
        echo "No previous jobs ";
    }?>
</div>
<?php
} else {
    echo "No jobs available";
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