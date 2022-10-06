<?php

session_start();
include 'connection.php';
include_once 'function.php';
$errors = array();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
  $ip = getUserIpAdd();
  $time = time()-30;
  $check_attempt = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total_attempt FROM attempt_tbl WHERE time_count>$time AND ip_address = '$ip'"));
  $total_count = $check_attempt['total_attempt'];
  if ($total_count==3) {
    $errors['student_number'] = "Users are now locked. Please wait for 30 seconds! ";
  }
  else
  {
  $student_number = clean(mysqli_real_escape_string($con, $_POST["snum"]));
    $pass = clean(mysqli_real_escape_string($con, $_POST["pass"]));
    $enpass = clean(md5($pass));
  
  if(empty($student_number) && empty($pass))
  {
    $errors['student_number'] = "Please enter student number and password! ";
  }
   else if(empty($student_number))
   {
     $errors['student_number'] = "Please enter Student number! ";
   }
   else if(empty($pass))
     {
       $errors['password'] = "Please enter password! ";
     }
     else 
     {
          $query = "SELECT student_number,password FROM student_tbl WHERE student_number = '$student_number' AND password = '$enpass'";
  
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0) {

           $row = mysqli_fetch_assoc($result);
           
          $_SESSION['userid'] = $row['id'];
          $_SESSION['student_number'] = $row['student_number'];
          $_SESSION['password'] = $row['password'];
      mysqli_query($con, "DELETE FROM attempt_tbl WHERE ip_address = '$ip'");
          header("location: StudentHome.php");
          exit(0);
          
     } 
            
    else 
      {
        // $ip = getUserIpAdd();
        $total_count++;   
        $time_remain=3-$total_count;  
        $time=time();  
        if($time_remain == 0)
        {
          $errors['student_number'] = "Users are now locked. Please wait for 30 seconds! ";
        }
        else
        {
      $errors['student_number'] = "Username or Password is incorrect.\n" .$time_remain. " attempts  remaining. ";
        }
        mysqli_query($con, "INSERT INTO attempt_tbl(ip_address,time_count) VALUES('$ip','$time')");
        // $errors['student_number'] = "Username or Password is incorrect! ";
    }
  }
}
}
function getUserIpAdd(){
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
  {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip; 
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=7,8,edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/494d8a5cb9.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style-login.css" type="text/css" media="all" />
    <title>BORA Student Portal | Login</title>
  </head>
  
  <body>
    <ul class="slideshow">
  <li><span>aa</span></li>
  <li><span>bb</span></li>
  <li><span>cc</span></li>
  <li><span>dd</span></li>
  <li><span>ee</span></li>
  <li><span>ff</span></li>
</ul>

  <div id="container">
    <br><br><br><br><br><br>
    <a href="index.php">
      <button type="button" class="button">
        <img src="img/home.png" width="40" height="40"><br>HOME</button></a>

    <br>
      <button class="button"><img src="../img/search.png" width="40" height="40"><br>SEEK</button>
    <br>
      <button class="button"><img src="../img/call.png" width="40 " height="40"><br>SITE</button>
    <br><br>
</div>
    
    
    
    <div class="container p-2 text-center" id="box">
      <form class="row"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post" accept-charset="utf-8">
         <img src="img/logo.png" alt="BORA Logo" class="img-responsive mx-auto d-block" id="logo">
           <h2 class='container'>BORA STUDENT PORTAL</h2>
          <h3>Log-In Form</h3>
     <?php
    if(count($errors) > 0){ ?>
  <!--<div class="alert alert-danger alert-dismissile fade show text-center" id="danger-alert">-->
  <div class="container">
  <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert" id="myAlert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
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
    foreach($errors as $showerror)
    {
      echo $showerror;
    }
?>
  </div>
    </div>
  <?php
    }
  ?>    
          <hr color="#2d3436" size="1">
          <input type="number" name="snum" placeholder="Student number"  autocomplete="current-number">
  
          <input type="password" name="pass" placeholder="Password" id="myinput" autocomplete="current-password">
          
          <input type="submit" name="submit" id="login" value="Log-in">
          <p style="color: white; font-size: 12px; ">Forgotten Password? <a style="color: #eb2f06" href="forgot.php">Click here to reset</a></p>

          <a href="index.php" id="back">Back</a>

          <hr color="white" size="3" id="hr">
          <p style="font-size: 10px;">Copyright &copy; Blue Oak Ridge Acedemy - BORA 2022 - Developed by: <a href="mailto:jpgomera19@gmail.com">Kineme</a></p>
        
      </form>
      
    </div>
  </body>
</html>


