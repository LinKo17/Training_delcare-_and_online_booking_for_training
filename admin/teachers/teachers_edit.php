<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Helper\Auth;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/teachers/teachers_info.php");
};

$database = new UsersTable(new MySQL());
$id = $_GET["id"];
$database = new UsersTable(new MySQL);
$data = $database->showTeacherSingleData($id);

?>
<?php
// ----------- course table data -----------
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
        }
    </style>
</head>
<body>
<!-- navbar section -->
<?php  require_once("teacherNavbar.php") ?>
<!-- navbar section -->


<!-- teacher edit form -->
<div class="container" style="width:80%">
    <div class="card mt-3">
    <div class="card-header bg-primary text-light h5"> Edit Teachers Form</div>
    <div class="card-body">
        <form action="../../_action/teachers_data/teachers_post_update_data.php" method="post"  enctype="multipart/form-data">
            <div class="my-2">
                <input type="hidden" value="<?= $data->id ?>"  name="id" class="form-control">
            </div>
                    <div class="my-3">
                        <label for="teacher_image">Teacher Image</label>
                        <input type="file" class="form-control" id="teacher_image" name="teacher_image" required>
                    </div>
        
                    <div class="my-3">
                        <label for="teacher">Teacher</label>
                        <input type="text" class="form-control" placeholder="Teacher" id="teacher" required name="teacher_name" value="<?= $data->teacher_name ?>">
                    </div>
        
                    <div class="my-2">
                 <label for="class_category">Category</label>
                    <select name="class_category_id" class="form-control" id="class_category" required>
                        <?php foreach($dataCourse as $item) : ?>
                            <option <?php echo $data->category_id == $item->id ? "selected" : "" ?> value="<?= $item->id ?>"> <?= $item->course?></option>
                            <?php endforeach ?>
                    </select>
                </div>
        
                    <div class="my-3">
                        <label for="description">Description</label>
                        <textarea  id="description"  rows="4" name="teacher_description" class="form-control"><?= $data->description ?></textarea> 
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
</div>
<!-- teacher edit form -->


</body>
</html>