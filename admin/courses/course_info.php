<?php
include("../../_action/courses_data/course_info_data.php");
$data = $result;

use Helper\Auth;
session_start();
 $rd = Auth::randomNumber();

//checking user role in here
Auth::checkUserRole();
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
<?php  require_once("courseNavbar.php") ?>
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