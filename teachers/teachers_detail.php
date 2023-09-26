<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
$database = new UsersTable(new MySQL);
$id = $_GET["id"];
$data = $database->showTeacherSingleData($id);
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

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .edit{
            text-align:justify;  
            word-spacing:4px;
        }
    </style>
</head>
<body>
      <!-- navbar section -->
      <div class="navbar navbar-dark navbar-expand bg-primary">
        <div class="container">
            <a href="" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>
            <div class="navbar-nav">
                <a href="teachers_info.php" class="btn btn-dark nav-link active">Back</a>
            </div>
        </div>
    </div>
    <!-- navbar section -->

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 mt-4 col-12">
                <div class="">
                    <img src="../teacherPhotos/<?= $data->teacher_img?>" alt="" style="width:100%; height:500px">
                </div>
            </div>
            <div class="col-lg-7 col-md-12 mt-4 col-12">
                <ul class="list-group">
                    <li class="list-group-item text-center fs-5"><?= $data->teacher_name?></li>
                    <li class="list-group-item text-center"><?=  $data->category_id ?></li>
                    <li class="list-group-item fw-medium edit">
                    <?=  $data->description ?></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>