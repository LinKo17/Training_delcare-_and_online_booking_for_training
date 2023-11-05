<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\UsersAnotherTable;
use Helper\HTTP;
use Helper\Auth;
$database = new UsersAnotherTable(new MySQL());
$id = $_GET["id"];
$data = $database->joinTeachersAndCourses($id);
?>

<?php
session_start();

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
        .edit{
            text-align:justify;  
            word-spacing:4px;
        }
    </style>
</head>
<body>

<!-- navbar section -->
<?php  require_once("teacherNavbar.php") ?>
<!-- navbar section --> 
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 mt-4 col-12">
                <div class="">
                    <img src="../../teacherPhotos/<?= $data[0]->teacher_img?>" alt="" style="width:100%; height:500px">
                </div>
            </div>
            <div class="col-lg-7 col-md-12 mt-4 col-12">
                <ul class="list-group">
                    <li class="list-group-item text-center fs-5"><?= $data[0]->teacher_name ?></li>
                    <li class="list-group-item text-center"><?=  $data[0]->c_course ?></li>
                    <li class="list-group-item fw-medium edit">
                    <?=  $data[0]->description ?></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>