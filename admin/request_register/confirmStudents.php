<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;
use Helper\Auth;

$database = new StuRegisterForm(new MySQL());
$class_data = $database->joinClassPostsAndCoursesAll();

$stu_data = $database->allData();
// print_r($stu_data);
$wait_btn = $database->takeWaitBtn(1);
// print_r($wait_btn);


session_start();
$random = Auth::randomNumber();
// echo $random;

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
        body{
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container-fluid{
            font-family: monospace;
        }
        @media(max-width:480px){
            .style-date{
                display: none;
            }
        }

    </style>
</head>
<body>


<!-- navbar section -->
<?php require_once("requestNavbar.php"); ?>
<!-- navbar section -->

<!-- notice section -->
<div class="container-fluid bg-warning text-center text-dark p-2 fs-5">
        <span>Confirm Students</span>

        <?php if($wait_btn->wait_not_wait == 0): ?>
        <a href="../../_action/class_join_data/all_wait.php?rd=<?=$random?>&&d=cs" class="btn btn-danger">Wait Classes</a>
        <?php else : ?>
        <a href="../../_action/class_join_data/all_not_wait.php?rd=<?=$random?>&&d=cs" class="btn btn-dark">Stop Wait Class</a>
        <?php endif?>

</div>
<!-- notice section -->

 <!-- main part of this file -->
 <?php foreach($class_data as $item) :?>
    <?php if(trim($item->open_close) == "open"): ?>
        <div class="container my-5">
            <div class="card">

                <div class="card-header bg-primary">
                    <span class="fs-5 text-light">
                        <?= $item->c_course?>
                    </span>
                    <button class="btn btn-dark float-end">
                        <span class="d-none d-sm-inline"><?= $item->class_date ?></span>
                        (<?=$item->class_time ?>)
                    </button>
                </div>
            
                
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th class="style-date">Date</th>
                            <th>Action</th>
                        </tr>
                        
                        <?php   $serialNumber = 1;  ?>
                        <?php foreach($stu_data as $stu_item): ?>
                
                            <?php if($item->id == $stu_item->batch_id): ?>
                
                                <?php if(trim($stu_item->registered_done) == "done") : ?>

                                <tr>
                                    <td>
                                        <?php 
                                        echo $serialNumber;
                                        ?>
                                    </td>
                                    <td><?= $stu_item->stu_name ?></td>
                                    <td class="style-date"><?= $stu_item->registered_date_time ?></td>
                                    <td>
                                        
                                        <a href="registerPersonDetail.php?id=<?=$stu_item->id?>&&rd=<?=$random ?>" class="btn btn-secondary btn-sm">Detail</a>

                                        <a href="../../_action/class_join_data/register_after_confirm_delete.php?id=<?= $stu_item->id?>&&rd=<?= $random?>&&d=cs" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure?')">Delete</a>

                                    </td>
                                </tr>
                                    <?php $serialNumber++ ?>
                                <?php endif ?>
                
                            <?php endif ?>
                
                        <?php endforeach ?>


                            </table>
                </div>

            
                
                <div class="card-footer">
                    <div class="float-end">

                        <!-- class delete -->
                        <a href="../../_action/class_join_data/register_delete_class.php?rd=<?=$random?>&&id=<?=$item->id?>&&d=cs" class="btn btn-danger" onclick="return confirm('Are you Sure?')">Delete</a>

                        <!-- class close -->
                        <a href="../../_action/class_join_data/register_close.php?cl_id=<?= $item->id ?>&&rd=<?= $random ?>" class="btn btn-secondary" >Close</a>
                        
                        <!-- class wait -->
                        <?php if(trim($item->wait) == "wait"): ?>

                                <a href="../../_action/class_join_data/non_wait.php?id=<?= $item->id?>&&rd=<?= $random ?>&&d=cs" class="btn btn-success">Stop Wait</a>
                            
                            <?php elseif(trim($item->wait) == "not wait"): ?>
                                
                                <a href="../../_action/class_join_data/wait.php?id=<?= $item->id?>&&rd=<?= $random ?>&&d=cs" class="btn btn-secondary">Wait</a>

                        <?php endif ?>
                            


                        
                    </div>
                </div>
            
            </div>
        </div>
<?php endif ?>
<?php endforeach ?>

 <!-- main part of this file -->


</body>
</html>