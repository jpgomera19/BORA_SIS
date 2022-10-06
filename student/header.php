<nav class="navbar navbar-expand-lg navbar-default bg-default">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    
      <div class="sidebar-brand-icon">
                  <img src="img/logo.png" alt="BORA LOGO" width="15%" class="img-responsive" />
      </div>
      <a class="navbar-brand" href="StudenHome.php" style="font-weight: 900; font-family: 'Koulen', cursive; color: black; ">BORA - Student Information System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    <?php 

      if(isset($_SESSION['student_number'], $_SESSION['password'])) {

    ?>
    
      <form class="navbar-form navbar-right" action="searchresults.php" method="GET">

      <!--  <div class="search-area">-->
      <!--    <div class="form-group">-->

      <!--      <div class="search-wrap">-->

      <!--        <label for="searchbox" class="sr-only">Search:</label>-->
      <!--        <input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Search student name here" required autocomplete="off">-->
              
      <!--        <div class="search-results hide"></div>-->

      <!--      </div>-->
            

      <!--    </div>-->
      <!--    <input type="submit" name="search" id="search-btn" value="Search" class="btn btn-success">-->
      <!--  </div>-->
        
          <ul class="navbar-nav me-auto mb-3 mb-lg-0" id="links">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="StudentHome.php" style="color: black; ">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php" style="color: black; ">&nbsp; &nbsp; Profile</a></li>
            <li class="nav-item"><a  class="nav-link" href="grade.php" style="color: black; ">&nbsp; &nbsp; Grades</a></li>
            <li class="nav-item"><a   class="nav-link" href="balance.php" style="color: black; ">&nbsp; &nbsp; Balance</a></li>
            <li class="nav-item"><a   class="nav-link" href="cor.php" style="color: black; ">&nbsp;&nbsp;  COR</a></li>
          </ul>
        
        
        <a href="logout.php" style="color: red; ">Log Out <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
        
        
      </form>

      <?php 

        } else {
          echo "<span class='not-logged'>Not logged in.</span>";
        }

      ?>

      


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
