<?php
    session_start();
    require "connection.php";
    $errors = array();
    $success = array();
    
    if(isset($_POST['add'])) {
    $snum = mysqli_real_escape_string($con, $_POST["snum"]);
    $pass = mysqli_real_escape_string($con, $_POST["pass"]);
    $enpass = md5($pass);
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $mname = mysqli_real_escape_string($con, $_POST["mname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $course = mysqli_real_escape_string($con, $_POST["course"]);
    $yrlevel = mysqli_real_escape_string($con, $_POST["yrlevel"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $type = mysqli_real_escape_string($con, $_POST["type"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $age = mysqli_real_escape_string($con, $_POST["age"]);
    $bday = mysqli_real_escape_string($con, $_POST["birthday"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $contact = mysqli_real_escape_string($con, $_POST["contact"]);
    
    if(strlen($snum) != 8 ){
      $errors['error'] = "The student number should be 8 digits only! ";
    }
    else
    {
    //For Student Id Confirmation
    $chck_student_no = "SELECT * FROM student_tbl WHERE student_number = '$snum'";
        $res = mysqli_query($con, $chck_student_no);
        
        if(mysqli_num_rows($res) > 0)
        {
          $errors['error'] = "The student number is already exist!";
        }
        else
        {
        //For Firstname, Middle name, Lastname, birthday checking
        $chck_profile = "SELECT firstname, middlename, lastname, birthday FROM student_tbl WHERE firstname = '$fname' AND middlename = '$mname' AND lastname = '$lname' AND birthday = '$bday'";
        $res = mysqli_query($con, $chck_profile);
        
        if(mysqli_num_rows($res) > 0)
        {
          $errors['error'] = "Firstname, Middlename, Lastname and birthdah is already exist!";
        }
        
    else
    {
        //For Email Checking
        $email_check = "SELECT * FROM student_tbl WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
          if(mysqli_num_rows($res) > 0)
          {
            $errors['error'] = "Email Address is already exist!";
          } 
    
      else
      {
        // Checking if all the data is not empty//
        if (!empty($snum) && !empty($enpass) &&!empty($fname) &&!empty($mname) &&!empty($lname) &&!empty($course) &&!empty($yrlevel) && !empty($status) && !empty($type) && !empty($gender) &&!empty($age) && !empty($bday) && !empty($email) &&!empty($contact)) 
        {
      //Insert Query//
      $query = "INSERT INTO student_tbl(student_number, password, firstname, middlename, lastname, course, yearlevel, status, type, gender, age, birthday, email, contact_number) VALUES('$snum','$enpass','$fname','$mname','$lname','$course','$yrlevel','$status', '$type', '$gender','$age','$bday','$email','$contact')";
      
      $result = mysqli_query($con, $query);
        
        //Redirect the user in login modulee if all the information needed are completed//
        $_SESSION['success_message'] = "Student is succesfully added!";
        header("location: tables.php");
      
      }
      
      else
      {
        //echo "Please fill out all the information needed.";
      }
      
      }
    }  
    }
    
  }
    }
 if(isset($_SESSION['username'], $_SESSION['password'])) { 
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BORA Student Portal">
    <meta name="author" content="Jamesphilip A. Gomera">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>BORA - SIS | Admin - Add Student</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

 <?php include "header.php"?>
 
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Add Student</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Please fill out the form</h6>
                        </div> <!--card header-->
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
                        
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
            <div class="card-body">
                  <input type="hidden" name="id">
  <div class="form-group">
                  <label for="snum">Student Number</label>
                  <input type="number" class="form-control" name="snum" minlength ="8" title="Student Number must 8 digits only." id="snum" required autofocus>
                </div>
                
  <div class="form-group">
                  <label for="pass">Password</label>
                  <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters. Makinig ka dahil once na mahack 'yang account mo, kami pa sisisihin mo! Hindot!" class="form-control" name="pass" id="pass" required autofocus>
                </div>
                
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control" name="fname" id="fname" required autofocus>
                </div>
                
                <div class="form-group">
                  <label for="mname">Middle Name</label>
                  <input type="text" class="form-control" name="mname" id="mname" required autofocus>
                </div>
                
                  <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" name="lname" id="lname" required autofocus>
                </div>
                
                                <div class="form-group">
                  <label for="course">Course</label>
                  <select name="course" id="course" class="form-control" required>
                      <option value="Select"></option>
   <option value="BSIT">BSIT</option>
   <option value="BSCRIM">BSCRIM</option>
   <option value="BSEDUC">BSEDUC</option>
   <option value="BSBA">BSBA</option>
   <option value="BSAIS">BSAIS</option>
                  </select>
                </div>
                
           <div class="form-group">
             <label for="yrlevel">Year Level</label>
             <select name="yrlevel" id="yrlevel" class="form-control" required>
   <option value="Select"></option>
   <option value="1st Year">1ST_YEAR</option>
   <option value="2nd Year">2ND_YEAR</option>
   <option value="3rd Year">3RD_YEAR</option>
   <option value="4th Year">4THYEAR</option>
    </select>
           </div>
           
           
      
  <div class="form-group">
  <label for="status">Student Status</label>
  <select name="status" id="status" class="form-control" required>
       <option value=default></option>
       <option value="Active">Active</option>
       <option value="Inactive">Inactive</option>
         </select>
      </div> 
    <div class="form-group">
  <label for="type">Type of Student</label>
  <select name="type" id="type" class="form-control" required>
       <option value=default></option>
       <option value="Regular">Regular</option>
       <option value="Irregular">Irregular</option>
       <option value="Transfer">Transfer</option>
       </select>
        </div>  
           
           <div class="form-group">
             <label for="gender">Gender</label>
  <select name="gender" id="gender" class="form-control" required>
       <option value=default></option>
       <option value="male">MALE</option>
       <option value="female">FEMALE</option>
       
    </select>
           </div>
           
             <div class="form-group">
             <label for="age">Age</label>
             <input type="number" name="age" class="form-control" id="age" required autofocus/>
           </div>
           
        <div class="form-group">
             <label for="birthday">Birthday</label>
             <input type="date" name="birthday" class="form-control" id="birthday" min="1960-01-01" max="2005-01-01" autofocus required/>
           </div>
           
             <div class="form-group">
             <label for="email">Email Address</label>
             <input type="email" name="email" class="form-control" id="email"autofocus required/>
           </div>
           
              <div class="form-group">
             <label for="contact">Contact Number</label>
             <input type="number" name="contact" class="form-control" id="contact"autofocus required/>
           </div>
           
    <button type="submit" name="add" id="add" class="btn btn-primary btn-block" >Add</button>
    <input type="button" name="back" id="back" class="btn btn-danger btn-block" value="Back" onclick="window.history.go(-1)"/>
         
      
          
          </div>
           </form>
            </div> <!--Card-->
              </div><!--Container fluid-->

                
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