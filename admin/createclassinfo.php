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
<?php require_once("adminNavbar.php"); ?>
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