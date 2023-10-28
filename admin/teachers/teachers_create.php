<?php
// ----------- course table data -----------
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersAnotherTable;
$database = new UsersAnotherTable(new MySQL);
$dataCourse = $database->takeCourse();

// ----------- course table data -----------
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
    </style>
</head>
<body>
    <?php session_start() ?>
    
<!-- navbar section -->
<?php  require_once("teacherNavbar.php") ?>
<!-- navbar section -->

    <div class="container" style="width:80%">
    <!-- session section -->
    <?php if(isset($_SESSION["teacher_success"])) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION["teacher_success"] ?>
        <?php unset($_SESSION["teacher_success"]) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>

    <?php if(isset($_SESSION["teacher_fail"])) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $_SESSION["teacher_fail"] ?>
        <?php unset($_SESSION["teacher_fail"]) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>    
    <!-- session section -->         

        <!-- teacher insert form -->
        <div class="card mt-3">
        <div class="card-header bg-primary text-light h5"> Add Teachers Form</div>
        <div class="card-body">
            <form action="../../_action/teachers_data/teachers_create_data.php" method="post"  enctype="multipart/form-data">
                <div class="my-3">
                    <label for="teacher_image">Teacher Image</label>
                    <input type="file" class="form-control" id="teacher_image" name="teacher_image" required>
                </div>
    
                <div class="my-3">
                    <label for="teacher">Teacher</label>
                    <input type="text" class="form-control" placeholder="Teacher" id="teacher" required name="teacher_name">
                </div>
    
                <div class="my-2">
                 <label for="class_category">Category</label>
                    <select name="class_category_id" class="form-control" id="class_category" required>
                        <?php foreach($dataCourse as $item) : ?>
                            <option value="<?= $item->id ?>"><?= $item->course?></option>
                            <?php endforeach ?>
                    </select>
                </div>
    
                <div class="my-3">
                    <label for="description">Description</label>
                    <textarea  id="description"  rows="4" name="teacher_description" class="form-control"></textarea> 
                </div>
    
                <div class="my-3">
                    <input type="radio" style="opacity:0;"></input>
                    <div class="float-end">
                        <button type="reset" class="btn btn-danger ms-2">Reset</button>
                    </div>
                        <div class="float-end">
                            <button type="submit" class="btn btn-success ms-2">Create</button>
                        </div>
                </div>
            </form>

        </div>
        </div>
        <!-- /teacher insert form -->
    </div>
</body>
</html>