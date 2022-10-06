<?php 

  session_start();

  include 'connection.php';
  include_once 'function.php';
  error_reporting(0);

  if(isset($_SESSION['student_number'], $_SESSION['password'])) {

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7,8,edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	  <link href="assets/css/main.css" rel="stylesheet">
    <title>BORA - SIS | Balance</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
        <?php
        $query = "SELECT s.*,p.* FROM student_tbl s, payment_tbl p   WHERE s.id = p.s_id AND student_number = '".$_SESSION['student_number']."' AND password = '".$_SESSION['password']."'";

        if($result = mysqli_query($con, $query)) 
        {
          $row = mysqli_fetch_assoc($result);
        } 
      ?>
    <div class="container">
      <h2><strong>Dear <?php echo $row['firstname'];?></strong></h2>
 <h4>Your balance as of <strong><?php     $orgDate = $row['date_added']; 
    $newDate = date("d-m-Y", strtotime($orgDate)); echo $newDate;?></strong> is</h4> 
      <h1>&#8369;<?php echo $row['balance'];?></h1>
      <br><br>
      
      <p>PLEASE PROCEED TO THE BORA'S CASHIER TO SETTLE YOUR PAYMENT. THANK YOU, BORANIANS.</p>
    </div>
    
    
    
    
    
    
  <script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	 <?php include "footer.php";?>
  </body>
</html>

<?php


  } else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>