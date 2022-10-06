<?php 

  session_start();

  include 'connection.php';
  include_once 'function.php';

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
	 <link rel="stylesheet" href="css/studenthome.css" type="text/css" media="all" />

    <title>BORA - SIS | Homepage</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <?php
        $query = "SELECT * FROM student_tbl WHERE student_number = '".$_SESSION['student_number']."' AND password = '".$_SESSION['password']."'";

        if($result = mysqli_query($con, $query)) 
        {
          $row = mysqli_fetch_assoc($result);
        } 
      ?>
    <!--<div class="container text-center">-->
    <!--<div class="welcome"><p>Welcome!  </p>< ?php echo "<a href='profile.php'>".$row['firstname']."</a>";?></div>-->
  
  <div class="container text-center">
  <div class="animated-title">
  <div class="text-top">
    <div>
      <span>Welcome,</span>
      <span><?php echo "<a href='profile.php'>".$row['firstname']."</a>";?></span>
    </div>
  </div>
  <div class="text-bottom">
    <div>BORA STUDENT PORTAL</div>
  </div>
</div>
</div>
<br>
<br>
<br>
    
    <div>
      <img src="img/women3.png" alt="User Default Image" class="img-rounded mx-auto d-block"  id="logo">
    </div>
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