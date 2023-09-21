<?php
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Helper\Auth;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/index.php");
}

$database = new UsersTable(new MySQL());
$id = $_GET["id"];
$data = $database->showSingleData($id);
//---------------- time management ----------
$timeString = $data->class_time;

// Split the time string into its components
list($dbminute, $dbhours, $ampm) = explode('/', $timeString);
// echo $dbminute . "<br>";
// echo $dbhours . "<br>";
// echo $ampm . "<br>";


//---------------- /time management ----
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
    <script src="js/bootstrap.bundle.min.js" defer> </script>

    <!-- original css link -->
    <link rel="stylesheet" href="style.css">    

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        img{
            width:100%;
            height:500px;
        }


        select {
            flex: 1;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            width:33%;
        }
        form{
            background:#fff;
        }
        @media(max-width:600px){
            select{
                padding:7px;
                font-size:14px;
                display:block;
                width:100%;
            }
            img{
                height:300px;
            }
        }

    </style>    
</head>
<body>
      <!-- navbar section -->
      <div class="navbar navbar-dark navbar-expand bg-primary">
        <div class="container">
            <a href="" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>
            <div class="navbar-nav">
                <?php if($_GET["ds"] === "all") : ?>
                <a href="getMoreClassInfo.php" class="btn btn-dark nav-link active">Back</a>
                <?php else : ?>
                    <a href="index.php" class="btn btn-dark nav-link active">Back</a>
                <?php endif ?>


            </div>
        </div>
    </div>
    <!-- navbar section -->

    <!-- class information -->
    <div class="container mt-2">
        <ul class="list-group">
            <li class="list-group-item">
                <img src="classPostPhotos/<?= $data->image ?>" alt="">
            </li>
            <li class="list-group-item">
                <h1 class="h5 text-center"><?= $data->category_id ?></h1>
            </li>
            <li class="list-group-item"><?= $data->description ?></li>
            <li class="list-group-item">
                Teacher : 
                <?= $data->teacher_id ?>
            </li>
            <li class="list-group-item">
                Class Start : <?= $data->class_date ?>
            </li>
            <li class="list-group-item">
                Class Time : <?= $dbhours . " hours - " . $dbminute . " minute - " . $ampm ?>
            </li>
        </ul>
    </div>
    <!-- /class information -->   
    
    
</body>
</html>