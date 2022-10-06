<!--DELETE STUDENT -->
<?php
session_start();
  require "connection.php";
  
  if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_stud'];
    
    $query = "DELETE FROM student_tbl WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    
    $_SESSION['success_message'] = "Student is succesfully deleted!";
    header("location: tables.php");
  }
?>

<!--DELETE FACULTY-->
<?php
  require "connection.php";
  
  if(isset($_POST['delete_fbtn'])){
    $id = $_POST['delete_fac'];
    
    $query = "DELETE FROM faculty_tbl WHERE f_id = '$id'";
    $result = mysqli_query($con, $query);
    
    $_SESSION['success_message'] = "Teacher is succesfully deleted!";
    header("location: facultytable.php");
  }
?>

<!--DELETE USER-->
<?php
  require "connection.php";
  
  if(isset($_POST['delete_ubtn'])){
    $id = $_POST['delete_user'];
    
    $query = "DELETE FROM user_tbl WHERE u_id = '$id'";
    $result = mysqli_query($con, $query);
    
    $_SESSION['success_message'] = "User is succesfully deleted!";
    header("location: usertable.php");
  }
?>

