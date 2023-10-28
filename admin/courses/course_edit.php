<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\UsersAnotherTable;
use Helper\HTTP;
use Helper\Auth;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/courses/course_info.php");
};

$database = new UsersAnotherTable(new MySQL());
$data =$database->takeSingleCourse($_GET["id"]);
// print_r($data);

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
<!-- navbar section -->
<?php  require_once("courseNavbar.php") ?>
<!-- navbar section -->

<div class="container" style="width:80%"> 

      <!-- course create form -->
    <div class="card mt-3">
    <div class="card-header bg-primary text-light h5"> Create Course Form</div>
        <div class="card-body">
          <form action="../../_action/courses_data/course_edit_data.php" method="post">
            <div class="my-2">
                <input type="hidden" name="id" value="<?= $data->id ?>" class="form-control">
            </div>
            <div class="my-2">
              <label for="course" class="mb-1">Course</label>
              <input type="text" class="form-control" placeholder="Course" name="course" id="course" required value="<?= $data->course ?>">
            </div>
            <div class="my-2">
              <label for="fee" class="mb-1">Fee</label>
              <input type="text" class="form-control"  name="fee" id="fee" placeholder="Fee" required value="<?= $data->fee ?>">
            </div>
            <div class="my-2">
              <input type="radio" style="opacity:0">
              <div class="float-end">
                <button type="reset"class="btn btn-danger">Reset</button>
                <button type="submit"class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
<!-- course create form -->
</body>
</html>