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

    <title>BORA - SIS | Admin  - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php include"header.php"?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-black">Admin Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
         <div class="card bg-gradient-dark text-white shadow-lg h-100 py-2" >
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
             <?php
            $query = "SELECT * FROM student_tbl";
        $result = mysqli_query($con, $query);
        $row = mysqli_num_rows($result);
      ?>                              <div class="col mr-2">
      <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Students</div>
      <div class="h5 mb-0 font-weight-bold text-white"><?php echo $row;?> </div>
                                        </div>

   
      <div class="col-auto">
        <i class="fas fa-user fa-4x text-white" ></i>
     </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gradient-primary text-white shadow-lg h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                           <?php
            $query = "SELECT * FROM faculty_tbl";
        $result = mysqli_query($con, $query);
        $row = mysqli_num_rows($result);
      ?>                                 <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                            Faculty </div>
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $row;?> </div>
                                        </div>
                                        <div class="col-auto">
                                       <i class="fas fa-user-friends fa-4x text-white" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
 <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-gradient-success text-dark shadow-lg h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                          <?php
            $query = "SELECT * FROM user_tbl";
        $result = mysqli_query($con, $query);
        $row = mysqli_num_rows($result);
      ?>                                                     <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                Total User</div>
        <div class="h5 mb-0 font-weight-bold text-white"><?php echo $row;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-4x text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                 <div class="card bg-gradient-info text-white shadow-lg h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                       <?php
            $query = "SELECT * FROM section_tbl";
        $result = mysqli_query($con, $query);
        $row = mysqli_num_rows($result);
      ?>                                                         <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total number of Sections
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-white"><?php echo $row;?> </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-scroll fa-4x text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card bg-gradient-warning text-dark shadow-lg h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                                   <?php
            $query = "SELECT * FROM subject_tbl";
        $result = mysqli_query($con, $query);
        $row = mysqli_num_rows($result);
      ?>                            <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                                Total number of Subjects</div>
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $row;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-alt fa-4x text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
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