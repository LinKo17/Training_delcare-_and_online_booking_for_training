<?php session_start() ?>
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
    <!-- session section -->
    <?php if(isset($_SESSION["course_success"])) : ?>
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <?= $_SESSION["course_success"] ?>
        <?php unset($_SESSION["course_success"]) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>

    <?php if(isset($_SESSION["course_fail"])) : ?>
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
        <?= $_SESSION["course_fail"] ?>
        <?php unset($_SESSION["course_fail"]) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>    
    <!-- session section --> 

      <!-- course create form -->
    <div class="card mt-3">
    <div class="card-header bg-primary text-light h5"> Create Course Form</div>
        <div class="card-body">
          <form action="../../_action/courses_data/create_courses_data.php" method="post">
            <div class="my-2">
              <label for="course" class="mb-1">Course</label>
              <input type="text" class="form-control" placeholder="Course" name="course" id="course" required>
            </div>
            <div class="my-2">
              <label for="fee" class="mb-1">Fee</label>
              <input type="text" class="form-control"  name="fee" id="fee" placeholder="Fee" required>
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