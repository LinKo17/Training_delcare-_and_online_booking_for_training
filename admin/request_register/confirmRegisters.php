<?php
// ----------- teachers table data -----------
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;
use Helper\Auth;

$database = new StuRegisterForm(new MySQL());
$req_data = $database->allData();

session_start();
$random =Auth::randomNumber();
// print_r($req_data);

//checking user role in here
Auth::checkUserRole();

$number = 0;
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
            .create-style-div{
                background-color: #14213d;
                display: flex;
                justify-content: space-between;
                padding:10px;
                border-radius: 10px;
                margin:7px 0px;
            }
            .create-email{
                font-size:20px;
                color:white;
                margin-left: 10px;
            }
            .container-style{
                width:100%;
            }
            .container-fluid{
                font-family: monospace;
            }
    </style>
</head>
<body>


<!-- navbar section -->
<?php require_once("requestNavbar.php"); ?>
<!-- navbar section -->

<!-- notice section -->
<div class="container-fluid bg-warning text-center text-dark p-2 fs-5">
        <span>confirm Register</span>
        <span class="badge bg-danger"><?= isset($_SESSION["con_num"]) ? $_SESSION["con_num"] : "0" ?></span>
</div>
<!-- notice section -->

    <!-- create classes post form -->
    <div class="container mt-3 container-style" >
    
    <?php foreach($req_data as $item): ?>

        <?php if($item->reject != 1):?>

            <?php if(trim($item->registered_done) !="done"): ?>

                <?php if(trim($item->ad_veri_code) != "not yet"):?>
                    <div class="create-style-div">
                        <div class="create-main">

                        <?php if($item->show == 1) : ?>

                            <span class="create-alert">
                                <span class="badge bg-secondary">!</span>
                            </span>
                            <?php $number++ ?>
                            <?php elseif($item->show == 2): ?>

                            <span class="create-alert">
                                <span class="badge bg-warning">!</span>
                            </span>
                            <?php $number++ ?>
                            <?php else : ?>

                            <span class="create-alert">
                                <span class="badge bg-success">!</span>
                            </span>
                            <?php $number++ ?>
                        <?php endif ?>
                            

                        <span class="create-email">
                                <span><?= $item->id. "." ?></span>
                            </span>
                            
                            <span class="create-email">
                                <span class="d-none d-sm-inline"><?="(" .$item->created_at .")" ?></span>
                                <span class="d-inline d-sm-none"><?="(".substr($item->created_at , 11) . ")"?></span>
                            </span>
                        </div>


                        <div class="create-button">
                            <a href="../../_action/class_join_data/register_delete.php?id=<?= $item->id?>&&rd=<?= $random?>&&d=cr" class="btn btn-danger" onclick="return confirm('Are you Sure?')">Delete</a>
                            
                            <a href="adminConfirmDetail.php?id=<?= $item->id?>&&rd=<?= $random?>" class="btn btn-secondary">Detail</a>
                        </div>
                    </div>
                <?php endif ?>

            <?php endif ?>
            
        <?php endif ?>    

    <?php endforeach ?>



    </div>
        <!-- /create classes post form -->

        <?php  $_SESSION["con_num"] = $number ?>

</body>
</html>