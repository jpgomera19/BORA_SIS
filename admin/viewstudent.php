<!--UPDATE STUDENT-->
<?php
  session_start();
  require "connection.php";
  function showError() {
		echo "<div class='alert alert-danger text-center align-items-center' role='alert' id='danger-alert'>".$_SESSION['errprompt']."</div>";
		
	}
  $errors = array();

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
<h1 class="h3 mb-2 text-black"> STUDENT DETAILS</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div> <!--card header-->
 
        <?php
    if(isset($_POST['view_stud'])) {
    $id = $_POST['view_stud'];
    $query = "SELECT *,section_name FROM student_tbl, section_tbl  WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if($row = mysqli_fetch_assoc($result)){
      
   ?>   
       <div class="card-body card-body-dark">       
       
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
     <tr>
       <th colspan="12">STUDENT NUMBER: <?php echo $row['student_number'];?></th>
     </tr>
     <tr>
       <th colspan="4">LASTNAME: <?php echo $row['lastname'];?></th>
       <th colspan="3">FIRSTNAME: <?php echo $row['firstname'];?></th>
       <th colspan="3">MIDDLENAME: <?php echo $row['middlename'];?></th>
     </tr>
          <tr>
       <th colspan="12">COURSE: <?php echo $row['course'];?></th>
     </tr>
     </tr>
          <tr>
       <th colspan="12">YEAR LEVEL: <?php echo $row['yearlevel'];?></th>
     </tr>
     <tr>
       <th colspan="12">SECTION: <?php echo $row['section'];?></th>
     </tr>
     <tr>
       <th colspan="2">STATUS: <?php echo $row['status'];?></th>
       <th colspan="4">TYPE OF STUDENTS: <?php echo $row['type'];?></th>
       <th colspan="2">GENDER: <?php echo $row['gender'];?></th>
     </tr>
     <tr>
       <th colspan="2">AGE: <?php echo $row['age'];?></th>
       <th colspan="2">BIRTHDAY: <?php echo $row['birthday'];?></th>
       <th colspan="2">CONTACT NUMBER: <?php echo $row['contact_number'];?></th>
       <th colspan="2">EMAIL ADDRESS: <?php echo $row['email'];?></th>
     </tr>
   </table>  
   
   <?php
    }
  }
        ?>   
        
            </div> <!--Card-->

        
            </div>               
              </div>

 
  <div class="container-fluid">

                    <!-- Page Heading -->
<h1 class="h3 mb-2 text-black"> ACADEMIC DETAILS</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div> <!--card header-->
 
        <?php
    if(isset($_POST['view_stud'])) {
    $id = $_POST['view_stud'];
    $query = "SELECT *,section_name FROM student_tbl, section_tbl  WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if($row = mysqli_fetch_assoc($result)){
      
   ?>   
       <div class="card-body card-body-dark">       
       
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
     <tr>
       <th colspan="12">STUDENT NUMBER: <?php echo $row['student_number'];?></th>
     </tr>
     <tr>
       <th colspan="4">LASTNAME: <?php echo $row['lastname'];?></th>
       <th colspan="3">FIRSTNAME: <?php echo $row['firstname'];?></th>
       <th colspan="3">MIDDLENAME: <?php echo $row['middlename'];?></th>
     </tr>
          <tr>
       <th colspan="12">COURSE: <?php echo $row['course'];?></th>
     </tr>
     </tr>
          <tr>
       <th colspan="12">YEAR LEVEL: <?php echo $row['yearlevel'];?></th>
     </tr>
     <tr>
       <th colspan="12">SECTION: <?php echo $row['section'];?></th>
     </tr>
     <tr>
       <th colspan="2">STATUS: <?php echo $row['status'];?></th>
       <th colspan="4">TYPE OF STUDENTS: <?php echo $row['type'];?></th>
       <th colspan="2">GENDER: <?php echo $row['gender'];?></th>
     </tr>
     <tr>
       <th colspan="2">AGE: <?php echo $row['age'];?></th>
       <th colspan="2">BIRTHDAY: <?php echo $row['birthday'];?></th>
       <th colspan="2">CONTACT NUMBER: <?php echo $row['contact_number'];?></th>
       <th colspan="2">EMAIL ADDRESS: <?php echo $row['email'];?></th>
     </tr>
   </table>  
   
   <?php
    }
  }
        ?>   
        
            </div> <!--Card-->

        
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