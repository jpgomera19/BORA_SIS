   <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                  <img src="img/logo.png" alt="BORA LOGO" width="40%" class="img-responsive" />
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
             STUDENT 
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="addstudent.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add Student </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="assignstudent.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Assign Students</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="StudentGrade.php">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Upload Grades</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Student Details</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-md-block">
            
                        <div class="sidebar-heading">
                FACULTY  
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
              <a class="nav-link" href="addfaculty.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add Faculty </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="facultytable.php">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Faculty Details</span></a>
            </li>
            
                     <!-- Divider -->
            <hr class="sidebar-divider d-md-block">
            
                        <div class="sidebar-heading">
                USERS  
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="adduser.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add User</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addannouncement.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Create announcements</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addbalance.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add Balances</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="uploadedfile.php">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Uploaded Grades </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="usertable.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User Details</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-black topbar mb-4 static-top shadow">
                  <div id="title" style="color: black; font-weight:900;font-size:18px; ">BLUE OAK RIDGE ACADEMY - BORA</div>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-daek d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="mr-3 mt-4">
            </div>
                                    <div>
                                     

                        <!-- Nav Item - User Information -->
            <?php
            $query = "SELECT * FROM user_tbl where username ='".$_SESSION['username']."'";
          if($result = mysqli_query($con, $query)) 
        {
          $row = mysqli_fetch_assoc($result);
        } 
      ?>
                        <li class="nav-item dropdown no-arrow">
  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-lg-inline text-black-600 small" style="color:black;">Welcome! <?php echo $row['firstname'];?></span>
        
       <?php 
          $query = "SELECT * FROM user_tbl WHERE username ='".$_SESSION['username']."'";
          if($result = mysqli_query($con, $query)) {

            while($row = mysqli_fetch_assoc($result)){
            $image = $row['image'];
          ?>
  <img class="img-profile rounded-circle" <?php echo '<img src="image/'.$image.'" />';?>
      </a>
      <?php }}?>
                           
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="userprofile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-black-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="settings.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-black-400"></i>
                                    Settings
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
