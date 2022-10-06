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
	 
    <title>BORA - SIS | Certificate Of Enrollment</title>

  </head>
  <body>
    <?php include 'header.php'; ?>
  
  <div class="container">
       <h1 style="text-align: center;  ">      <img width="10%" src="img/logo.png" alt="BORA Logo">     BLUE OAK RIDGE ACADEMY </h1>
      <h3 class="text text-center">      C E R T I F I C A T E__O F__R E G I S T R A T I O N</h3>


      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="border: 1px solid black;">
        <tr>
          <th colspan="12" style="text-align: center;">STUDENT GENERAL INFORMATION </th>
        </tr>
    <?php
      
    $query = "SELECT * FROM student_tbl WHERE student_number = '".$_SESSION['student_number']."'";
    

        if($result = mysqli_query($con, $query)) {

          $row = mysqli_fetch_assoc($result);
    ?>
        <tr>
          <th>STUDENT NUMBER: <?php echo $row['student_number'];?></th>
          <th>CONTACT NUMBER:  <?php echo $row['contact_number'];?></th>
        </tr>
        <tr>
<th>FULL NAME:  <?php echo $row['lastname'],", ", $row['firstname']," " ,$row['middlename'];?></th>
          <th>COURSE:  <?php echo $row['course'];?></th>
        </tr>
        <tr>
          <th>GENDER:  <?php echo $row['gender'];?></th>
          <th>BIRTHDAY:  <?php echo $row['birthday'];?></th>
        </tr>
        <tr>
          <th>AGE:  <?php echo $row['age'];?></th>
          <th>YEAR LEVEL:  <?php echo $row['yearlevel'];?></th>
        </tr>
      <?php 
        }
      ?>
      </table>



    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
        <th colspan="12" style="text-align: center;">SCHEDULE</th>
        </tr>
        <tr>
          <th>CODE</th>
          <th>SUBJECT</th>
          <th>CREDIT</th>
          <th>SECTION</th>
          <th>ROOM NUMBER</th>
        </tr>
      </thead>
      <tbody>
        <?php
$query = "SELECT s.*,c.*,b.*,a.* FROM section_tbl c, subject_tbl b, assign_tbl a, student_tbl s WHERE c.sec_id = a.section_id AND b.subject_id = a.subject_id AND s.id = a.student_id AND student_number = '".$_SESSION['student_number']."'";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result))
      {
        while($row = mysqli_fetch_assoc($result))
        {
?>
        <tr>
          <th><?php echo $row['subject_code'];?></th>
          <th><?php echo $row['subject_name'];?></th>
          <th><?php echo $row['credit'];?></th>
          <th> <?php echo $row['section_name'];?></th>
          <th> <?php echo $row['room_number'];?></th>
        </tr>
        <?php 
        }
      }
        ?>
      </tbody>
    </table>
    <input type="button" class="btn" style="background: black; color: white;" onclick="window.print()" value="Print COR"></button>
    
   </div> 
   </div> 
    
    
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