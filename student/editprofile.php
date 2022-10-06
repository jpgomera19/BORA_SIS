<?php 

  session_start();

  include 'connection.php';
  include_once 'function.php';
  
  if(isset($_POST['update'])) {

    $fname = clean($_POST['firstname']);
    $mname = clean($_POST['middlename']);
    $lname = clean($_POST['lastname']);
    $gender = clean($_POST['gender']);
    $age = clean($_POST['age']);
    $birthday = clean($_POST['birthday']);
    $email = clean($_POST['email']);
    $contact = clean($_POST['contact']);
    
    
    $query = "UPDATE student_tbl SET firstname = '$fname', middlename = '$mname', lastname = '$lname', gender = '$gender', age = '$age', birthday = '$birthday', email = '$email', contact_number = '$contact' WHERE student_number ='".$_SESSION['student_number']."'";

    if($result = mysqli_query($con, $query)) 
    {
      $_SESSION['prompt'] = "Profile Updated";
      header("location:profile.php");
      exit;
    } 
    else 
    {
      die("Error with the query");
    }
  }

  if(isset($_SESSION['student_number'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">

	<title>BORA - SIS | Edit Profile</title>

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
      <strong class="title">Edit Profile</strong>
    </div>
    

    <div class="edit-form box-left clearfix">
          <div class="container bg-white p-2 " id="container">
      
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

        <div class="form-group">
          <label>Student No:</label>
          <input type="text" class="form-control" name="firstname" value="<?php echo $_SESSION['student_number'];?>" disabled>
          
          <?php 
            $query = "SELECT student_number FROM student_tbl WHERE id = '".$_SESSION['userid']."'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);

            echo "<p>".$row[0]."</p>";
          ?>

        </div>


        <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
        </div>
        
        <div class="form-group">
          <label for="middlename">Middle Name</label>
          <input type="text" class="form-control" name="middlename" placeholder="Middle Name" required>
        </div>


        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
        </div>

         <div class="form-group">
          <label for="gender">Gender</label>

          <select class="form-control" name="gender">
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
        
         <div class="form-group">
          <label for="Age">Age</label>
          <input type="number" class="form-control" name="age" placeholder="Age" required>
        </div>
        
         <div class="form-group">
          <label for="birthday">Birthday</label>
          <input type="text" name="birthday" class="form-control" id="birthday" min="1960-01-01" max="2005-01-01" placeholder="BIRTHDAY (Double click...)"  onfocus="(this.type='date')" oninput="this.className = ''" required autofocus>
        </div>
        
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email Address" required>
        </div>
        
         <div class="form-group">
          <label for="contact">Contact Number</label>
          <input type="number" class="form-control" name="contact" placeholder="Contact Number" required>
        </div>
        
        
         <div class="form-footer">
          <a href="profile.php">Go back</a>
          <input class="btn btn-primary" type="submit" name="update" value="Update Profile">
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
    header("location:profile.php");
  }

  mysqli_close($con);

?>