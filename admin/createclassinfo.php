<?php
include("../_action/createclassinfodata.php");
// echo $random;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bs ccs link -->
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css">

    <!-- bs js link -->
    <script src="../bs/js/bootstrap.bundle.min.js" defer> </script>

    <!-- original css link -->
    <link rel="stylesheet" href="style.css">

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
                        <a href="adminpanel.php" class="dropdown-item">Admin Panel</a>
                        <a href="../index.php" class="dropdown-item">Home</a>
                    </div>
                </li> 
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link text-light btn btn-warning m-2  dropdown-toggle" href="" data-bs-toggle="dropdown">Active Classes</a>
                    <div class="dropdown-menu">
                        <a href="createclasspost.php" class="dropdown-item">Create Classes</a>
                        <a href="createclassinfo.php" class="dropdown-item">Classes Info</a>
                    </div>
                </li>        
        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link  text-light btn btn-info m-2 dropdown-toggle" data-bs-toggle="dropdown" href="">Teachers List</a>
                    <div class="dropdown-menu">
                        <a href="teachers/teachers_create.php" class="dropdown-item">Insert teacher</a>
                        <a href="teachers/teachers_info.php" class="dropdown-item">Teacher info</a>
                    </div>
                </li>

        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light btn btn-secondary m-2" href="#" data-bs-toggle="dropdown">Courses</a>
                    <div class="dropdown-menu">
                      <a href="courses/create_course.php" class="dropdown-item">Create Courses</a>
                      <a href="courses/course_info.php" class="dropdown-item">Courses Info</a>
                    </div>
                </li>        
        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light btn btn-success m-2" href="#" data-bs-toggle="dropdown">Contact</a>
                    <div class="dropdown-menu">
                      <a href="contact/social_media_link.php" class="dropdown-item">Social Media</a>
                      <a href="contact/users_msg.php" class="dropdown-item">Users Message</a>
                    </div>
                </li>         
        <!-- ------------------------------------- -->

      </ul>
    </div>
  </div>
</nav>
<!-- navbar section -->

    <!-- session section -->
    <div class="container">
        <?php if(isset($_SESSION["insert_post"])) : ?>
            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                <?= $_SESSION["insert_post"] ?>
                <?php unset($_SESSION["insert_post"]) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
    
        <?php if(isset($_SESSION["insert_post_fail"])) : ?>
            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                <?= $_SESSION["insert_post_fail"] ?>
                <?php unset($_SESSION["insert_post_fail"]) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>    
    </div>
    <!-- session section -->   

<!-- showing class  post information -->
<div class="container" style="width:100%;"> 
    <div class="row">
        <?php foreach($data as $item) : ?>
        <div class="col-lg-4  p-2 col-md-6">
            <div class="border card p-1">
                <div class="">
                    <img src="../classPostPhotos/<?= $item->image?>" alt="" style="width:100%; height:200px;">
                </div>
                <h1 class="h5 text-center my-2"><?= $item->c_course ?></h1>
                <div class="card-footer">
                    <a style="width:32%" href="adminclasspostedit.php?id=<?= $item->id?>&&rd=<?=$random?>" class="btn btn-primary">Edit</a>
                    <a style="width:32%" href="../_action/adminclasspostdelete.php?id=<?= $item->id?>&&rd=<?=$random?>" class="btn btn-danger" onclick="return confirm('Are you Sure?')">Delete</a>
                    <a style="width:32%" href="adminclasspostdetail.php?id=<?= $item->id?>&&rd=<?=$random?>" class="btn btn-secondary">Details</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>


    </div>
</div>
<!-- /showing class post information -->
</body>        
</html>