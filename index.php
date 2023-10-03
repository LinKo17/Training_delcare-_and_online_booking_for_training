<?php
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\UsersAnotherTable;
use Helper\HTTP;
use Helper\Auth;

$database = new UsersAnotherTable(new MySQL);
$data = $database->joinClassPostsAndCoursesLimit();
session_start();
// echo Auth::randomNumber();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bs ccs link -->
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">

    <!-- bs js link -->
    <script src="bs/js/bootstrap.bundle.min.js" defer> </script>

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
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item my-1">
            <a href="teachers/teachers_info.php" class="nav-link active btn btn-light text-dark"> Teachers </a>
          </li>
          <li class="nav-item my-1">
          <a href="courses/course_info.php" class="nav-link active btn btn-light text-dark"> Courses And Fee </a>
          </li>
          <li class="nav-item my-1">
          <a href="others/contact_us.php" class="nav-link active btn btn-light text-dark"> Contact Us</a>
          </li>
          <li class="nav-item my-1">
            <a href="admin/adminpanel.php" class="nav-link active btn btn-danger">Admin</a>
          </li>
        </ul>

      </div>
    </div>
  </div>
</nav>
    <!-- navbar section -->

    <!-- view section -->
    <div class="viewHomePage">
        <div class="header bg-light p-2">
            <h1 class="h4 text-center fs-3 text-primary">Technology <span class="fs-5 text-black">is for everyone</span></h1>
            <h1 class="h5 text-center fs-6">-- <span class="fs-6"><span class="text-warning fs-5">My</span>Technology</span> is warmly welcome you --</h1>
        </div>
    </div>
    <!-- view section -->

    <!-- open time -->
    <div class="bg-dark text-center p-4" >
        <div class="bg-light container p-2" style="border-radius:10px; width:45%;">

            <h1 class="h4 text-light"><span class="text-dark">Open Date : <span class="text-primary">Monday</span> To <span class="text-success">Sunday</span></span></h1>

            <h1 class="h5 text-light"><span class="text-dark">Open Time : <span class="text-primary">8:00 AM</span> To <span class="text-success">7:00 PM</span></span></h1>
        </div>
    </div>
    <!-- open time -->

    <!-- recently class open -->
    <div class="container border rounded border-seconary g-0 mt-2">
        <div class="navbar navbar-dark bg-secondary p-2">
            <span class="navbar-brand">New Classes</span>
            <div class="navbar-menu">
                <a href="getMoreClassInfo.php" class=" btn btn-primary p-2">Get More Infomation</a>
            </div>
        </div>
        <div class="row">
<!-- ------------- -->
<div class="container" style="width:100%;"> 
    <div class="row mx-1">

        <?php foreach($data as $item) : ?>
        <div class="col-lg-4  p-2 col-md-6">
            <div class="border card p-1">
                <div class="card-body">
                    <?php if(file_exists("classPostPhotos/$item->image")): ?>
                    <img src="classPostPhotos/<?= $item->image ?>" alt="" style="width:100%; height:200px;">
                    <?php endif ?>
                    <h1 class="h5 text-center my-1"><?= $item->c_course ?></h1>
                </div>

                <div class="card-footer">
                    <a style="width:32%" href="indexDetail.php?id=<?=$item->id?>&&rd=<?= Auth::randomNumber() ?>&&ds=ho" class="btn btn-secondary float-end">Details</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>


    </div>
</div>
<!-- ------------- -->
        </div>
    </div>
    <!-- /recently class open -->
</body>
</html>