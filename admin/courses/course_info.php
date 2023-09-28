<?php
include("../../_action/courses_data/course_info_data.php");
$data = $result;

use Helper\Auth;
session_start();
 $rd = Auth::randomNumber();
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
        form{
            background-color: #fff;
        }
        #container-width{
          width:80%;
        }
        @media(max-width:900px){
          #container-width{
            width:100%;
          }
        }

        @media(max-width:500px){
         #btn-style{
          margin-top:2px;
          width:100%;
         }
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


<!-- course create form -->
<div class="container" id="container-width">
  
  <!-- session section -->
  <?php if(isset($_SESSION["course_edit"])) : ?>
  <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
      <?= $_SESSION["course_edit"] ?>
      <?php unset($_SESSION["course_edit"]) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif ?>
  
  <?php if(isset($_SESSION["course_edit_fail"])) : ?>
  <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
      <?= $_SESSION["course_edit_fail"] ?>
      <?php unset($_SESSION["course_edit_fail"]) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif ?>    
  <!-- session section -->

    <div class="card mt-3">
    <div class="card-header bg-primary text-light h5 text-center">Courses</div>
        <div class="card-body">
          <table class="table table-striped table-bordered table-hover ">
            <tr>
              <th>Courses</th>
              <th>Fee</th>
              <th>Action</th>
            </tr>
            <?php foreach($data as $item) : ?>
            <tr>
              <th><?= $item->course ?></th>
              <th><?= $item->fee ?></th>
              <th>
                <a href="course_edit.php?id=<?= $item->id?>&&rd=<?=$rd?>" class="btn btn-primary" id="btn-style">Edit</a>

                <?php if($item->hide == 0) : ?>
                <!-- hide -> 1 -->
                <a href="../../_action/courses_data/course_hide_data.php?id=<?= $item->id?>&&rd=<?=$rd?>" class="btn btn-warning" id="btn-style">Hide</a>
                <?php elseif($item->hide == 1) : ?>
                <!-- show -> 0 -->
                <a href="../../_action/courses_data/course_show_data.php?id=<?= $item->id?>&&rd=<?=$rd?>" class="btn btn-success" id="btn-style">Show</a>
                <?php endif ?>
              </th>
            </tr>
            <?php endforeach ?>
          </table>
        </div>
    </div>
</div>
<!-- course create form -->
</body>
</html>