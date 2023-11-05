<?php
include("../../_action/teachers_data/teachers_create_data_info.php");
// echo $random;
use Helper\Auth;

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

    <!-- original css link -->
    <link rel="stylesheet" href="style.css">

    <style>
        body{
            background:#f0f0f0;
        }
    </style>
</head>
<body>
<!-- navbar section -->
<?php  require_once("teacherNavbar.php") ?>
<!-- navbar section -->
   
    <!-- session section -->
    <div class="container">
        <?php if(isset($_SESSION["hide_success"])) : ?>
            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                <?= $_SESSION["hide_success"] ?>
                <?php unset($_SESSION["hide_success"]) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
    
        <?php if(isset($_SESSION["hide_fail"])) : ?>
            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                <?= $_SESSION["hide_fail"] ?>
                <?php unset($_SESSION["hide_fail"]) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>    
    </div>
    <!-- session section -->   
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




<!-- showing   teacher information -->

<div class="container" style="width:100%;"> 
    <div class="row">
        <?php foreach($data as $item) : ?>
        <div class="col-lg-4  p-2 col-md-6">
            <div class="border card p-1">
                <div class="">
                    <img src="../../teacherPhotos/<?= $item->teacher_img?>" alt="" style="width:100%; height:300px;">
                </div>
                <h1 class="h5 text-center my-2"><?= $item->teacher_name ?></h1>
                <div class="card-footer">
                    <a style="width:32%" href="teachers_edit.php?id=<?= $item->id?>&&rd=<?=$random?>" class="btn btn-primary">Edit</a>


                    <a style="width:32%" href="../../_action/teachers_data/teachers_delete_data.php?id=<?= $item->id?>&&rd=<?=$random?>" class="btn btn-danger" onclick="return confirm('Are you Sure?')">Delete</a>


                    <a style="width:32%" href="teachers_detail.php?id=<?= $item->id?>&&rd=<?=$random?>" class="btn btn-secondary">Details</a>

                    <?php if($item->hide == 0) :?>
                        <!-- to change one -->
                    <div class="mt-1">
                        <a href="../../_action/teachers_data/teachers_hide_data.php?id=<?= $item->id?>&&rd=<?=$random?>" class="btn btn-warning text-light" style="width:100%">Hide</a>
                    </div>
                    <?php else :?>
                        <!-- to change zero -->
                        <div class="mt-1">
                        <a href="../../_action/teachers_data/teachers_show_data.php?id=<?= $item->id?>&&rd=<?=$random?>" class="btn btn-info text-light" style="width:100%">Show</a>
                    </div>
                    <?php endif ?>

                </div>
            </div>
        </div>
        <?php endforeach ?>


    </div>
</div>
<!-- /showing teacher information -->
</body>        
</html>