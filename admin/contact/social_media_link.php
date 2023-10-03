<?php
include("../../_action/contact_data/media_data.php");
// print_r($data);

use Helper\Auth;
session_start();
$random = Auth::randomNumber();

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
                        <a href="../teachers/teachers_create.php" class="dropdown-item">Insert teacher</a>
                        <a href="../teachers/teachers_info.php" class="dropdown-item">Teacher info</a>
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
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light btn btn-success m-2" href="#" data-bs-toggle="dropdown">Contact</a>
                    <div class="dropdown-menu">
                      <a href="" class="dropdown-item">Social Media</a>
                      <a href="users_msg.php" class="dropdown-item">Users Message</a>
                    </div>
                </li>         
        <!-- ------------------------------------- -->

      </ul>
    </div>
  </div>
</nav>
<!-- navbar section -->

<!-- social form -->
<div class="container mt-2" style="width:80%">
<div class="card">
  <div class="card-header bg-primary text-light h5">Social Media Controller </div>
  <div class="card-body">

<!-- ------------------   facebook      -->
<form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=fb" method="post" class="my-3">

    <label>Facebook</label>

    <div class="input-group">
      <input type="text" class="form-control mt-1" value="<?= $data->facebook?>" name="facebook">
        <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
    </div>

  </form>

<!-- ------------------  facebook       -->


<!-- ------------------  viber       -->
<form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=vb" method="post" class="my-3">

    <label>Viber</label>

    <div class="input-group">
      <input type="text" class="form-control mt-1" value="<?= $data->viber?>" name="viber">
        <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
    </div>

  </form>
<!-- ------------------  viber       -->

<!-- ------------------  telegram       -->
<form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=tg" method="post" class="my-3">

    <label>Telegram</label>

    <div class="input-group">
      <input type="text" class="form-control mt-1" value="<?= $data->telegram?>" name="telegram">
        <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
    </div>

  </form>
<!-- ------------------  telegram       -->


<!-- ------------------  phone 1       -->
<form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=ph1" method="post" class="my-3">

    <label>Phone_1</label>

    <div class="input-group">
      <input type="text" class="form-control mt-1" value="<?= $data->phone_1?>" name="phone_1">
        <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
    </div>

  </form>
<!-- ------------------  phone 1       -->

<!-- ------------------  phone 2       -->
<form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=ph2" method="post" class="my-3">

    <label>Phone_2</label>

    <div class="input-group">
      <input type="text" class="form-control mt-1" value="<?= $data->phone_2?>" name="phone_2">
        <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
    </div>

  </form>
<!-- ------------------  phone 2       -->

<!-- ------------------  phone 3       -->
<form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=ph3" method="post" class="my-3">

    <label>Phone_3</label>

    <div class="input-group">
      <input type="text" class="form-control mt-1" value="<?= $data->phone_3?>" name="phone_3">
        <button class="btn btn-danger">Edit</button>
    </div>

  </form>
<!-- ------------------  phone 3       -->


<!-- ------------------  mail       -->
<form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=mail" method="post" class="my-3">

    <label>Mail</label>

    <div class="input-group">
      <input type="text" class="form-control mt-1"  name="mail" value="<?= $data->mail ?>">
        <button class="btn btn-danger">Edit</button>
    </div>

  </form>
<!-- ------------------  mail       -->




    

  </div>
</div>
</div>
<!-- social form -->
</body>
</html>