<?php 

  session_start();

  require 'connection.php';
  require 'function.php';


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
	<title>BORA - SIS | Search Result</title>
	
	
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

    <?php 

      if(isset($_GET['search'])) {

        $s = clean($_GET['searchbox']);

$query = "SELECT student_number, firstname, middlename, lastname, course, yearlevel, section, age, gender, DATE_FORMAT(date, '%m/%d/%Y') as date, CONCAT(firstname, ' ' , middlename, ' ', lastname) as fullname 
        FROM student_tbl WHERE CONCAT(firstname,' ' , middlename,  ' ', lastname) = '$s' OR firstname = '$s' OR middlename = '$s'OR lastname = '$s' ORDER BY date DESC LIMIT 5";
    ?>

    <div class="container">
      <strong class="title">Search results for "<?php echo $s; ?>".</strong>


    


    <?php

        if($result = mysqli_query($con, $query)) {

          if(mysqli_num_rows($result) == 0) {

            echo "<p>No results matches to your search.</p>";
            echo "</div>";

          } 
          else {
            echo "</div>";
            echo "<ul class='profile-results'>";

            while($row = mysqli_fetch_assoc($result)) {

          ?>

              <li>
                <div class="result-box box-left">
                  <div class='info'><strong>Student No:</strong> <span><?php echo $row['student_number']; ?></span></div>
<div class='info'><strong>Student Name:</strong> 
<span><?php echo $row['lastname']. ", ".$row['firstname']. " ".$row['middlename']; ?></span></div>
                  <div class='info'><strong>Course:</strong> <span><?php echo $row['course']; ?></span></div>
                  <div class='info'><strong>Year Level:</strong> <span><?php echo $row['yearlevel']; ?></span></div>
                  <div class='info'><strong>Section :</strong> <span><?php echo $row['section']; ?></span></div>
                  <div class='info'><strong>Age:</strong> <span><?php echo $row['age']; ?></span></div>
                  <div class='info'><strong>Gender:</strong> <span><?php echo $row['gender']; ?></span></div>
                  <div class='info'><strong>Date Joined:</strong> <span><?php echo $row['date']; ?></span></div>
                </div>
              </li>

          <?php

            }

            echo "</ul>";

          }

        } else {
          die("Error with the query");
        }

      }


    ?>
  
    <div class="container">
      <a href="profile.php">Go back to My Profile</a>
    </div>
    

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>

<?php 

  } else {
    header("location:index.php");
    exit;
  }

  mysqli_close($con);

?>