<?php
  session_start();
  require "connection.php";
  require "function.php";
  $errors = array();
  
  //If submit button is clicked//
  if($_SERVER['REQUEST_METHOD'] == "POST")  
  {
    $student_number = clean(mysqli_real_escape_string($con, $_POST["snum"]));
    $pass = clean(mysqli_real_escape_string($con, $_POST["pass"]));
    $enpass = clean(md5($pass));
    $conpass = clean(md5($_POST["conpass"]));
    $firstname = clean(mysqli_real_escape_string($con, $_POST["fname"]));
    $middlename = clean(mysqli_real_escape_string($con, $_POST["mname"]));
    $lastname = clean(mysqli_real_escape_string($con, $_POST["lname"]));
    $course = clean(mysqli_real_escape_string($con, $_POST["course"]));
    $year_level = clean(mysqli_real_escape_string($con, $_POST["yrlevel"]));
    $section = clean(mysqli_real_escape_string($con, $_POST["section"]));
    $gender = clean(mysqli_real_escape_string($con, $_POST["gender"]));
    $age = clean(mysqli_real_escape_string($con, $_POST["age"]));
    $birthday = clean(mysqli_real_escape_string($con, $_POST["birthday"]));
    $email = clean(mysqli_real_escape_string($con, $_POST["email"]));
    $contact = clean(mysqli_real_escape_string($con, $_POST["contact"]));
    
    //For PASSWORD MATCHING //
    if($enpass !== $conpass)
    {
        $_SESSION['errprompt'] = "Confirm password not matched!";
        header("Location: s-signup.php");
    }
    //   else 
    //   {
    //     if(strlen($snum) != 8 ){
    //   $_SESSION['errprompt'] = "The student number should be 8 digits only! ";
    //   header("location: s-signup.php");
    // }
      
    else
       {
      // Validate password strength
      $uppercase = preg_match('@[A-Z]@', $pass);
      $lowercase = preg_match('@[a-z]@', $pass) ;
      $number    = preg_match('@[0-9]@', $pass);

      if(!$uppercase || !$lowercase || !$number || strlen($pass) < 8) {
          $_SESSION['errprompt'] = "Password should be at least 8 characters in length and should include at least one upper case letter, and at least one number.";
        header("Location: s-signup.php");
        }
    else
        {
        //For Student Id Confirmation
        $chck_student_no = "SELECT * FROM student_tbl WHERE student_number = '$student_number'";
        $res = mysqli_query($con, $chck_student_no);
        
        if(mysqli_num_rows($res) > 0)
        {
          $_SESSION['errprompt'] = "Student Number is already exist!";
          header("Location: s-signup.php");
        }
        
        //For Firstname, Middle name, Lastname, birthday checking
        $chck_profile = "SELECT firstname, middlename, lastname, birthday FROM student_tbl WHERE firstname = '$firstname' AND middlename = '$middlename' AND lastname = '$lastname' AND birthday = '$birthday'";
        $res = mysqli_query($con, $chck_profile);
        
        if(mysqli_num_rows($res) > 0)
        {
          $_SESSION['errprompt'] = "Firstname, Middlename, Lastname and birthday is already exist!";
          header("Location: s-signup.php");
        }
        
    else
    {
        //For Email Checking
        $email_check = "SELECT * FROM student_tbl WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
          if(mysqli_num_rows($res) > 0)
          {
            $_SESSION['errprompt'] = "Email Address is already exist!";
            header("Location: s-signup.php");
          } 
    
      else
      {
        // Checking if all the data is not empty//
        if (!empty($student_number) && !empty($enpass) &&!empty($firstname) &&!empty($middlename) &&!empty($lastname) &&!empty($course) &&!empty($year_level) &&!empty($section) && !empty($gender) &&!empty($age) && !empty($birthday) && !empty($email) &&!empty($contact)) 
        {
      //Insert Query//
      $query = "INSERT INTO student_tbl(student_number, password, firstname, middlename, lastname, course, yearlevel, sec_id, gender, age, birthday, email, contact_number) VALUES('$student_number','$enpass','$firstname','$middlename','$lastname','$course','$year_level','$section','$gender','$age','$birthday','$email','$contact')";
      
      $result = mysqli_query($con, $query);
        
        //Redirect the user in login modulee if all the information needed are completed//
        header("location: s-login.php");
      
      }
      else
      {
        //echo "Please fill out all the information needed.";
      }
      }
      
    }
    
  }
  }
  }
  