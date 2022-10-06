<!--UPDATE STUDENT-->
<?php
  session_start();
  require "connection.php";
  require "function.php";
//   function showError() {
// 		echo "<div class='alert alert-danger text-center align-items-center' role='alert' id='danger-alert'>".$_SESSION['errprompt']."</div>";
		
// 	}
  $errors = array();
  
    if(isset($_POST['update'])) {
    $id = clean($_POST['id']);
    $snum = clean($_POST['snum']);
    $fname = clean($_POST['fname']);
    $mname = clean($_POST['mname']);
    $lname = clean($_POST['lname']);
    $course = clean($_POST['course']);
    $yrlevel = clean($_POST['yrlevel']);
    $status = clean($_POST['status']);
    $type = clean($_POST['type']);
    $gender = clean($_POST['gender']);
    $age = clean($_POST['age']);
    $bday = clean($_POST['birthday']);
    $email = clean($_POST['email']);
    $contact = clean($_POST['contact']);
      
        // Checking if all the data is not empty//
  if (!empty($snum) &&!empty($fname) &&!empty($mname) &&!empty($lname) &&!empty($course) &&!empty($yrlevel) && !empty($status) && !empty($type) && !empty($gender) &&!empty($age) && !empty($bday) && !empty($email) &&!empty($contact)) 
        {
    $query = "UPDATE student_tbl SET student_number = '$snum', firstname = '$fname', middlename = '$mname', lastname = '$lname', course = '$course', yearlevel = '$yrlevel',  status = '$status', type = '$type', gender = '$gender', age = '$age', birthday = '$bday', email = '$email', contact_number = '$contact' WHERE id = '$id'";
    
    if($result = mysqli_query($con, $query)) 
    {
      $_SESSION['success_message'] = "Student is succesfully updated!";
      header("Location: tables.php");
      exit;
    } 
    else 
    {
      die("Update Unsuccesfully");
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
    <meta name="description" content="">
    <meta name="author" content="">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>BORA - SIS | Admin - Update Student Profile</title>

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
  <h1 class="h3 mb-2 text-gray-800">Update Student Details</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Please fill out the form</h6>
                        </div> <!--card header-->
 
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
                        
           <?php
  if (isset($_POST['edit_stud'])) {
    $id = $_POST['edit_stud'];
    $query = "SELECT * FROM student_tbl WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    foreach($result as $row)
    {
   ?>   
       <div class="card-body">                 
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
                  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
  <div class="form-group">
                  <label for="snum">Student Number</label>
                  <input type="number" class="form-control" name="snum" id="snum" value="<?php echo $row['student_number'];?>" required autofocus>
                </div>
                
  <div class="form-group">
      <label for="fname">First Name</label>
     <input type="text" class="form-control" name="fname" value="<?php echo $row['firstname'];?>" id="fname" required autofocus>
                </div>
                
                <div class="form-group">
                  <label for="mname">Middle Name</label>
                  <input type="text" class="form-control" name="mname" value="<?php echo $row['middlename'];?>" id="mname" required autofocus>
                </div>
                
                  <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" name="lname" value="<?php echo $row['lastname'];?>" id="lname" required autofocus>
                </div>
                
                                <div class="form-group">
                  <label for="course">Course</label>
                  <select name="course" value="<?php echo $row['course'];?>" id="course" class="form-control" required>
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
             <label for="status">Status</label>
  <select name="status" id="status" class="form-control" value="<?php echo $row['status'];?>" required>
       <option value=default></option>
       <option value="Active">Active</option>
       <option value="Inactive">Inactive</option>
       
    </select>
           </div>
           
            <div class="form-group">
             <label for="type">Type of student</label>
  <select name="type" id="type" class="form-control" value="<?php echo $row['type'];?>" required>
       <option value=default></option>
       <option value="Regular">Regular</option>
       <option value="Irregular">Irregular</option>
       <option value="Transfer">Transfer</option>
       
    </select>
           </div>
           
           
           <div class="form-group">
             <label for="gender">Gender</label>
  <select name="gender" id="gender" class="form-control" value="<?php echo $row['gender'];?>" required>
       <option value=default></option>
       <option value="male">MALE</option>
       <option value="female">FEMALE</option>
       
    </select>
           </div>
           
             <div class="form-group">
             <label for="age">Age</label>
             <input type="number" name="age" class="form-control" value="<?php echo $row['age'];?>" id="age" required autofocus/>
           </div>
           
        <div class="form-group">
             <label for="birthday">Birthday</label>
             <input type="date" name="birthday" class="form-control" id="birthday" min="1960-01-01" max="2005-01-01" value="<?php echo $row['birthday'];?>" autofocus required/>
           </div>
           
             <div class="form-group">
             <label for="email">Email Address</label>
             <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>" id="email"autofocus required/>
           </div>
           
      <div class="form-group">
        <label for="contact">Contact Number</label>
             <input type="number" name="contact" class="form-control" value="<?php echo $row['contact_number'];?>" id="contact"autofocus required/>
           </div>
           
    <button type="submit" name="update" id="update" class="btn btn-primary btn-block" >Update</button>
    
    <input type="button" name="back" id="back" class="btn btn-danger btn-block" value="Back" onclick="window.history.go(-1)"/>
         
      
          
          </div>
           </form>
            <?php
    }
  }
        ?>   
        
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