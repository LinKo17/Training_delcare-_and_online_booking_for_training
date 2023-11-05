<?php 
include("../../_action/contact_data/contact_data.php");
use Helper\Auth;
session_start();
$random = Auth::randomNumber();

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
<?php  require_once("contentNavbar.php") ?>
<!-- navbar section -->

<!-- user contact information section -->
<div class="container" style="width:100%;"> 
    <div class="row">
        <?php foreach($data as $item) : ?>
        <div class="col-lg-4  p-2 col-md-6">

            <div class="border card p-1">

                <div class="card-header bg-info">
                    <h1 class="h5 d-inline-block "><?=$item->email ?></h1>

                    <?php if($item->done == 0): ?>
                        <span class="badge bg-danger float-end">!</span>
                        <?php endif ?>
                </div>

                <div class="card-body">
                    <h1 class="h5  my-2"><?= substr($item->content,0,200); ?></h1>
                </div>

                <div class="card-footer">
                    <a style="width:35%" href="../../_action/contact_data/contact_delete.php?id=<?= $item->id?>&&rd=<?= $random ?>" class="btn btn-danger" onclick="return confirm('Are you Sure?')">Delete</a>
                    <a style="width:63%" href="users_msg_detail.php?id=<?= $item->id?>&&rd=<?= $random ?>" class="btn btn-secondary">Read More</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>


    </div>
</div>
<!-- user contact information section -->
</body>
</html>
