<?php
  session_start();
  include 'connection.php';
  include_once 'function.php';
  error_reporting(0);


if(isset($_SESSION['username'], $_SESSION['password'])) {
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BORA - SIS | Admin - User Table</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  </head>
  <body>
     <?php include "header.php"?>
      <div class="container-fluid">

                    <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">User Profile</h1>

                    <!-- DataTales Example -->
      <div class="card shadow mb-4">
      <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark"><strong>My Profile</strong></h6>
        </div> 
        <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
    <div class="alert alert-success" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
    <?php
    unset($_SESSION['success_message']);
                    }
                    ?>
                      <script>
$(document).ready(function () {
  window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 3000);
 
});
  </script>
             <?php 
          $query = "SELECT * FROM user_tbl WHERE username ='".$_SESSION['username']."'";
          if($result = mysqli_query($con, $query)) {

            while($row = mysqli_fetch_assoc($result)){
            $image = $row['image'];
          ?>
            <div class="w-100">
        <center>
          <img class="img-circle" style="flex: none;width: 200px;height: 200px;border-radius: 50%;object-fit: cover;" <?php echo '<img src="image/'.$image.'" />';?>
      <?php }}?>
      </center>
      <center> <a class="btn btn-dark" href="settings.php">Change Photo</a></center>
           
      </div>
      
      
      
      <div class="card-body">
 
         <?php
      $query = "SELECT * FROM user_tbl WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";
      
      
      if($result = mysqli_query($con, $query)) {

      $row = mysqli_fetch_assoc($result);
    
      echo "<div class='info'><strong>Username:</strong> <span>".$row['username']." </span></div>";
      echo "</br>";
      
      echo "<div class='info'><strong>Name:</strong> <span>".$row['lastname'].", ".$row['firstname']." ".$row['middlename']." </span></div>";
      echo "</br>";
      echo "<div class='info'><strong>Email:</strong> <span>".$row['email']." </span></div>";
      echo "</br>";
      $query_date = "SELECT DATE_FORMAT(date_added, '%m/%d/%Y %h:%i:%s') FROM user_tbl ";
          $result = mysqli_query($con, $query_date);

          $row = mysqli_fetch_row($result);

          echo "<div class='info'><strong>Date Joined:</strong> <span>".$row[0]."</span></div>";
          
      echo "</br>";
      $query_date = "SELECT DATE_FORMAT(date_updated, '%m/%d/%Y %h:%i:%s') FROM user_tbl where username = '".$_SESSION['username']."'";
          $result = mysqli_query($con, $query_date);

          $row = mysqli_fetch_row($result);

          echo "<div class='info'><strong>Date Updated:</strong> <span>".$row[0]."</span></div>";
          echo "</br>";
       } 
       
       ?>

      
      <form action="updateUserProfile.php" method="post">
          <input type="hidden" name="edit_users" id="edit_users" value="<?php echo $row['u_id'];?>"/>
          <button class="btn btn-success"  type="submit"><i class="fa fa-edit">Edit profile</i></button>
        </form><br>
      <form action="updateUserPassword.php" method="post">
          <input type="hidden" name="edit_user" id="edit_user" value="<?php echo $row['u_id'];?>"/>
          <button class="btn btn-warning"  type="submit"><i class="fa fa-edit">Change password</i></button>
        </form>
      
      
      
      
      </div>
      </div>
      </div>
     
     
     
     
     
     
     
     
     
     <?php include "footer.php"?>
  </body>
</html>
<?php


  } else {
    header("location:index.php");
    session_destroy();
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>