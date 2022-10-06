<?php
    session_start();
    require "connection.php";
    $errors = array();
    
    
  if(isset($_POST["add"])) {
     $id = $_POST["id"];
     $filename = $_FILES["image"]["name"];
     $tempname = $_FILES["image"]["tmp_name"];    
     $folder = "image/".$filename;

    // $sql = "INSERT INTO user_tbl (image) VALUES ('$filename')";
    $sql = "UPDATE user_tbl SET image = '$filename' WHERE username ='".$_SESSION['username']."'";
    mysqli_query($con, $sql);       

      if (move_uploaded_file($tempname, $folder)) {

            $_SESSION['success_message'] = "Profile picture is succesfully updated!";
            header("location: userprofile.php");

        }else{

            $errors['error'] = "Failed to upload image";

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
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>BORA - SIS | Admin - Settings </title>

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
                    <h1 class="h3 mb-2 text-gray-800">Settings</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
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
                        
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg"  >
    <div class="card-body">
    <input type="hidden" name="id">
  <div class="form-group">
      <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" required>
                </div>
          
    <button type="submit" name="add" id="add" class="btn btn-dark btn-block" >Upload</button>
    <input type="button" name="back" id="back" class="btn btn-danger btn-block" value="Go back" onclick="window.history.go(-1)"/>
         
      
          
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