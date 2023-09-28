<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Libs\Database\UsersAnotherTable;

$database = new UsersAnotherTable(new MySQL);
$data = $database->takeCourse();
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
    <script src="../js/bootstrap.bundle.min.js" defer> </script> 

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        img{
            width:100%;
            height:500px;
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
        #container-width{
          width:80%;
        }
        @media(max-width:900px){
          #container-width{
            width:100%;
          }
        }

        @media(max-width:500px){
         #btn-style{
          margin-top:2px;
          width:100%;
         }
        }

        @media(max-width:600px){
            select{
                padding:7px;
                font-size:14px;
                display:block;
                width:100%;
            }
            img{
                height:300px;
            }
        }

    </style>    
</head>
<body>
      <!-- navbar section -->
      <div class="navbar navbar-dark navbar-expand bg-primary">
        <div class="container">
            <a href="" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>
            <div class="navbar-nav">
                <a href="../index.php" class="btn btn-dark nav-link active">Back</a>
            </div>
        </div>
    </div>
    <!-- navbar section -->

<!-- showing   courses information -->
<div class="container" id="container-width">
<div class="card mt-3">
    <div class="card-header bg-primary text-light h5 text-center">Courses</div>
        <div class="card-body">
          <table class="table table-striped table-bordered table-hover ">
            <tr>
              <th>Courses</th>
              <th>Fee</th>
            </tr>
            <?php foreach($data as $item) : ?>
                <?php if($item->hide == 0) : ?>
            <tr>
              <th><?= $item->course ?></th>
              <th><?= $item->fee ?></th>
            </tr>
            <?php endif ?>
            <?php endforeach ?>
          </table>
        </div>
    </div>    
</div>
<!-- /showing courses information -->  
    
    
</body>
</html>