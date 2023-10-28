    <!-- navbar section -->
    <nav class="navbar navbar-dark bg-primary">
    <div class="container">

    <a href="" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>

    <!-- responsive button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- responsive button -->

    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></h5>

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
      <ul class="navbar-nav">
        <!-- ------------------------------------- -->
        <li class="list-item dropdown">
                    <a class="nav-link  text-light btn btn-dark m-2 dropdown-toggle" data-bs-toggle="dropdown" href="">Home</a>
                    <div class="dropdown-menu">
                        <a href="../adminpanel.php" class="dropdown-item">Admin Panel</a>
                        <a href="../../index.php" class="dropdown-item">Home</a>
                    </div>
                </li> 
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link text-light btn btn-warning m-2  dropdown-toggle" href="" data-bs-toggle="dropdown">Active Classes</a>
                    <div class="dropdown-menu">
                        <a href="../createclasspost.php" class="dropdown-item">Create Classes</a>
                        <a href="../createclassinfo.php" class="dropdown-item">Classes Info</a>
                    </div>
                </li>        
        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link  text-light btn btn-info m-2 dropdown-toggle" data-bs-toggle="dropdown" href="">Teachers List</a>
                    <div class="dropdown-menu">
                        <a href="../teachers/teachers_create.php" class="dropdown-item">Insert teacher</a>
                        <a href="../teachers/teachers_info.php" class="dropdown-item">Teacher info</a>
                    </div>
                </li>

        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light btn btn-secondary m-2" href="#" data-bs-toggle="dropdown">Courses</a>
                    <div class="dropdown-menu">
                      <a href="../courses/create_course.php" class="dropdown-item">Create Courses</a>
                      <a href="../courses/course_info.php" class="dropdown-item">Courses Info</a>
                    </div>
                </li>        
        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light btn btn-success m-2" href="#" data-bs-toggle="dropdown">Contact</a>
                    <div class="dropdown-menu">
                      <a href="" class="dropdown-item">Social Media</a>
                      <a href="users_msg.php" class="dropdown-item text-center">Users Message</a>
                      <a href="about_us.php" class="dropdown-item text-center">About us</a>
                    </div>
                </li>         
        <!-- ------------------------------------- -->

      </ul>

      </div>
    </div>
  </div>
</nav>
    <!-- navbar section -->