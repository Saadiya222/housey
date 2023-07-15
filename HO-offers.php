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



$email = $_SESSION['email'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="STYLE-shahad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <title>Housey | Offers</title>
</head>
<body>
    <header>
        <a href="#" class="logo">housey</a>
        <nav class="navigation">
            <a href="home-page.html">Home</a>
            <a href="services1.html">Services</a>
            <a href="home-page.html">About us</a>
            <a href="mailto:Housy@gmail.com">Contact</a>
        </nav>
        <a id="profile-dropdown"><i class="fa-solid fa-circle-user"></i></a>
    </header>

    <section class="main">

     
       

        <?php
      //$sql = "SELECT * FROM req,offers WHERE req.request_Id = offers.request_fk";
      $sql = "SELECT * FROM req, offers WHERE req.request_Id = offers.request_fk";

      $result = mysqli_query($conn, $sql);

      if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
      ?>
      
        <div class="container">

            <div class="req-card">
                <div class="info"><h3>Request for: <?php echo $row['service']; ?>
        </h3> </div>
                    <ul>
                        <li>Type: <?php echo $row['TYPE']?> </li>
                        <li>Availability:<?php echo $row['availability']?>      </li>
                        <li>Start date:<?php echo $row['start_date']?></li>
                        <li>End date:<?php echo $row['end_date']?></li>
                    </ul>                            
                  <!-- <button class="req-button" >Cancle</button>-->
            </div><br>
            <h2 class="title">Offers</h2>
            <?php
$sql1="SELECT housekeeper.HK_first_name,housekeeper.HK_photo,req.service,req.TYPE,req.start_date,req.end_date,offers.offer_status,offers.price FROM housekeeper INNER JOIN offers ON housekeeper.HK_ID=offers.keeperId INNER JOIN req ON req.request_Id=offers.request_fk";

$result1 = mysqli_query($conn, $sql1);
if ($result1 && mysqli_num_rows($result1) > 0) {
    $pendingOffers = [];

    while ($row = mysqli_fetch_assoc($result1)) {
        if ($row['offer_status'] == "pending") {
            $pendingOffers[] = $row;
        } else continue;
        } 
    }

    if (!empty($pendingOffers)) {
        ?>
                <div class="info">

                    <div class="offer-card"> 
                    <?php
            foreach ($pendingOffers as $pendingOffer) {
        ?>
                        <div class="users"> <img src = "woman-1.png" alt="user photo" ></div> 
                        <div class="info"> 
                            <a class="link-prof" href="HK-profile.html"><h5><?php echo $pendingOffer['HK_first_name']?></h5>
                            <h6 id="timer">Remining time: </h6>
                            <h6>40 Years</h6> </a>
                            <div class="price"><?php echo $pendingOffer['price'] ."$";?></div>
                            <button onclick="<?php "UPDATE offers SET offer_status WHERE request_fk=$pendingOffer.request_fk"; ?>">Accept</button> <button>Reject</button>
                        </div>
                    </div>
                </div>
        
            
        </div>
    <?php
        }
    } else {
        // Handle the case when no rows are returned
        echo " No offers post for the chosen request.";
        }
    } else {
        }
        
        ?>

       <script>
    let hours = 11;
    let minutes = 59;
    let seconds = 59;
    let countdownInterval;

    function startTimer() {
      countdownInterval = setInterval(updateTime, 1000); //like our slides
    }

    function updateTime() {
      if (seconds > 0) {
        seconds--;
      } else {
        if (minutes > 0) {
          minutes--;
          seconds = 59;
        } else {
          if (hours > 0) {
            hours--;
            minutes = 59;
            seconds = 59;
          } else {
            clearInterval(countdownInterval);
            endTimer();
          }
        }
      }

      displayCountdown();
    }

    function endTimer() {
      console.log("Countdown finished!");
    }

    function displayCountdown() {
      document.getElementById("timer").innerHTML = `${formatTime(hours)}:${formatTime(minutes)}:${formatTime(seconds)}`;
    }

    function formatTime(time) {
      return time.toString().padStart(2, "0");
    }

    window.addEventListener("load", function() {
      startTimer();
    }, false);
  </script>
    
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