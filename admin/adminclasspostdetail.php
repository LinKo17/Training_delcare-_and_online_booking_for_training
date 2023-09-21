<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Helper\Auth;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/createclassinfo.php");
};


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


//---------------- /time management -------
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
    <ul class="nav justify-content-center bg-primary text-light">
        <li class="nav-item dropdown">
            <a class="nav-link  text-light btn btn-dark m-2 dropdown-toggle" data-bs-toggle="dropdown" href="">Home</a>
            <div class="dropdown-menu">
                <a href="" class="dropdown-item">Admin Panel</a>
                <a href="../index.php" class="dropdown-item">Home</a>
            </div>
        </li> 

        <li class="nav-item dropdown">
            <a class="nav-link text-light btn btn-warning m-2  dropdown-toggle" href="" data-bs-toggle="dropdown">Active Classes</a>
            <div class="dropdown-menu">
                <a href="createclasspost.php" class="dropdown-item">Create Classes</a>
                <a href="createclassinfo.php" class="dropdown-item">Classes Info</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link  text-light btn btn-info m-2" href="#">Teachers List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  text-light btn btn-secondary m-2" href="#">Time Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  text-light btn btn-success m-2" href="#">Payment</a>
        </li>


    </ul>
    <!-- /navbar section -->

    <!-- class information -->
    <div class="container mt-2">
        <ul class="list-group">
            <li class="list-group-item">
                <img src="../classPostPhotos/<?= $data->image ?>" alt="">
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
