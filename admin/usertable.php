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

    <title>BORA - SIS | Admin - User Table</title>

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

</head>

<body id="page-top">

 <?php include "header.php"?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">USER DETAILS</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">User Details</h6>
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
                  <form action="adduser.php" method="post" class="container">
                   <button class="btn btn-primary btn-flat" name="add_btn" type="submit"><i class="fa fa-plus">Add User</i></button> 
                  </form>  
                    
                    
                        <div class="card-body">
                            <div class="table-responsive">
                  
                  <?php 
                  $query = "SELECT * FROM user_tbl WHERE"
                  ?>
                  
<table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
  
  <thead>
      <tr class="bg-gradient-dark text-light">
      <th>id</th>               
      <th>Username</th>
      <th>Name</th>
      <th>Email</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>

  <tbody>
    <?php
      $query = "SELECT * FROM user_tbl";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result))
      {
        while($row = mysqli_fetch_assoc($result))
        {
    ?>
    <tr>
      <th><?php echo $row['u_id'];?></th>               
      <th><?php echo $row['username'];?></th>
      <th><?php echo $row['lastname'],', '.$row['firstname'],' '.$row['middlename'],'.';?></th>
      <th><?php echo $row['email'];?></th>
     
      <th>
        <form action="updateUserDetails.php" method="post">
          <input type="hidden" name="edit_user" id="edit_user" value="<?php echo $row['u_id'];?>"/>
          <button class="btn btn-success"  type="submit"><i class="fa fa-edit">Update</i></button>
        </form>
        </th>
      <th>
        <form action="action.php" method="post">
          <input type="hidden" name="delete_user" id="delete_user" value="<?php echo $row['u_id'];?>"/>
          <button class="btn btn-danger btn-flat" name="delete_ubtn" type="submit" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash">Delete</i></button>
        </form>
      </th>
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
