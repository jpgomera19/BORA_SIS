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
    <title>BORA - SIS | Grades</title>
  </head>
  <body>
    <?php include 'header.php'; ?>

    
    <div class="container">
      <h2>Grade History</h2>
          <?php
      $query = "SELECT s.*,c.*,g.* FROM student_tbl s, subject_tbl c, grades_tbl g WHERE s.id = g.s_id AND c.subject_id = g.subject_id AND student_number = '".$_SESSION['student_number']."'";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result))
      {
        while($row = mysqli_fetch_assoc($result))
        {
    ?>
      <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">

   
        <tr>
         <th>Subject Code - &nbsp; <?php echo $row['subject_code'];?></th>
          </tr>
          <tr>
            <th>Subject Name - &nbsp; <?php echo $row['subject_name'];?></th>
          </tr>
          <tr>
            <th>Credits - &nbsp; <?php echo $row['credit'];?></th>
          </tr>
          <tr>
            <th>Prelim - &nbsp; <?php echo $row['prelim'];?></th>
          </tr>
          <tr>
            <th>Midterm - &nbsp; <?php echo $row['midterm'];?></th>
          </tr>
          <tr>
            <th>Finals - &nbsp; <?php echo $row['finals'];?></th>
          </tr>
          <tr>
            <th>Final Marks - &nbsp; <?php
            if($row['mark'] == "PASSED")
            {
            echo '<span class="btn btn-success px-3">'.$row['mark'].'</span>';
            }
            else if($row['mark'] == "FAILED")
            {
            echo '<span class="btn btn-danger px-3">'.$row['mark'].'</span>';
            }
              
              
              ?>
            
            </th>
            <br>
          </tr>
        <?php
          echo nl2br("\n");
        ?>
    <?php
      }
    }
    ?>     
    
        </table>
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