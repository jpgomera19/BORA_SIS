<?php
  session_start();
  include 'connection.php';
  include_once 'function.php';
  $errors = array();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
  $ip = getUserIpAdd();
  $time = time()-30;
  $check_attempt = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total_attempt FROM fattempt_tbl WHERE time_count>$time AND ip_address = '$ip'"));
  $total_count = $check_attempt['total_attempt'];
  if ($total_count==3) {
    $errors['student_number'] = "Users are now locked. Please wait for 30 seconds! ";
  }
  else
  {
  $username = clean(mysqli_real_escape_string($con, $_POST["user"]));
    $pass = clean(mysqli_real_escape_string($con, $_POST["pass"]));
    $enpass = clean(md5($pass));
  
  if(empty($username) && empty($pass))
  {
    $errors['username'] = "Please enter username and password! ";
  }
   else if(empty($username))
   {
     $errors['username'] = "Please enter username! ";
   }
   else if(empty($pass))
     {
       $errors['password'] = "Please enter password! ";
     }
     else 
     {
          $query = "SELECT username,password FROM user_tbl WHERE username = '$username' AND password = '$enpass'";
  
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0) {

           $row = mysqli_fetch_assoc($result);
           
          $_SESSION['userid'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['password'] = $row['password'];
      mysqli_query($con, "DELETE FROM fattempt_tbl WHERE ip_address = '$ip'");
     header("location: dashboard.php");
          exit(0);
          
     } 
            
    else 
      {
                $total_count++;   
        $time_remain=3-$total_count;  
        $time=time();  
        if($time_remain == 0)
        {
          $errors['student_number'] = "Users are now locked. Please wait for 30 seconds! ";
        }
        else
        {     
        $errors['username'] = "Username or Password is incorrect! ".$time_remain. " attempts  remaining. ";
    }
    mysqli_query($con, "INSERT INTO fattempt_tbl(ip_address,time_count) VALUES('$ip','$time')");
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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BORA - SIS | Admin  - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="body">
  
  
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center" >
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5" >
          <div class="card-body p-0"  >
            <!-- Nested Row within Card Body -->
            <div class="row" >
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                  <div class="p-5">
                  <div class="text-center">
                                      <img src="img/logo.png" alt="BORA LOGO" width="30%" class="img-responsive" />
                <h1 class="h4 text-gray-900 mb-4">BORA ADMIN PANEL</h1>
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
              </div>
  <form class="user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
      <div class="input-group mb-3">
        <input type="text" class="form-control" autofocus name="user" placeholder="Username">
          <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
      
                      <div class="input-group mb-3">
                <input type="password" class="form-control" name="pass" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
      <button type="submit" class="btn btn-dark btn-user btn-block" id="login" style="border-radius: 24px 4px; ">Login</button>
        <hr>
  </form>
        <hr>
     <div class="container-fluid ">
        <div class="copyright text-center ">
    <span style="font-size: 12px; ">Copyright &copy; Blue Oak Ridge Acedemy - BORA 2022  - Developed by: <a href="mailto:jpgomera19@gmail.com">Kineme</a></span>
                    </div>
                </div>
      </div>
        </div>
          </div>
            </div>
              </div>
              </div>
            </div>
          </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>