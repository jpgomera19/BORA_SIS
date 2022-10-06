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
                    <h1 class="h3 mb-2 text-gray-800">UPLOADED FILES</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Files that contains grades</h6>
          </div>               
                    
                
                    
                        <div class="card-body">
                            <div class="table-responsive">
                  

                  
<table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
  
  <thead>
      <tr class="bg-gradient-dark text-light">
      <th>id</th>               
      <th>Name</th>
      <th>Section</th>
      <th>File</th>
    </tr>
  </thead>

  <tbody>
    <?php
      $query = "SELECT u.*,f.*,c.* FROM uploads_tbl u, faculty_tbl f, section_tbl c WHERE f.f_id = u.f_id AND c.sec_id = f.sec_id";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result))
      {
        while($row = mysqli_fetch_assoc($result))
        {
    ?>
    <tr>
      <th><?php echo $row['id'];?></th>               
      <th><?php echo $row['lastname'],', '.$row['firstname'],' '.$row['middlename'],'.';?></th>
      <th><?php echo $row['section_name'];?></th>
      <th><?php echo "<a href=" . $folder . basename("admin/uploads/".$filename) . ">{$row['uploaded_file']}</a>";?></th>
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
