<?php 
session_start();
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed" );
}
if(!mysqli_select_db($conn, $dbname))
        die("Could not open the ". $dbname." database.");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <link rel="stylesheet" href="STYLE-shahad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Housey | My offers</title>
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
        <h1 class="myofferss">My Offers</h1>
        <br>

      <div class="candp">
        <div class="Blocks" id="abutton"onclick="document.getElementById('accepted').style.display='block';document.getElementById('pending').style.display='none';document.getElementById('rejected').style.display='none';document.getElementById('abutton').style.backgroundColor='green';document.getElementById('pbutton').style.backgroundColor='#C5901A';document.getElementById('rbutton').style.backgroundColor='#C5901A'">Accepted</div> <br>
        <div class="Blocks"id="pbutton"onclick="document.getElementById('pending').style.display='block';document.getElementById('accepted').style.display='none';document.getElementById('rejected').style.display='none';document.getElementById('pbutton').style.backgroundColor='#755309';document.getElementById('abutton').style.backgroundColor='#C5901A';document.getElementById('rbutton').style.backgroundColor='#C5901A'">Pending </div> <br>
        <div class="Blocks" id="rbutton"onclick="document.getElementById('rejected').style.display='block';document.getElementById('pending').style.display='none';document.getElementById('accepted').style.display='none';document.getElementById('rbutton').style.backgroundColor='red';document.getElementById('pbutton').style.backgroundColor='#C5901A';document.getElementById('abutton').style.backgroundColor='#C5901A'">Rejected </div>
      </div>

       <div class="list">
<!--req.TYPE, req.availability, req.start_date, req.end_date 
$sql = "SELECT * FROM req INNER JOIN houseowner ON req.owner_id = houseowner.owner_id
    ORDER BY req.request_id";
-->
       
<?php
//$sql1 = "SELECT * FROM req INNER JOIN offers ON req.request_Id = offers.request_fk";
$sql1="SELECT houseowner.HO_first_name,offers.price,offers.offer_status,req.service,req.TYPE,req.availability,req.start_date,req.end_date FROM houseowner INNER JOIN req ON houseowner.HO_no=req.owner_no INNER JOIN offers ON offers.offerId=req.offer_id";
$result1 = mysqli_query($conn, $sql1);
if ($result1 && mysqli_num_rows($result1) > 0) {
    $pendingOffers = [];
    $acceptedOffers = [];
    $rejectedOffers = [];

    while ($row = mysqli_fetch_assoc($result1)) {
        if ($row['offer_status'] == "pending") {
            $pendingOffers[] = $row;
        } elseif ($row['offer_status'] == "accepted") {
            $acceptedOffers[] = $row;
        } elseif ($row['offer_status'] == "rejected") {
            $rejectedOffers[] = $row;
        }
    }


        ?>
        <div id="pending" style="display:none">
            <?php
                if (!empty($pendingOffers)) {
            foreach ($pendingOffers as $pendingOffer) {
                ?>
                <div class="c-Offers">
                    <div class="info">
                        <h3>You sent an offer with: <?php echo $pendingOffer['price']; ?></h3>
                    </div>
                    <div class="owner-user">
                        <img src="user.png" alt="user photo">
                    </div>
                    <div class="info">
                        <h5><?php echo $pendingOffer['HO_first_name']; ?></h5>
                    </div>
                    <div class="info-list">
                        <ul>
                            <li>Type of job: <?php echo $pendingOffer['TYPE']; ?></li>
                            <li>Availability: <?php echo $pendingOffer['availability']; ?></li>
                            <li>Start date: <?php echo $pendingOffer['start_date']; ?></li>
                            <li>End date: <?php echo $pendingOffer['end_date']; ?></li>
                            <li><a href="https://goo.gl/maps/YcPCQcZQX17CLSeY7"><img src="location.png" title="view location" class="location"></a></li>
                        </ul>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No offers pending";
        }
            ?>
        </div><!-- pending -->
        <?php



        ?>
        <div id="accepted" style="display:none">
            <?php
                if (!empty($acceptedOffers)) {
            foreach ($acceptedOffers as $acceptedOffer) {
                ?>
                <div class="c-Offers">
                    <div class="info">
                        <h3>You sent an offer with: <?php echo $acceptedOffer['price']; ?></h3>
                    </div>
                    <div class="owner-user">
                        <img src="user.png" alt="user photo">
                    </div>
                    <div class="info">
                        <h5><?php echo $acceptedOffer['HO_first_name']; ?></h5>
                    </div>
                    <div class="info-list">
                        <ul>
                            <li>Type of job: <?php echo $acceptedOffer['TYPE']; ?></li>
                            <li>Availability: <?php echo $acceptedOffer['availability']; ?></li>
                            <li>Start date: <?php echo $acceptedOffer['start_date']; ?></li>
                            <li>End date: <?php echo $acceptedOffer['end_date']; ?></li>
                            <li><a href="https://goo.gl/maps/YcPCQcZQX17CLSeY7"><img src="location.png" title="view location" class="location"></a></li>
                        </ul>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No offers accepted";
        }
            ?>
        </div><!-- accepted -->
        <?php



        ?>
        <div id="rejected" style="display:none">
            <?php
                if (!empty($rejectedOffers)) {
            foreach ($rejectedOffers as $rejectedOffer) {
                ?>
                <div class="c-Offers">
                    <div class="info">
                        <h3>You sent an offer with: <?php echo $rejectedOffer['price']; ?></h3>
                    </div>
                    <div class="owner-user">
                        <img src="user.png" alt="user photo">
                    </div>
                    <div class="info">
                        <h5><?php echo $rejectedOffer['HO_first_name']; ?></h5>
                    </div>
                    <div class="info-list">
                        <ul>
                            <li>Type of job: <?php echo $rejectedOffer['TYPE']; ?></li>
                            <li>Availability: <?php echo $rejectedOffer['availability']; ?></li>
                            <li>Start date: <?php echo $rejectedOffer['start_date']; ?></li>
                            <li>End date: <?php echo $rejectedOffer['end_date']; ?></li>
                            <li><a href="https://goo.gl/maps/YcPCQcZQX17CLSeY7"><img src="location.png" title="view location" class="location"></a></li>
                        </ul>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No offers rejected";
        }
            ?>
        </div><!-- rejected -->
        <?php

} else {
    echo "No offers available";
}

?>
       </div>  <!--end list -->

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