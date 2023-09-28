<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bs ccs link -->
    <link rel="stylesheet" href="../../bs/css/bootstrap.min.css">

    <!-- bs js link -->
    <script src="../../bs/js/bootstrap.bundle.min.js" defer> </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        form{
            background-color: #fff;
        }
    </style>    
</head>
<body>
 <!-- navbar section -->
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary navbar-dark">
  <div class="container">
  <span class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></span>

    <!-- responsive button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- responsive button -->


    <div class="collapse navbar-collapse" id="navbarNav">
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
        <li class="nav-item">
                    <a class="nav-link  text-light btn btn-success m-2" href="#">Payment</a>
                </li>        
        <!-- ------------------------------------- -->

      </ul>
    </div>
  </div>
</nav>
<!-- navbar section -->

<div class="container" style="width:80%">
        <?php session_start() ?>
    <!-- session section -->
    <?php if(isset($_SESSION["course_success"])) : ?>
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <?= $_SESSION["course_success"] ?>
        <?php unset($_SESSION["course_success"]) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>

    <?php if(isset($_SESSION["course_fail"])) : ?>
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
        <?= $_SESSION["course_fail"] ?>
        <?php unset($_SESSION["course_fail"]) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>    
    <!-- session section --> 

      <!-- course create form -->
    <div class="card mt-3">
    <div class="card-header bg-primary text-light h5"> Create Course Form</div>
        <div class="card-body">
          <form action="../../_action/courses_data/create_courses_data.php" method="post">
            <div class="my-2">
              <label for="course" class="mb-1">Course</label>
              <input type="text" class="form-control" placeholder="Course" name="course" id="course" required>
            </div>
            <div class="my-2">
              <label for="fee" class="mb-1">Fee</label>
              <input type="text" class="form-control"  name="fee" id="fee" placeholder="Fee" required>
            </div>
            <div class="my-2">
              <input type="radio" style="opacity:0">
              <div class="float-end">
                <button type="reset"class="btn btn-danger">Reset</button>
                <button type="submit"class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
<!-- course create form -->
</body>
</html>