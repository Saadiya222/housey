<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['create'])) {
    


$service = $_POST['kind'];
$typeTime = $_POST['TypeTime'];
$availability= $_POST['Availability'];
$startDate = $_POST['start_date'];  
$endDate = $_POST['end_date'];
$start = date('Y-m-d', strtotime($startDate));  
$end = date('Y-m-d', strtotime($endDate));



$email = $_SESSION['email'];
$query_owner = "SELECT HK_ID FROM housekeeper WHERE HK_email = '$email'";
$result_owner = $conn->query($query_owner);
$ownerno=$_SESSION['HO_no'];
if ($result_owner->num_rows > 0) {
    $row_owner = $result_owner->fetch_assoc();
    $owner_id = $row_owner['HK_ID'];
} else {
    // Handle the case if the owner's ID is not found
    // You can redirect to an error page or display an error message
}

    if ($start > $end) {
        echo "Invalid date range. Start date cannot exceed the end date.";
      } else {
        $query= "INSERT into req (service, TYPE, availability,owner_no , start_date, end_date) VALUES ('$service', '$typeTime' , '$availability', '$ownerno', '$start', '$end' )";
        $result=mysqli_query($conn, $query);
        if ($result) {
            echo 'Data add ';
        } else {
        echo 'Data not add ';
        }
      }    
    
    } //end if isset
    mysqli_close($conn);

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
    <title>Housey | Create request</title>
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

<div id="form-container">
    <h1 class="form-title">Make your request </h1>
    <form action="create-req.php" method="post">
        
    <div class="main-req-info">
            <h5 class="sup-title">please fill the form to create a request for house keeper</h5>
            <div class="user-choice-box">
                <lable for="kind" class="title-choice">Kind: </lable>
                <select name="kind" id="kind" required>
                <option selected hidden value="">select kind of service</option>
                <option value="Cleaner">cleaner</option>
                <option value="Cooker">cooker</option>
                <option value="Driver">Driver</option>
                <option value="Nurse">Nurse</option>
                </select>
            </div>
            
     <!--       <label class="durationLabel">Duration:</label>
<input class="inputDuration" name="duration" type="number" min="1" max="365" required>
<span class="errspan" style="color:red;font-size:15px;"><//?php echo $duration_err; ?></span> -->



            <div class="user-choice-box"> 
                <div class="title-choice">Type: </div>
                <div class="type-category">
                    <input type="radio" name="TypeTime" value="Part Time" id="Part Time" required>
                    <label for="Part Time">part time</label>
                    <input type="radio" name="TypeTime" value="Full Time" id="Full Time" required>
                    <label for="Full Time">full time</label>
                </div>
            </div>
            
            <div class="user-choice-box">
                <div class="title-choice">Availability: </div>
                <div class="avail-category">
                    <input type="radio" name="Availability" value="Week end" id="Weekend" required >
                    <label for="Weekend">Weekend</label>
                    <input type="radio" name="Availability" value="Week morning" id="Weekmorning" required>
                    <label for="Weekmorning">Week Morning</label>
                    <input type="radio" name="Availability" value="Week evening" id="Weekevening" required>
                    <label for="Weekevening">Week Evening</label>
                </div>
            </div>

            <div class="user-choice-box">
                <div class="title-choice">Duration: </div>
            <label class="title-choice">Start Date:</label>
            <input class="inputDay" name="start_date" type="date" min="<?php echo date('Y-m-d', strtotime('+1 days')); ?>" required>

            <label class="title-choice">End Date:</label>
            <input class="inputDay" name="end_date" type="date" min="<?php echo date('Y-m-d', strtotime('+2 days')); ?>" required>
            </div>
            
            </div>

            <!-- <label class="title-choice">From:</label>
            <input class="inputFromTime" name="from_time" type="time" required>

            <label class="title-choice">To:</label>
            <input class="inputToTime" name="to_time" type="time" required> -->
            <div class="form-submit">
                <input type="submit" name="create" value="Create">
            </div>
            <div class="form-submit">
             <input type="button"  id="cancle-btn-creat" value="Cancle" onclick="history.back()">
            </div>
            <?php 
           ?>
</div>

           

            
           
    </div> 
    </form>
</div> <!--container-->
 
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


