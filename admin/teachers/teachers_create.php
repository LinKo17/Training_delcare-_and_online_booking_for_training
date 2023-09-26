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
                        <a href="" class="dropdown-item">Insert teacher</a>
                        <a href="teachers_info.php" class="dropdown-item">Teacher info</a>
                    </div>
                </li>

        <!-- ------------------------------------- -->


        <!-- ------------------------------------- -->
        <li class="nav-item">
                    <a class="nav-link  text-light btn btn-secondary m-2" href="#">Time Table</a>
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

    <div class="container">
        <h1 class="text-center h4">Teacher Insertion</h1>

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
        <form action="../../_action/teachers_data/teachers_create_data.php" method="post" class="border p-3 rounded" enctype="multipart/form-data">
            <div class="my-3">
                <label for="teacher_image">Teacher Image</label>
                <input type="file" class="form-control" id="teacher_image" name="teacher_image" required>
            </div>

            <div class="my-3">
                <label for="teacher">Teacher</label>
                <input type="text" class="form-control" placeholder="Teacher" id="teacher" required name="teacher_name">
            </div>

            <div class="my-3">
             <label for="class_category">Category</label>
                <select name="category_id" class="form-control" id="class_category" required>
                    <option value="1">Computer Basic</option>
                    <option value="2">Java Course</option>
                    <option value="3">UI/UX Design</option>
                    <option value="4">programming Basic</option>
                    <option value="5">Networking</option>
                    <option value="6">Flutter Course</option>
                    <option value="7">React Course</option>
                    <option value="8">Professional Web Development</option>
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
        <!-- /teacher insert form -->
    </div>
</body>
</html>