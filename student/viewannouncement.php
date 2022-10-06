<?php 
  include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=7,8,edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BORA Student Portal | View Announcements</title>
</head>
<body>
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center" >
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5" >
          <div class="card-body p-0"  >
            <!-- Nested Row within Card Body -->
            <div class="row" >

                <h1 class="h1 text-black text-center mb-4" style="font-family: 'Koulen', cursive;
  font-size: 50px;">BLUE OAK RIDGE ACADEMY </h1>
  <center>
                <img src="img/logo.png" alt="BORA LOGO" class="img-responsive" style="width:20%;"/>
  </center>

                <h2 class="h5 text-black text-center mb-4"><strong>ANNOUNCEMENTS</strong></h2>
           <?php 
            $query = "SELECT * FROM announcement_tbl";
            if($result = mysqli_query($con, $query)) {

            $row = mysqli_fetch_assoc($result);
                ?>
      <div class="container">
      <h3 style="text-align:center;">"<?php echo $row['title'];?>"</h3>
      <h5 style="border:none; text-align:center;text-align: justify;text-justify: inter-word;margin:2.5rem;text-indent:2rem;"><?php echo $row['message'];?></h5>
  <?php } ?>  
      <div class="container">      <button type="button" class="btn btn-dark" style="margin:1rem;" onclick="window.history.go(-1)"> Back</button></div>

  

</div>	
</div>	
</div>	
</div>	
</div>	
</div>	
</div>	

</body>
</html>

<?php


@include'config.php';

if(isset($_POST['add_product'])){

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_FILES['product_image']['name'];
  $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
  $product_image_folder = 'image/'. $product_image;


  if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'Make sure you fill out all';
  }else{
    $insert ="INSERT INTO cart_db(name, price, image) VALUES('$product_name', '$product_price','$product_image')";
    $upload = mysqli_query($conn, $insert);

    if($upload){
      move_uploaded_file($product_image_tmp_name,  $product_image_folder);
      $message[] = 'New Product Added Successfully';
    }else{
      $message[] = 'The Product Could Not Added';
    }
  }

}