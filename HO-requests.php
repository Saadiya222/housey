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


        $message = [];
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="STYLE-shahad.css" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <title>Housey | Requests</title>
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
        <a href="#" class="menu"><i class="fa-solid fa-bars"></i></a>
    </header>

    <section class="main">


        <div class="addRequest"> <a href="create-req.php"> <img src="plus.png" ></a></div>
    <h2 class="title">My requests list</h2>


    <?php
     // $randomNumber =rand(1, 5);
     $email = $_SESSION['email'];
     // or
     // $name = $_SESSION['name'];
     
     // Rest of your code
     $sq="SELECT HO_email FROM houseowner INNER JOIN req ON HO_no=owner_no";
     $result1 = mysqli_query($conn, $sq); 
     if ($result1 && mysqli_num_rows($result1) > 0){ 
     $sql = "SELECT * FROM '$result1' WHERE HO_email = '$email'";
//$sql = "SELECT * FROM req WHERE owner_no = 1 ";   // 4 no req , 
$result = mysqli_query($conn, $sql); 
if ($result && mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) { 
$requestId = $row['request_Id'];
?> 


<div class="container">
    <div class="req-card">
        <div class="info"> <h3>Request for: <?php echo $row['service']?></h3></div>
        <ul>
            <li>Type: <?php echo $row['TYPE']?></li>
            <li>Availability: <?php echo $row['availability']?> </li>
            <li>Duration: <?php echo "<b>From:</b> " , $row['start_date'], " | <b>  To:</b> " ,$row['end_date'] ;?></li>
            
        </ul>
        <!--php-->
        
<form action="#" method="POST">
<button class="req-button" name="delete_button" onclick="confirm('are you sure you want to delete this request?');" value="<?php echo $requestId; ?>" >Cancle</button>
<button class="req-button" name="edit_button" value="<?php echo $requestId; ?>" > <a class="link-butt" >Edit</button> </a>
</form>

<button class="offer-button"><a class="link-butt" href="HO-offers.php" >View offers</a></button>
    </div>
  
</div>
       


<?php
}// end while loop //&& isset($_POST["theprice"])
if (isset($_POST["delete_button"]) ) {
    $requestId = $_POST["delete_button"];
    //$price = $_POST["theprice"];
     
$sql = "SELECT * FROM offers WHERE request_Id =$requestId AND offer_status= 'accepted' "; //culomn finish? .. WHERE NOT FINISH
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0)
{  echo "Sorry! you have an accepted offer So you can't delete the request " ; }else {
    $sql= "DELETE FROM req WHERE request_Id =$requestId ";
$result = mysqli_query($conn, $sql);
$message[]= 'data is deleted successfully';
//echo "data is deleted successfully"; 
}

} //end of POST delete button




if (isset($_POST["edit_button"]) ) {
    $requestId = $_POST["edit_button"];
    

$sql = "SELECT * FROM offers WHERE request_fk =$requestId AND offer_status= 'accepted' "; //culomn finish? .. WHERE NOT FINISH
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0)
{  echo "Sorry! you have an accepted offer So you can't edit the request " ; } else {

    header("Location: edit-requestform.php");
    exit(); }
  
} 

if(isset($message))
foreach ($message as $message) {
    echo '<div class="message">'.$message.'</div>';}


    }} //end large if statment
     else {
        // when no rows are returned
        echo " you don't have any request.";
        }
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

<?php   mysqli_close($conn);  ?>