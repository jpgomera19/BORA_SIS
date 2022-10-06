<!--UPDATE STUDENT-->
<?php
  session_start();
  require "connection.php";
  require "function.php";
  $errors = array();
  
    if(isset($_POST['fupdate'])) {
    $id = clean($_POST['id']);
    $fnum = clean($_POST['fnum']);
    $fname = clean($_POST['fname']);
    $mname = clean($_POST['mname']);
    $lname = clean($_POST['lname']);
    $course = clean($_POST['course']);
    $advisery = clean($_POST['section']);
    $subject = clean($_POST['subject']);
    $age = clean($_POST['age']);
    $gender = clean($_POST['gender']);
    $email = clean($_POST['email']);
    $contact = clean($_POST['contact']);
    
    
    if(strlen($fnum) != 8 ){
      $errors['error'] = "The Faculty number should be 8 digits only! ";

    }
      else
      {
        // Checking if all the data is not empty//
        if (!empty($fnum) &&!empty($fname) &&!empty($mname) &&!empty($lname) &&!empty($course) &&!empty($advisery) &&!empty($subject) &&!empty($age) && !empty($gender) && !empty($email) &&!empty($contact)) 
        {
    $query = "UPDATE faculty_tbl SET faculty_number = '$fnum', firstname = '$fname', middlename = '$mname', lastname = '$lname', course = '$course', sec_id = '$advisery',subject_id = '$subject', age = '$age', gender = '$gender', email = '$email', contact = '$contact' WHERE f_id = '$id'";
    
    if($result = mysqli_query($con, $query)) 
    {
      $_SESSION['success_message'] = "Teacher is succesfully updated!";
      header("Location: facultytable.php");
      exit;
    } 
    else 
    {
      die("Update Unsuccesfully");
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
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>BORA - SIS | Admin - Update Faculty Profile</title>

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
     <h1 class="h3 mb-2 text-gray-800">Update Faculty Details</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Please fill out the form</h6>
                        </div>
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
    <?php
    if (isset($_POST['edit_fac'])) {
    $id = $_POST['edit_fac'];
    $query = "SELECT * FROM faculty_tbl WHERE f_id = '$id'";
    $result = mysqli_query($con, $query);
    
    foreach($result as $row)
    {
   ?>   
                        
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
            <div class="card-body">
                  <input type="hidden" name="id" value="<?php echo $row['f_id'];?>">
  <div class="form-group">
                  <label for="fnum">Faculty Number</label>
                  <input type="number" class="form-control" name="fnum" id="fnum" value="<?php echo $row['faculty_number'];?>" required autofocus>
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
             <label for="advisery">Advisory Class Section</label>
             <select name="section" class="form-control" id="section" required>
    <option value="" disabled selected></option>
    <option value="" disabled >For BSIT 1st Year</option>
    <option value="1">BSIT 101</option>
    <option value="2">BSIT 102</option>
    <option value="3">BSIT 103</option>
    <option value="4">BSIT 104</option>
    <option value="5">BSIT 105</option>
    <option value="" disabled >For BSIT 2nd Year</option>
    <option value="6">BSIT 201</option>
    <option value="7">BSIT 202</option>
    <option value="8">BSIT 203</option>
    <option value="9">BSIT 204</option>
    <option value="10">BSIT 205</option>
    <option value="" disabled >For BSIT 3rd Year</option>
    <option value="11">BSIT 301</option>
    <option value="12">BSIT 302</option>
    <option value="13">BSIT 303</option>
    <option value="14">BSIT 304</option>
    <option value="15">BSIT 305</option>
    <option value="" disabled >For BSIT 4th Year</option>
    <option value="16">BSIT 401</option>
    <option value="17">BSIT 402</option>
    <option value="18">BSIT 403</option>
    <option value="19">BSIT 404</option>
    <option value="20">BSIT 405</option>
    <option value="" disabled >For BSCRIM 1st Year</option>
    <option value="21">BSCRIM 101</option>
    <option value="22">BSCRIM 102</option>
    <option value="23">BSCRIM 103</option>
    <option value="24">BSCRIM 104</option>
    <option value="25">BSCRIM 105</option>
     <option value="" disabled >For BSCRIM 2nd Year</option>
    <option value="26">BSCRIM 201</option>
    <option value="27">BSCRIM 202</option>
    <option value="28">BSCRIM 203</option>
    <option value="29">BSCRIM 204</option>
    <option value="30">BSCRIM 205</option>
    <option value="" disabled >For BSCRIM 3rd Year</option>
    <option value="31">BSCRIM 301</option>
    <option value="32">BSCRIM 302</option>
    <option value="33">BSCRIM 303</option>
    <option value="34">BSCRIM 304</option>
    <option value="35">BSCRIM 305</option>
    <option value="" disabled >For BSCRIM 4th Year</option>
    <option value="36">BSCRIM 401</option>
    <option value="37">BSCRIM 402</option>
    <option value="38">BSCRIM 403</option>
    <option value="39">BSCRIM 404</option>
    <option value="40">BSCRIM 405</option>
    <option value="" disabled >For BSEDUC 1st Year</option>
    <option value="41">BSEDUC 101</option>
    <option value="42">BSEDUC 102</option>
    <option value="43">BSEDUC 103</option>
    <option value="44">BSEDUC 104</option>
    <option value="45">BSEDUC 105</option>
    <option value="" disabled >For BSEDUC 2nd Year</option>
    <option value="46">BSEDUC 201</option>
    <option value="47">BSEDUC 202</option>
    <option value="48">BSEDUC 203</option>
    <option value="49">BSEDUC 204</option>
    <option value="50">BSEDUC 205</option>
    <option value="" disabled >For BSEDUC 3rd Year</option>
    <option value="51">BSEDUC 301</option>
    <option value="52">BSEDUC 302</option>
    <option value="53">BSEDUC 303</option>
    <option value="54">BSEDUC 304</option>
    <option value="55">BSEDUC 305</option>
    <option value="" disabled >For BSEDUC 4th Year</option>
    <option value="56">BSEDUC 401</option>
    <option value="57">BSEDUC 402</option>
    <option value="58">BSEDUC 403</option>
    <option value="59">BSEDUC 404</option>
    <option value="60">BSEDUC 405</option>
    <option value="" disabled >For BSBA 1st Year</option>
    <option value="61">BSBA 101</option>
    <option value="62">BSBA 102</option>
    <option value="63">BSBA 103</option>
    <option value="64">BSBA 104</option>
    <option value="65">BSBA 105</option>
    <option value="" disabled >For BSBA 2nd Year</option>
    <option value="66">BSBA 201</option>
    <option value="67">BSBA 202</option>
    <option value="68">BSBA 203</option>
    <option value="69">BSBA 204</option>
    <option value="70">BSBA 205</option>
    <option value="" disabled >For BSBA 3rd Year</option>
    <option value="71">BSBA 301</option>
    <option value="72">BSBA 302</option>
    <option value="73">BSBA 303</option>
    <option value="74">BSBA 304</option>
    <option value="75">BSBA 305</option>
    <option value="" disabled >For BSBA 4th Year</option>
    <option value="76">BSBA 401</option>
    <option value="77">BSBA 402</option>
    <option value="78">BSBA 403</option>
    <option value="79">BSBA 404</option>
    <option value="80">BSBA 405</option>
    <option value="" disabled >For BSAIS 1st Year</option>
    <option value="81">BSAIS 101</option>
    <option value="82">BSAIS 102</option>
    <option value="83">BSAIS 103</option>
    <option value="84">BSAIS 104</option>
    <option value="85">BSAIS 105</option>
    <option value="" disabled >For BSAIS 2nd Year</option>
    <option value="86">BSAIS 201</option>
    <option value="87">BSAIS 202</option>
    <option value="88">BSAIS 203</option>
    <option value="89">BSAIS 204</option>
    <option value="90">BSAIS 205</option>
    <option value="" disabled >For BSAIS 3rd Year</option>
    <option value="91">BSAIS 301</option>
    <option value="92">BSAIS 302</option>
    <option value="93">BSAIS 303</option>
    <option value="94">BSAIS 304</option>
    <option value="95">BSAIS 305
    </option>
    <option value="" disabled >For BSAIS 4th Year</option>
    <option value="96">BSAIS 401</option>
    <option value="97">BSAIS 402</option>
    <option value="98">BSAIS 403</option>
    <option value="99">BSAIS 404</option>
    <option value="100">BSAIS 405</option>
    </select>
      
           </div>
           
    <div class="form-group">
          <?php 
    $query ="SELECT * FROM subject_tbl";
    $result = mysqli_query($con,$query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>     
    <label for="subject">Subject Name </label>
   <select name="subject" class="form-control">
    <option selected disabled></option>
    <?php 
    foreach ($options as $option) {
  ?>
    <option value="<?php echo $option['subject_id']?>"><?php echo $option['subject_id'],". " ,$option['subject_name']; ?> </option>
    <?php 
    }
   ?>
  </select>
  </div> 
           
                        <div class="form-group">
             <label for="age">Age</label>
             <input type="number" name="age" class="form-control" value="<?php echo $row['age'];?>" id="age" required autofocus/>
           </div>
           
           <div class="form-group">
             <label for="gender">Gender</label>
  <select name="gender" id="gender" class="form-control" value="<?php echo $row['gender'];?>" required>
       <option value=default></option>
       <option value="male">MALE</option>
       <option value="Female">FEMALE</option>
       
    </select>
           </div>
           
           
             <div class="form-group">
             <label for="email">Email Address</label>
             <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>" id="email"autofocus required/>
           </div>
           
              <div class="form-group">
             <label for="contact">Contact Number</label>
             <input type="number" name="contact" class="form-control" value="<?php echo $row['contact_number'];?>" id="contact"autofocus required/>
           </div>
           
    <button type="submit" name="fupdate" id="fupdate" class="btn btn-primary btn-block" >Update</button>
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