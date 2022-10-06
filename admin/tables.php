<?php 

  session_start();

  include 'connection.php';
  include_once 'function.php';
  
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

    <title>BORA - SIS | Admin - Student Profile</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body id="page-top">

 <?php include "header.php"?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">STUDENT DETAILS</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Student Details</h6>
          </div>               
  <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
    <div class="alert alert-success" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
    <?php
    unset($_SESSION['success_message']);
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
                  <form action="addstudent.php" method="post" class="container">
                   <button class="btn btn-primary btn-flat" name="add_btn" type="submit"><i class="fa fa-plus">Add Students</i></button> 
                  </form>  
                    
                    
                        <div class="card-body">
                            <div class="table-responsive">
                  
                  <?php 
                  $query = "SELECT * FROM student_tbl WHERE"
                  ?>
                  
      <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
  				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="25%">
					<col width="15%">
					<col width="15%">
				</colgroup>
  <thead>
    <tr class="bg-gradient-dark text-light">
      <th>id</th>               
      <th>Student Number</th>
      <th>Name</th>
      <th>Course</th>
      <th>Year Level</th>
      <th>Status</th>
      <th>Type of Student</th>
      <th>Gender</th>
      <th>Age</th>
      <th>Birthday</th>
      <th>Email Address</th>
      <th>Contact Number</th>
      <th>Update</th>
      <th>Delete</th>
      <!--<th>View</th>-->
    </tr>
  </thead>

  <tbody>
    <?php
      $query = "SELECT * FROM student_tbl";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result))
      {
        while($row = mysqli_fetch_assoc($result))
        {
    ?>
    <tr>
      <th><?php echo $row['id'];?></th>               
      <th><?php echo $row['student_number'];?></th>
      <th><?php echo $row['lastname'],', '.$row['firstname'],' '.$row['middlename'],'.';?></th>
      <th><?php echo $row['course'];?></th>
      <th><?php echo $row['yearlevel'];?></th>
      <?php 
      if($row['status'] == "Active")
      {
      ?>
      <th><?php echo '<p class="rounded-pill badge badge-success bg-gradient-success px-3">'.$row['status'].'</p>';?></th>
      <?php
      }
      ?>
      <?php 
     if($row['status'] == "Inactive")
      {
      ?>
      <th><?php echo '<p class="rounded-pill badge badge-danger bg-gradient-danger px-3">'.$row['status'].'</p>';?></th>
      <?php 
      } 
      ?>
      <th><?php echo $row['type'];?></th>
      <th><?php echo $row['gender'];?></th>
      <th><?php echo $row['age'];?></th>
      <th><?php echo $row['birthday'];?></th>
      <th><?php echo $row['email'];?></th>
      <th><?php echo $row['contact_number'];?></th>
      <th>
        <form action="updateStudentDetails.php" method="post">
          <input type="hidden" name="edit_stud" id="edit_stud" value="<?php echo $row['id'];?>"/>
          <button class="btn btn-success"  type="submit"><i class="fa fa-edit">Update</i></button>
        </form>
        </th>
        
      <th>
        <form action="action.php" method="post">
          <input type="hidden" name="delete_stud" id="delete_stud" value="<?php echo $row['id'];?>"/>
          <button class="btn btn-danger btn-flat" name="delete_btn" type="submit" onclick="return confirm('Are you sure you want to delete this item?');" ><i class="fa fa-trash">Delete</i></button>
        </form>
      </th>
      
    <!--<th align="center">-->
    <!--  <form action="viewstudent.php" method="post">-->
    <!--      <input type="hidden" name="view_stud" id="view_stud" value="
    ?php echo $row['id'];?>"/>-->
    <!--      <button class="btn btn-flat btn-default btn-sm border" name="view_btn" type="submit" ><i class="fa fa-eye"></i> View</button>-->
    <!--    </form>-->
    <!--  </th>-->
    </tr>
    <?php
      }
    }
    ?>                               
      </tbody>
        </table>
          </div>
            </div>
              </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

  <?php include "footer.php"?>
  <script>
	$(document).ready(function(){
		$('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: 5 }
            ],
        });
	})</script>
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