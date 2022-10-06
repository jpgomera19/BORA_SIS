<?php 

  session_start();

  include 'connection.php';
  include_once 'function.php';

  if(isset($_SESSION['student_number'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
  

	<title>Profile - Student Information System</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  <?php include 'header.php'; ?>

  <section>

    <div class="container">
      <strong class="title">My Profile</strong>
    </div>
    
    
 <div class="profile-box box-left">

      <?php

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }

$query = "SELECT s.*,b.*,a.* 
    FROM student_tbl s,section_tbl b , assign_tbl a
    WHERE s.id = a.student_id AND b.sec_id = a.section_id AND student_number = '".$_SESSION['student_number']."'";
    
        

        

        if($result = mysqli_query($con, $query)) {

          $row = mysqli_fetch_assoc($result);
          
      
      if($row['status'] == "Active")
      {
      echo '<div class="info"><strong>Your status:</strong> <span class="rounded-pill badge badge-success bg-gradient-success px-3">' .$row['status'].'</span></div>';
          echo "</br>";

      }
     if($row['status'] == "Inactive")
      {
      echo '<div class="info"><strong>Your status:</strong> <span class="rounded-pill badge badge-danger bg-gradient-danger px-3">' .$row['status'].'</span></div>';
          echo "</br>";
      } 
          
          
          echo "<div class='info'><strong>Student No:</strong> <span>".$row['student_number']."</span></div>";
          echo "<div class='info'><strong>Student Name:</strong> <span>".$row['lastname'].", ".$row['firstname']." ".$row['middlename']." </span></div>";
          echo "<div class='info'><strong>Course:</strong> <span>".$row['course']."</span></div><br>";
          echo "<div class='info'><strong>Year Level:</strong> <span>".$row['yearlevel']."</span></div><br>";
          echo "<div class='info'><strong>Section:</strong> <span>".$row['section_name']."</span></div><br>";
          echo "<div class='info'><strong>Student Type:</strong> <span>".$row['type']."</span></div><br>";
          echo "<div class='info'><strong>Gender:</strong> <span>".$row['gender']."</span></div><br>";
          echo "<div class='info'><strong>Age:</strong> <span>".$row['age']." year's old</span></div><br>";
          
          echo "<div class='info'><strong>Email Address:</strong> <span>".$row['email']."</span></div><br>";
          
          echo "<div class='info'><strong>Contact Number:</strong> <span>".$row['contact_number']."</span></div><br>";
          
          $query_date = "SELECT DATE_FORMAT(birthday, '%m/%d/%Y') FROM student_tbl WHERE student_number = '".$_SESSION['student_number']."'";
          $result = mysqli_query($con, $query_date);

          $row = mysqli_fetch_row($result);

          echo "<div class='info'><strong>Birthday:</strong> <span>".$row[0]."</span></div>";
          
          $query_date = "SELECT DATE_FORMAT(date, '%m/%d/%Y') FROM student_tbl WHERE student_number = '".$_SESSION['student_number']."'";
          $result = mysqli_query($con, $query_date);

          $row = mysqli_fetch_row($result);

          echo "<div class='info'><strong>Date and Time Joined:</strong> <span>".$row[0]."</span></div>";
          


        } else {

          die("Error with the query in the database");

        }

      ?>
      
      <div class="options">
        <a class="btn btn-info" href="editprofile.php">Edit Profile</a>
        <a class="btn btn-warning text-black" href="changePassword.php">Change Password</a>
      </div>

      
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
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