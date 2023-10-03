<?php 
include("../../_action/contact_data/contact_data.php");
use Helper\Auth;
session_start();
$random = Auth::randomNumber();

?>
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
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light btn btn-success m-2" href="#" data-bs-toggle="dropdown">Contact</a>
                    <div class="dropdown-menu">
                      <a href="social_media_link.php" class="dropdown-item">Social Media</a>
                      <a href="" class="dropdown-item">Users Message</a>
                    </div>
                </li>         
        <!-- ------------------------------------- -->

      </ul>
    </div>
  </div>
</nav>
<!-- navbar section -->

<!-- user contact information section -->
<div class="container" style="width:100%;"> 
    <div class="row">
        <?php foreach($data as $item) : ?>
        <div class="col-lg-4  p-2 col-md-6">

            <div class="border card p-1">

                <div class="card-header bg-info">
                    <h1 class="h5 d-inline-block "><?=$item->email ?></h1>

                    <?php if($item->done == 0): ?>
                        <span class="badge bg-danger float-end">!</span>
                        <?php endif ?>
                </div>

                <div class="card-body">
                    <h1 class="h5  my-2"><?= substr($item->content,0,200); ?></h1>
                </div>

                <div class="card-footer">
                    <a style="width:35%" href="../../_action/contact_data/contact_delete.php?id=<?= $item->id?>&&rd=<?= $random ?>" class="btn btn-danger" onclick="return confirm('Are you Sure?')">Delete</a>
                    <a style="width:63%" href="users_msg_detail.php?id=<?= $item->id?>&&rd=<?= $random ?>" class="btn btn-secondary">Read More</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>


    </div>
</div>
<!-- user contact information section -->
</body>
</html>
