<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7,8,edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/homepage.css" type="text/css" media="all" />
    
    <title>BORA STUDENT PORTAL | WELCOME PAGE</title>
  </head>
  
  <body>
    <header>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
       <img src="img/logo.png" alt="BORA Logo" class="img-responsive" id="logo">
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="s-signup.php">Create Account</a></li>
        <li><a href="s-login.php">Log in</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#contact">Contact Us</a></li>
      </ul>
    </nav>
  
    <div id ="text">
			
			 </div>
			<div class="button">
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="#" class="btn"> News </a> &nbsp; 
				<a href="mailto:BlueOakRidgeAcademy@gmail.com" class="btn"> Email us</a> 
			</div>
			
				<script type="text/javascript">
  var i=0, text;
  text = "BORA STUDENT PORTAL"

  function typing() {
    if(i<text.length){
      document.getElementById("text").innerHTML += text.charAt(i);
      i++;
      setTimeout(typing,100);
    }
  }
  typing();
</script>
</header>
	<footer>
	<div class="container-fluid text-white text-center pt-2" style="background: #121212;">
	  <img src="img/logo2.png" class="img-responsive mx-auto d-block" alt="BORA Logo" id="logo2">
	  
	  
	  <p id="about">About</>
	  <p id="_about">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus animi sit deserunt facilis consectetur eius voluptatem aliquam, ipsam perspiciatis sapiente ipsa tempora temporibus fugiat veritatis, voluptate earum quaerat atque explicabo.</p>
	  
	  <p id="contact">Contact Us</h2>
	  <div class="icons">
    <a href="#" class="fa fa-facebook-square"></a>
    <a href="#" class="fa fa-instagram"></a>
    <a href="#" class="fa fa-twitter" ></a>
    <a href="#" class="fa fa-google" ></a><br /><br />
	  <hr />
	  <p id="copy">&copy; Blue Oak Ridge Academy, LLC. 2022 &trade;. All rights reserved.</p>
	  <p>Developed by Kineme</p>
	  </div>
	</footer>

  </body>
</html>