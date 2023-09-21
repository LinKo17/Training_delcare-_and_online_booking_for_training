<?php
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Helper\Auth;

$database = new UsersTable(new MySQL);
$data = $database->indexPostDataShow();
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
    <script src="js/bootstrap.bundle.min.js" defer> </script>

    <!-- original css link -->
    <link rel="stylesheet" href="style.css">
</head>
<body style="font-family: Arial, sans-serif;background-color: #f0f0f0;margin: 0;padding: 0;">
    <!-- navbar section -->
    <div class="navbar navbar-dark navbar-expand bg-primary">
        <div class="container">
            <a href="" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>
            <div class="navbar-nav">
                <a href="" class="nav-link active">action</a>
                <a href="" class="nav-link active">action</a>
                <a href="" class="nav-link active">action</a>
                <a href="admin/adminpanel.php" class="nav-link active btn btn-danger">Admin</a>
            </div>
        </div>
    </div>
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
                    <h1 class="h5 text-center my-1"><?= $item->category_id ?></h1>
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