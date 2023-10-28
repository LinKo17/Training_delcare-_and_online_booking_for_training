<?php 
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Libs\Database\UsersAnotherTable;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("admin/contact/users_msg.php");
}
use Libs\Database\UsersContentTable;
$database = new UsersContentTable(new MySQL());
$data = $database->singleTakeData($_GET["id"]);
$database->afterCheckMsg($_GET["id"],1);
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

            <div class="border card p-1">

                <div class="card-header bg-info">
                    <h1 class="h5"><?=$data->email ?></h1>
                </div>

                <div class="card-body">
                    <h1 class="h5  my-2"><?= $data->content; ?></h1>
                </div>
                <!-- <a href="https://mail.google.com">click</a> -->
            </div>
</div>
<!-- user contact information section -->


</body>
</html>
