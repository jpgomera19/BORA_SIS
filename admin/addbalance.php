<?php
    session_start();
    require "connection.php";
    $errors = array();
    $success = array();
    
    if(isset($_POST['add'])) {
    $user = mysqli_real_escape_string($con, $_POST["user"]);
    $balance = mysqli_real_escape_string($con, $_POST["balance"]);
    
    
        // Checking if all the data is not empty//
        if (!empty($user) && !empty($balance)) 
        {
      //Insert Query//
      $query = "INSERT INTO payment_tbl(s_id, balance) VALUES('$user','$balance')";
      
      $result = mysqli_query($con, $query);
        
        //Redirect the user in login modulee if all the information needed are completed//
        $_SESSION['success_message'] = "Balance is succesfully added!";
        header("location: tables.php");
      
      }
      
      else
      {
        //echo "Please fill out all the information needed.";
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
    <title>BORA - SIS | Admin - Add User</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Add Balance</h1>

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
              <?php 
    $query ="SELECT * FROM student_tbl";
    $result = mysqli_query($con,$query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>    
      <label for="user">Student Name</label>
  <select name="user" class="form-control">
    <option selected disabled></option>
    <?php 
    foreach ($options as $option) {
  ?>
    <option value="<?php echo $option['id']?>"><?php echo $option['lastname'],", ",$option['firstname']," ",$option['middlename']; ?> </option>
    <?php 
    }
   ?>
  </select>
  </div>
                
    <div class="form-group">
      <label for="balance">Balance</label>
        <input type="number" class="form-control" name="balance" id="balance" required autofocus>
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