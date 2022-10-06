<?php
  session_start();
  require "connection.php";
  require "function.php";
  $errors = array();
  
  //If submit button is clicked//
  if(isset($_POST["submit"])) 
  {
    $student_number = clean(mysqli_real_escape_string($con, $_POST["snum"]));
    $pass = clean(mysqli_real_escape_string($con, $_POST["pass"]));
    $enpass = clean(md5($pass));
    $conpass = clean(md5($_POST["conpass"]));
    $firstname = clean(mysqli_real_escape_string($con, $_POST["fname"]));
    $middlename = clean(mysqli_real_escape_string($con, $_POST["mname"]));
    $lastname = clean(mysqli_real_escape_string($con, $_POST["lname"]));
    $course = clean(mysqli_real_escape_string($con, $_POST["course"]));
    $year_level = clean(mysqli_real_escape_string($con, $_POST["yrlevel"]));
    $section = clean(mysqli_real_escape_string($con, $_POST["section"]));
    $gender = clean(mysqli_real_escape_string($con, $_POST["gender"]));
    $age = clean(mysqli_real_escape_string($con, $_POST["age"]));
    $email = clean(mysqli_real_escape_string($con, $_POST["email"]));
    $contact = clean(mysqli_real_escape_string($con, $_POST["contact"]));
    
    //For PASSWORD MATCHING //
    if($enpass !== $conpass)
    {
        $errors['password'] = "Confirm password not matched!";
    }
    else
    {

        //For Student Id Confirmation
        $chck_student_no = "SELECT * FROM student_tbl WHERE student_number = '$student_number'";
        $res = mysqli_query($con, $chck_student_no);
        
        if(mysqli_num_rows($res) > 0)
        {
          $errors['student_number'] = "Student Number is already exist!";
        }
  
  
    else
    {
        //For Email Checking
        $email_check = "SELECT * FROM student_tbl WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
          if(mysqli_num_rows($res) > 0)
          {
            $errors['email'] = "Email is already exist!";
          } 
    
      else
      {
        // Checking if all the data is not empty//
        if (!empty($student_number) && !empty($enpass) &&!empty($firstname) &&!empty($middlename) &&!empty($lastname) &&!empty($course) &&!empty($year_level) &&!empty($section) && !empty($gender) &&!empty($age) &&!empty($email) &&!empty($contact)) 
        {
      //Insert Query//
      $query = "INSERT INTO student_tbl(student_number, password, firstname, middlename, lastname, course, yearlevel, section, gender, age, email, contact_number) VALUES('$student_number','$enpass','$firstname','$middlename','$lastname','$course','$year_level','$section','$gender','$age','$email','$contact')";
      
      $result = mysqli_query($con, $query);
        
        //Redirect the user in login modulee if all the information needed are completed//
        header("location: s-login.php");
      
      }
      else
      {
        echo "Please fill out all the information needed.";
      }
      }
      
    }
    
  }
  }
  

?>

<!--HTML FOR SIGN UP-->
<!DOCTYPE HTML>
<html lang="us">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <link rel="stylesheet" href="css/style-signup.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/494d8a5cb9.js" crossorigin="anonymous"></script>

    <title> BORA SIS | SIGN UP </title>
  </head>
  
  <body>
  <div class="box">
    <br />
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       <div class="logo-signup" style="text-align: center;">
         <img src="img/Logo-signup.jpg" alt="Sign Up Logo" height="100px" width="100px">
       </div>
    <h2>BORA STUDENT PORTAL</h2>
    <h3 style="text-align: center;">Sign Up Form</h3>
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
  <div class="input_box">
    <i class="fas fa-users"></i>
      <input type="number" placeholder="STUDENT NUMBER" name="snum" id="snum" required autofocus>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <div class="input_box">
    <i class="fas fa-key"></i>
<input type="password" placeholder="PASSWORD" id="myinput" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters. Makinig ka dahil once na mahack 'yang account mo, kami pa sisisihin mo! Hindot!" required autofocus>
<span class="eyes" onclick="myFunction()">
<i id="hide1" class="fas fa-eye"></i>
<i id="hide2" class="fas fa-eye-slash"></i>
</span>
</div>
<span id='message' style="position: absolute; margin: 1rem 25rem; width:100px;"></span>

  <div class="input_box">
    <i class="fas fa-key"></i>
<input type="password" placeholder="CONFIRM PASSWORD" id="myinput2" name="conpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters. Makinig ka dahil once na mahack 'yang account mo, kami pa sisisihin mo! Hindot!" required autofocus>
<span class="eyes2" onclick="myFunction2()">
<i id="hide3" class="fas fa-eye"></i>
<i id="hide4" class="fas fa-eye-slash"></i>
</span>
</div>
<span id='message'></span>
<script type="text/javascript" charset="utf-8">
  $('#myinput, #myinput2').on('keyup', function () {
  if ($('#myinput').val() && $('#myinput2').val() == null) {
    $('');
  }
  else if ($('#myinput').val() == $('#myinput2').val()) {
    $('#message').html('Matched').css('color', 'green');
  } else 
    $('#message').html('Not Matched').css('color', 'red');
});
</script>


 <div class="input_box">   
 <i class="fas fa-users"></i>
 <input type="text" name="fname" id="fname" placeholder="FIRST NAME" required autofocus>
</div>

 <div class="input_box">   
 <i class="fas fa-users"></i>
 <input type="text" name="mname" id="mname" placeholder="MIDDLE NAME" required autofocus>
</div>
/
   <div class="input_box">
 <i class="fas fa-users"></i>
 <input type="text" name="lname" id="lname" placeholder="LAST NAME" required autofocus>
</div>

   <div class="input_box">
 <i class="fas fa-users"></i>
 <select name="course" id="course" placeholder="COURSE" required>
   <option value="Select">COURSE</option>
   <option value="BSIT">BSIT</option>
   <option value="BSCRIM">BSCRIM</option>
   <option value="BSEDUC">BSEDUC</option>
   <option value="BSBA">BSBA</option>
   <option value="BSAIS">BSAIS</option>
   <option value="BSP">BS_PSYCHOLOGY</option>
   <option value="BSCS">BSCS</option>
 </select>
</div>

   <div class="input_box">
 <i class="fas fa-users"></i>
 <select name="yrlevel" id="yrlevel"  required>
   <option value="Select">YEAR LEVEL</option>
   <option value="1st Year">1ST_YEAR</option>
   <option value="2nd Year">2ND_YEAR</option>
   <option value="3rd Year">3RD_YEAR</option>
   <option value="4th Year">4THYEAR</option>
 </select>
</div>

    <div class="input_box">
     <i class="fas fa-users"></i>
     <input type="text" name="section" id="section" placeholder="SECTION" required autofocus>
    </div>
    
    <div class="input_box">
     <i class="fas fa-users"></i>
     <select name="gender" id="gender">
       <option value=default>GENDER</option>
       <option value="male">MALE</option>
       <option value="female">FEMALE</option>
       
     </select>
    </div>
    
    <div class="input_box">
     <i class="fas fa-users"></i>
     <input type="number" name="age" id="age" placeholder="AGE" required autofocus>
    </div>
    
    <div class="input_box">
     <i class="fas fa-envelope "></i>
     <input type="email" name="email" id="email" placeholder="EMAIL ADDRESS" required autofocus>
    </div>
    


   <div class="input_box">
 <i class="fas fa-address-book"></i>
 <input type="text" name="contact"  title="Please follow the format. 09*********" placeholder="CONTACT NUMBER" required autofocus>
</div>
<!--pattern="/^(0)[0-9]{9}$/"-->


 <button type="submit" name="submit" id="submit" class="btn">Submit</button>
  </form>
   <a href="s-login.php" class="btn-s">Back</a>
    </div>
    
    
    
    <script>
      function myFunction() {
        var x = document.getElementById("myinput");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");
        
        if (x.type === 'password'){
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
      
      function myFunction2() {
        var x = document.getElementById("myinput2");
        var y = document.getElementById("hide3");
        var z = document.getElementById("hide4");
        
        if (x.type === 'password'){
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
  </body>
</html>