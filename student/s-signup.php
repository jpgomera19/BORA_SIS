<?php
  session_start();
  require "connection.php";
  require "function.php";
  
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=7,8,edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Koulen&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/494d8a5cb9.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style-signup.css">
    <title>BORA STUDENT PORTAL | SIGNUP</title>
  </head>
  <body>
    <div class="container bg-white p-2 text-center" id="container">
      
          <?php 
    if(isset($_SESSION['errprompt'])) {
          showError();
      }
    ?>
  <script>
$(document).ready(function () {
  window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 8000);
 
});
  </script>
  
      <form class="row g-1" id="regForm" action="action.php" method="post" accept-charset="utf-8" >
        <img src="img/Logo-signup.jpg" alt="Sign Up Logo" class="img-rounded mx-auto d-block" id="img-logo" >
        <h2>BORA STUDENT PORTAL</h2>
        <h3 style="font-weight: 900;">Sign Up Form</h3>
  
  
  <div class="tab">
  <div class="col-xs-12 col-md-8" id="input_box">
  <i class="fas fa-users"></i>
    <input type="number" placeholder="STUDENT NUMBER" name="snum" id="snum"   oninput="this.className = ''"required autofocus>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <div class="col-xs-12 col-md-8" id="input_box">
      <i class="fas fa-key"></i>
      <input type="password" placeholder="PASSWORD" id="myinput" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters. Makinig ka dahil once na mahack 'yang account mo, kami pa sisisihin mo! Hindot!" required autofocus>
      <span class="eyes" onclick="myFunction()">
      <i id="hide1" class="fas fa-eye"></i>
      <i id="hide2" class="fas fa-eye-slash"></i>
      </span>
      </div>

    
    <div class="col-xs-12 col-md-8" id="input_box">
    <i class="fas fa-key"></i>
    <input type="password" placeholder="CONFIRM PASSWORD" id="myinput2" name="conpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters. Makinig ka dahil once na mahack 'yang account mo, kami pa sisisihin mo! Hindot!" required autofocus>
      <span class="eyes2" onclick="myFunction2()">
      <i id="hide3" class="fas fa-eye"></i>
      <i id="hide4" class="fas fa-eye-slash"></i>
      </span>
      </div>
      <span id='message'></span>
      <script type="text/javascript" charset="utf-8">
        $('#myinput, #myinput2').on('keyup', function () {
        if ($('#myinput').val() && $('#myinput2').val() == null) {
          $('');
        }
        else if ($('#myinput').val() == $('#myinput2').val()) {
          $('#message').html('Matched').css('color', 'green');
        } else 
          $('#message').html('Unmatched').css('color', 'red');
      });
      </script>
    
    <div class="col-xs-12 col-md-8" id="input_box">
    <i class="fas fa-users"></i>
     <input type="text" name="fname" id="fname" placeholder="FIRST NAME" oninput="this.className = ''" required autofocus>
    </div>
        
    <div class="col-xs-12 col-md-8" id="input_box">
    <i class="fas fa-users"></i> 
     <input type="text" name="mname" id="mname" placeholder="MIDDLE NAME" oninput="this.className = ''" required autofocus>
    </div> 
        
   <div class="col-xs-12 col-md-8" id="input_box">
   <i class="fas fa-users"></i>
   <input type="text" name="lname" id="lname" placeholder="LAST NAME"  oninput="this.className = ''" required autofocus>
  </div>

   <div class="col-xs-12 col-md-8" id="input_box">
 <i class="fas fa-users"></i>
 <select name="course" id="course" placeholder="COURSE" required>
   <option value="Select">COURSE</option>
   <option value="BSIT">BSIT</option>
   <option value="BSCRIM">BSCRIM</option>
   <option value="BSEDUC">BSEDUC</option>
   <option value="BSBA">BSBA</option>
   <option value="BSAIS">BSAIS</option>

 </select>
</div>

  <div class="col-xs-12 col-md-8" id="input_box">
  <i class="fas fa-users"></i>
  <select name="yrlevel" id="yrlevel"  required>
   <option value="Select">YEAR LEVEL</option>
   <option value="1st Year">1ST_YEAR</option>
   <option value="2nd Year">2ND_YEAR</option>
   <option value="3rd Year">3RD_YEAR</option>
   <option value="4th Year">4THYEAR</option>
    </select>
    </div>

  <div class="col-xs-12 col-md-8" id="input_box">
     <i class="fas fa-users"></i>
    <select name="section" id="section" required>
    <option value="" disabled selected>SECTION</option>
    <option value="" disabled >For BSIT 1st Year</option>
    <option value="1">BSIT 101</option>
    <option value="2">BSIT 102</option>
    <option value="3">BSIT 103</option>
    <option value="4">BSIT 104</option>
    <option value="5">BSIT 105</option>
    <option value="" disabled >For BSIT 2nd Year</option>
    <option value="6">BSIT 201</option>
    <option value="7">BSIT 202</option>
    <option value="8">BSIT 203</option>
    <option value="9">BSIT 204</option>
    <option value="10">BSIT 205</option>
    <option value="" disabled >For BSIT 3rd Year</option>
    <option value="11">BSIT 301</option>
    <option value="12">BSIT 302</option>
    <option value="13">BSIT 303</option>
    <option value="14">BSIT 304</option>
    <option value="15">BSIT 305</option>
    <option value="" disabled >For BSIT 4th Year</option>
    <option value="16">BSIT 401</option>
    <option value="17">BSIT 402</option>
    <option value="18">BSIT 403</option>
    <option value="19">BSIT 404</option>
    <option value="20">BSIT 405</option>
    <option value="" disabled >For BSCRIM 1st Year</option>
    <option value="21">BSCRIM 101</option>
    <option value="22">BSCRIM 102</option>
    <option value="23">BSCRIM 103</option>
    <option value="24">BSCRIM 104</option>
    <option value="25">BSCRIM 105</option>
     <option value="" disabled >For BSCRIM 2nd Year</option>
    <option value="26">BSCRIM 201</option>
    <option value="27">BSCRIM 202</option>
    <option value="28">BSCRIM 203</option>
    <option value="29">BSCRIM 204</option>
    <option value="30">BSCRIM 205</option>
    <option value="" disabled >For BSCRIM 3rd Year</option>
    <option value="31">BSCRIM 301</option>
    <option value="32">BSCRIM 302</option>
    <option value="33">BSCRIM 303</option>
    <option value="34">BSCRIM 304</option>
    <option value="35">BSCRIM 305</option>
    <option value="" disabled >For BSCRIM 4th Year</option>
    <option value="36">BSCRIM 401</option>
    <option value="37">BSCRIM 402</option>
    <option value="38">BSCRIM 403</option>
    <option value="39">BSCRIM 404</option>
    <option value="40">BSCRIM 405</option>
    <option value="" disabled >For BSEDUC 1st Year</option>
    <option value="41">BSEDUC 101</option>
    <option value="42">BSEDUC 102</option>
    <option value="43">BSEDUC 103</option>
    <option value="44">BSEDUC 104</option>
    <option value="45">BSEDUC 105</option>
    <option value="" disabled >For BSEDUC 2nd Year</option>
    <option value="46">BSEDUC 201</option>
    <option value="47">BSEDUC 202</option>
    <option value="48">BSEDUC 203</option>
    <option value="49">BSEDUC 204</option>
    <option value="50">BSEDUC 205</option>
    <option value="" disabled >For BSEDUC 3rd Year</option>
    <option value="51">BSEDUC 301</option>
    <option value="52">BSEDUC 302</option>
    <option value="53">BSEDUC 303</option>
    <option value="54">BSEDUC 304</option>
    <option value="55">BSEDUC 305</option>
    <option value="" disabled >For BSEDUC 4th Year</option>
    <option value="56">BSEDUC 401</option>
    <option value="57">BSEDUC 402</option>
    <option value="58">BSEDUC 403</option>
    <option value="59">BSEDUC 404</option>
    <option value="60">BSEDUC 405</option>
    <option value="" disabled >For BSBA 1st Year</option>
    <option value="61">BSBA 101</option>
    <option value="62">BSBA 102</option>
    <option value="63">BSBA 103</option>
    <option value="64">BSBA 104</option>
    <option value="65">BSBA 105</option>
    <option value="" disabled >For BSBA 2nd Year</option>
    <option value="66">BSBA 201</option>
    <option value="67">BSBA 202</option>
    <option value="68">BSBA 203</option>
    <option value="69">BSBA 204</option>
    <option value="70">BSBA 205</option>
    <option value="" disabled >For BSBA 3rd Year</option>
    <option value="71">BSBA 301</option>
    <option value="72">BSBA 302</option>
    <option value="73">BSBA 303</option>
    <option value="74">BSBA 304</option>
    <option value="75">BSBA 305</option>
    <option value="" disabled >For BSBA 4th Year</option>
    <option value="76">BSBA 401</option>
    <option value="77">BSBA 402</option>
    <option value="78">BSBA 403</option>
    <option value="79">BSBA 404</option>
    <option value="80">BSBA 405</option>
    <option value="" disabled >For BSAIS 1st Year</option>
    <option value="81">BSAIS 101</option>
    <option value="82">BSAIS 102</option>
    <option value="83">BSAIS 103</option>
    <option value="84">BSAIS 104</option>
    <option value="85">BSAIS 105</option>
    <option value="" disabled >For BSAIS 2nd Year</option>
    <option value="86">BSAIS 201</option>
    <option value="87">BSAIS 202</option>
    <option value="88">BSAIS 203</option>
    <option value="89">BSAIS 204</option>
    <option value="90">BSAIS 205</option>
    <option value="" disabled >For BSAIS 3rd Year</option>
    <option value="91">BSAIS 301</option>
    <option value="92">BSAIS 302</option>
    <option value="93">BSAIS 303</option>
    <option value="94">BSAIS 304</option>
    <option value="95">BSAIS 305
    </option>
    <option value="" disabled >For BSAIS 4th Year</option>
    <option value="96">BSAIS 401</option>
    <option value="97">BSAIS 402</option>
    <option value="98">BSAIS 403</option>
    <option value="99">BSAIS 404</option>
    <option value="100">BSAIS 405</option>
    </select>
    </div>
    


           
    
    
    
    
  <div class="col-xs-12 col-md-8" id="input_box">
     <i class="fas fa-users"></i>
  <select name="gender" id="gender">
       <option value=default>GENDER</option>
       <option value="male">MALE</option>
       <option value="female">FEMALE</option>
       
    </select>
    </div>
    
  <div class="col-xs-12 col-md-8" id="input_box">
     <i class="fas fa-users"></i>
     <input type="number" name="age" id="age" placeholder="AGE"  oninput="this.className = ''" required autofocus>
    </div>
    
  <div class="col-xs-12 col-md-8" id="input_box">
     <i class="fas fa-users"></i>
     <input type="text" name="birthday" id="birthday" min="1960-01-01" max="2005-01-01" placeholder="BIRTHDAY (Double click...)"  onfocus="(this.type='date')" oninput="this.className = ''" required autofocus>
    </div>
    
  <div class="col-xs-12 col-md-8" id="input_box">
     <i class="fas fa-envelope "></i>
     <input type="email" name="email" id="email" placeholder="EMAIL ADDRESS" oninput="this.className = ''" required autofocus>
    </div>
    


   <div class="col-xs-12 col-md-8" id="input_box">
   <i class="fas fa-address-book"></i>
   <input type="text" name="contact"  title="Please follow the format. 09*********" id="contact" placeholder="CONTACT NUMBER" oninput="this.className = ''" required autofocus>
    </div> 
    </div> 
    
    <div class="tab" style="display: none; margin-left: 2rem; "><br><br>
    <strong style="float: left;">STUDENT NUMBER: </strong><div data-placeholder="STUDENT NUMBER" id="review_snum" name="review_snum" style="float: left; margin-left: 5px; border-bottom: 1px solid black; "></div><br><br>
    <strong style="float: left;">FIRST NAME: </strong><div id="review_fname" name="review_fname" style="float: left; margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
    <strong style="float: left;">MIDDLE NAME: </strong> <div id="review_mname" name="review_mname" style="float: left;margin-left: 5px; border-bottom: 1px solid black;"></div><br><br>
    <strong style="float: left;">LAST NAME: </strong><div id="review_lname" name="review_lname" style="float: left;margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
    
    <strong style="float: left;">COURSE: </strong><div id="review_course" name="review_course" style="float: left;margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
    <strong style="float: left;">YEAR LEVEL: </strong><div id="review_yrlevel" name="review_yrlevel" style="float: left;margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
    
    <strong style="float: left;">SECTION: </strong><div id="review_section" name="review_section" style="float: left;margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
    <strong style="float: left;">GENDER: </strong><div id="review_gender" name="review_gender" style="float: left;margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
    <strong style="float: left;">AGE: </strong><div     id="review_age" name="review_age" style="float: left;margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
    <strong style="float: left;">BIRTHDAY(yyyy-mm-dd): </strong><div     id="review_birthday" name="review_birthday" style="float: left;margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
    <strong style="float: left;">EMAIL ADDRESS: </strong><div     id="review_email" name="review_email" style="float: left;margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
    <strong style="float: left;">CONTACT NUMBER: </strong><div     id="review_contact" name="review_contact" style="float: left;margin-left: 5px;border-bottom: 1px solid black;"></div><br><br>
 </div>
    
    <div style="overflow:hidden;">
    <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
    </div>
  <!--  <div class="col-12">-->
  <!-- <button id="submit" type="submit" name="submit">Submit</button>-->
  <!--  </div>-->
    <div class="col-12">
    <button id="btn-s" type="button" name="button" onclick="window.history.go(-1)">Back</button>
    </div>
    
    
    <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    </div>
    
    </form>
    </div>
    
    
    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    
    function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    } else {
    document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == 1) {
    document.getElementById("btn-s").style.display = "none";
    } else {
    document.getElementById("btn-s").style.display = "abso";
    }
    if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
    document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
    }
    
    function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    
    if(currentTab == x.length-2) {
    
    document.getElementById("review_snum").innerHTML = document.getElementById("snum").value;
    document.getElementById("review_fname").innerHTML = document.getElementById("fname").value;
    document.getElementById("review_mname").innerHTML = document.getElementById("mname").value;
    document.getElementById("review_lname").innerHTML = document.getElementById("lname").value;
    
    document.getElementById("review_course").innerHTML = document.getElementById("course").value;
    
    document.getElementById("review_yrlevel").innerHTML = document.getElementById("yrlevel").value;
    
    document.getElementById("review_section").innerHTML = document.getElementById("section").value;
    document.getElementById("review_gender").innerHTML = document.getElementById("gender").value;
    document.getElementById("review_age").innerHTML = document.getElementById("age").value; 
    document.getElementById("review_birthday").innerHTML = document.getElementById("birthday").value; 
    document.getElementById("review_email").innerHTML = document.getElementById("email").value; 
    document.getElementById("review_contact").innerHTML = document.getElementById("contact").value; 
    
    }
    
    currentTab = currentTab + n;
    
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
    }
    
    // Otherwise, display the correct tab:
    showTab(currentTab);
    
    }
    
        function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
    // add an "invalid" class to the field:
    y[i].className += " invalid";
    // and set the current valid status to false
    valid = false;
    }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
    }
    
    function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
    }
    </script>
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        <script>
      function myFunction() {
        var x = document.getElementById("myinput");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");
        
        if (x.type === 'password'){
          x.type = "text";
          y.style.display = "block"; 
          z.style.display = "none";
        }
        
        else{
          x.type = "password";
          y.style.display = "none"; 
          z.style.display = "block";
        }
      }
      
      function myFunction2() {
        var x = document.getElementById("myinput2");
        var y = document.getElementById("hide3");
        var z = document.getElementById("hide4");
        
        if (x.type === 'password'){
          x.type = "text";
          y.style.display = "block"; 
          z.style.display = "none";
        }
        
        else{
          x.type = "password";
          y.style.display = "none"; 
          z.style.display = "block";
        }
      }
    </script>
    <?php include "footer.php";?>
  </body>
</html>