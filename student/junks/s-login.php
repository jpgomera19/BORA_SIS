<?php
session_start();
include 'connection.php';
include_once 'function.php';
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $student_number = clean(mysqli_real_escape_string($con, $_POST["snum"]));
    $pass = clean(mysqli_real_escape_string($con, $_POST["pass"]));
    $enpass = clean(md5($pass));
    
   if(!empty($student_number) && !empty($enpass)){
      $query = "SELECT student_number,password FROM student_tbl WHERE student_number = '$student_number' AND password = '$enpass'";
  
  $result = mysqli_query($con, $query);
  if(mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);
      
      $_SESSION['student_number'] = $row['student_number'];
      $_SESSION['password'] = $row['password'];
      
      header("location: index.php");
      exit(0);

    } 
    else 
    {
       $errors['student_number'] = "Username or Password is incorrect!";
    }
   } 
}
?>

<!DOCTYPE html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="css/style-login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/494d8a5cb9.js" crossorigin="anonymous"></script>
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

  <div class="" id="container">
    <br><br><br><br><br><br>
    <a href="index.php">
      <button type="button" class="button">
        <img src="img/home.png" width="40" height="40"><br>HOME</button></a>

    
      <button class="button"><img src="../img/search.png" width="40" height="40"><br>SEEK</button>
    <br>
      <button class="button"><img src="../img/call.png" width="40 " height="40"><br>SITE</button>
    <br><br>
</div>

<form class="box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
  <img src="img/logo.png" width="80" height="90">
  <h3>BORA STUDENT PORTAL</h3>
  <h1>Log-In Form</h1>
   <?php
    if(count($errors) > 0){ ?>
  <div class="alert alert-danger text-center">
  <?php
    foreach($errors as $showerror)
    {
      echo $showerror;
    }
?>
  </div>
  <?php
    }
  ?>
  <hr color="#2d3436" size="1">
  <input type="number" name="snum" placeholder="STUDENT NUMBER" required autocomplete="current-number">
  
  <input type="password" name="pass" placeholder="Password" id="myinput" required autocomplete="current-password">
  <span id="eyes" onclick="myFunction()">
    <i id="hide1" class="fas fa-eye"  ></i>
    <i id="hide2" class="fas fa-eye-slash"></i>
  </span>
  
  
  <input type="submit" name="submit" value="Log-in">
  <p style="color: white">Forgotten Password? <a style="color: #eb2f06" href="forgot.php">Click here to reset</a></p>
  <p>&copy;Blue Oak Ridge Academy. All rights reserved.</p>
    <script>
      function myFunction() {
        var x = document.getElementById("myinput");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");
        
        if (x.type === "password"){
          x.type = "text";
          y.style.display = "block"; 
          z.style.display = "none";
        }
        
        else{
          x.type = "password";
          y.style.display = "none"; 
          z.style.display = "block";
        }
      }
    </script>
    </form>
</body>
</html>