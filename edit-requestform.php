<?php

//session_start();

/*   */


if(isset($_POST['update'])) { 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s";

$service = $_POST['kind'];
$typeTime = $_POST['TypeTime'];
$availability= $_POST['Availability'];
$startDate = $_POST['start_date'];  
$endDate = $_POST['end_date'];
$start = date('Y-m-d', strtotime($startDate));  
$end = date('Y-m-d', strtotime($endDate));

$conn = mysqli_connect($servername,$username,$password);

if (!$conn )
die("Connection failed: ". mysqli_connect_error() );

if(!mysqli_select_db($conn, $dbname))
die("Could not open the ". $dbname ." database.");





  if ($start > $end) {
    echo "Invalid date range. Start date cannot exceed the end date.";
  } else { 
$query = "UPDATE req SET service='$service', TYPE='$typeTime', availability='$availability', start_date='$start', end_date='$end' WHERE request_Id=4";
    $result=mysqli_query($conn, $query);
    if ($result) {
        echo 'Your request is updated successfully ';
    } else {
    echo 'Sorry! Your request did not update';
    }
  }   
   mysqli_close($conn);
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="housey2n.png" type="image/x-icon">
    <title>Housey | Edit request</title>
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

        <div id="form-container">
            <h1 class="form-title">Edit your request </h1>
            <form action="#" method="post">
                
                <div class="main-req-info">
                    <h5 class="sup-title"></h5>
                    <div class="user-choice-box">
                        <lable for="kind" class="title-choice">Kind: </lable>
                        <select name="kind" id="kind">
                            <option value="Cleaner">cleaner</option>
                            <option value="Cooker" >cooker</option>
                            <option selected value="Driver">Driver</option>
                            <option value="Nurse">Nurse</option>
                        </select>
                    </div>
                
                    <div class="user-choice-box">
                        <div class="title-choice">Type: </div>
                        <div class="type-category">
                            <input type="radio" value="Part Time" name="TypeTime" id="Part-Time" checked>
                            <label for="Part-Time">Part Time</label>
                            <input type="radio" value="Full Time" name="TypeTime" id="Full-Time">
                            <label for="Full-Time">Full Time</label>  
                    </div>
                    </div>
                    <div class="user-choice-box">
                        <div class="title-choice">Availability: </div>
                        <div class="avail-category">
                            <input type="radio" value="Weekend" name="Availability" id="Weekend" checked>
                            <label for="Weekend">Weekend</label>
                            <input type="radio" value="Week Morning" name="Availability" id="Weekmorning" >
                            <label for="Weekmorning">Week Morning</label>
                            <input type="radio" value="Week evening" name="Availability" id="Weekevening">
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



                    <div class="form-submit">
                          <input type="submit" name="update" value="update">
                    </div>
                    <div class="form-submit">
                        <input type="button" id="cancle-btn-creat" value="Cancle" onclick="history.back()">
                    </div>
                </div>  
            </form>
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
