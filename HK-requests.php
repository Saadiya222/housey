<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
// This is request.php

//session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s";

$conn = mysqli_connect($servername,$username,$password);

if (!$conn )
die("Connection failed: ". mysqli_connect_error() );

if(!mysqli_select_db($conn, $dbname))
die("Could not open the ". $dbname ." database.");

/* cookie
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["thebutton"]) && isset($_POST["theprice"])) {
    $requestId = $_POST["thebutton"];
    $price = $_POST["theprice"];

    // Store the data in session
    $_SESSION["requestId"] = $requestId;
    $_SESSION["price"] = $price;

    // Redirect to process.php to handle the form submission

    header("Location: process.php");
    //exit();
  }
}
*/
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
  <title>Housey | Requests</title>
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
    <h2 class="title">My requests list</h2>

    <?php  ///////////////////////////////////////////////////////////////////////////////////////////////
    
    $sql = "SELECT req.request_id, req.service, houseowner.HO_first_name, req.TYPE, req.availability, req.start_date, req.end_date
    FROM req
    INNER JOIN houseowner ON req.owner_no = houseowner.HO_no   
    ORDER BY req.request_id";
    $result = mysqli_query($conn, $sql); 
    if ($result) {
      
      while ($row = mysqli_fetch_assoc($result)) {
              $requestId = $row['request_id'];
    ?> 

    

    <div class="container">
      <div class="req-card">
        <div class="info">
        
          <h3>Request for: <?php echo $row['service']; ?></h3>
        </div>
        <div class="owner-user">
          <img src="user.png" alt="user photo">
        </div>
        <div class="info">
          <h5><?php echo $row['HO_first_name']; ?></h5>
        </div>
        <div class="info-list">
          <ul>
            <li>Type: <?php echo $row['TYPE']; ?></li>
            <li>Availability: <?php echo $row['availability']; ?></li>
            <li>Duration: <?php echo "<b>From:</b> " , $row['start_date'], " | <b>  To:</b> " ,$row['end_date'] ;?></li>
            <li> <!--echo $row['duration'];--> 
              <a href="https://goo.gl/maps/YcPCQcZQX17CLSeY7">
                <img src="location.png" title="view location" class="location">
              </a>
            </li>
          </ul>
        </div>
        <h5 id="here"></h5> 
        <form method="POST" action="#">
          <button class="offer-button" name="thebutton" value="<?php echo $requestId; ?>"> Send offer </button>
          <input class="offer-button" name="theprice" type="text" placeholder="ex: 10$">
        
        </form>
      </div>
    </div>
    <?php
    
        } //end of while
    if (isset($_POST["thebutton"]) && isset($_POST["theprice"])) {
      $requestId = $_POST["thebutton"];
      $price = $_POST["theprice"];
  
      // Debugging statements
      echo "Request ID: " . $requestId . "<br>";
      echo "Price: " . $price . "<br>";
      $randomNumber = rand(1, 5);
      echo "Keeper ID: " . $randomNumber . "<br>"; 
      $query = "INSERT INTO offers (keeperId, request_fk, price) VALUES ('$randomNumber', '$requestId', '$price') WHERE offers.request_fk=$requestId"; 
      $result = mysqli_query($conn, $query);
      
      echo "data is add successfully";
    
    }
  }   else {
    echo "Error executing the query: " . mysqli_error($conn); //i think "you don't have any request"
  }
  //  if ($result) {
    //  echo 'Data add ';
  //} else {
    //echo 'Data not add ';
  //}
    mysqli_close($conn);
    ?> 

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