<?php 

  session_start();

  include 'connection.php';
  include_once 'function.php';

  if(isset($_POST['update'])) {

    $oldpass = clean(md5($_POST['oldpass']));
    $newpass = clean(md5($_POST['newpass']));
    $confirmpass = clean(md5($_POST['confirmpass']));

    $query = "SELECT password FROM user_tbl WHERE password = '$oldpass'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {

      if($newpass == $confirmpass) {

        $query = "UPDATE user_tbl SET password = '$newpass' WHERE username ='".$_SESSION['username']."'";

        if($result = mysqli_query($con, $query)) {

          $_SESSION['success_message'] = "Password is succesfully updated!";
          $_SESSION['password'] = $newpass;
          header("location:userprofile.php");
          exit;

        } else {

          die("Error with the query");

        }

      } else {

        $_SESSION['errprompt'] = "The new passwords you entered doesn't match.";;

      }

    } else {

      $_SESSION['errprompt'] = "You've entered a wrong old password.";

    }

  }

  if(isset($_SESSION['username'], $_SESSION['password'])) {

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>BORA - SIS | Admin - Add Student</title>
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
      <strong class="title">Change Password</strong>
    </div>
    

    <div class="edit-form box-left clearfix">

      <?php 
        if(isset($_SESSION['errprompt'])) {
          showError();
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
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="card-body">

        <div class="form-group">
          <label for="oldpass">Old Password</label>
          <input type="password" class="form-control" name="oldpass" placeholder="Old Password" required>
        </div>


        <div class="form-group">
          <label for="newpass">New Password</label>
          <input type="password" class="form-control" name="newpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters. Makinig ka dahil once na mahack 'yang account mo, kami pa sisisihin mo! Hindot!" placeholder="New Password" required>
        </div>

        <div class="form-group">
          <label for="confirmpass">Confirm Password</label>
          <input type="password" class="form-control" name="confirmpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters. Makinig ka dahil once na mahack 'yang account mo, kami pa sisisihin mo! Hindot!" placeholder="Confirm Password" required>
        </div>

        <div class="form-footer">
          <a href="userprofile.php">Go back</a>
          <input class="btn btn-primary" type="submit" name="update" value="Update Password">
        </div>
        

      </form>
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
    header("location:userprofile.php");
  }

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>