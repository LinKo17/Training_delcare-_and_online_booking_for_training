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
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary navbar-dark">
  <div class="container">
  <span class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></span>

    <!-- responsive button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- responsive button -->


    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <!-- ------------------------------------- -->
        <li class="list-item dropdown">
                    <a class="nav-link  text-light btn btn-dark m-2 dropdown-toggle" data-bs-toggle="dropdown" href="">Home</a>
                    <div class="dropdown-menu">
                        <a href="../adminpanel.php" class="dropdown-item">Admin Panel</a>
                        <a href="../../index.php" class="dropdown-item">Home</a>
                    </div>
                </li> 
        <!-- ------------------------------------- -->

        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link text-light btn btn-warning m-2  dropdown-toggle" href="" data-bs-toggle="dropdown">Active Classes</a>
                    <div class="dropdown-menu">
                        <a href="../createclasspost.php" class="dropdown-item">Create Classes</a>
                        <a href="../createclassinfo.php" class="dropdown-item">Classes Info</a>
                    </div>
                </li>        
        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link  text-light btn btn-info m-2 dropdown-toggle" data-bs-toggle="dropdown" href="">Teachers List</a>
                    <div class="dropdown-menu">
                        <a href="teachers_create.php" class="dropdown-item">Insert teacher</a>
                        <a href="teachers_info.php" class="dropdown-item">Teacher info</a>
                    </div>
                </li>

        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light btn btn-secondary m-2" href="#" data-bs-toggle="dropdown">Courses</a>
                    <div class="dropdown-menu">
                      <a href="../courses/create_course.php" class="dropdown-item">Create Courses</a>
                      <a href="../courses/course_info.php" class="dropdown-item">Courses Info</a>
                    </div>
                </li>        
        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item">
                    <a class="nav-link  text-light btn btn-success m-2" href="#">Payment</a>
                </li>        
        <!-- ------------------------------------- -->

      </ul>
    </div>
  </div>
</nav>
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