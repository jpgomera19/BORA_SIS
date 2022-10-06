<?php 

  session_start();

  include 'connection.php';
  include_once 'function.php';
  
  if(isset($_GET['upload'])){
    $title = clean($_GET['title']);
    $message = clean($_GET['message']);
    
    if(!empty($title) && !empty($message))
    {
      $query = "UPDATE announcement_tbl SET title = '$title',message = '$message'";
      $result = mysqli_query($con, $query);
  
        $_SESSION['success_message'] = "Announcement is succesfully posted!";
        header("location: usertable.php");
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
                    <h1 class="h3 mb-2 text-gray-800">ADD ANNOUNCEMENTS</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Adding Announcements</h6>
          </div>               
                    
          <form action="" method="get">
                    
                    
                        <div class="card-body">

                  
          <div class="container">
                <div class="form-group">
                  <label for="title">Announcement Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Title here..." id="title" required autofocus>
                </div>
                
           <div class="form-group">
            <textarea name="message" id="message" class="form-control" placeholder="Your message here..." rows="12" cols="70" required></textarea>
                </div>
              </div>
            <button type="submit" class="btn btn-success" name="upload">Upload Announcements</button>
            <button type="reset" class="btn btn-danger" >Clear</button>
          </form>
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