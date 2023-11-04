<?php
include("../vendor/autoload.php");
use Helper\HTTP;
use Helper\Auth;


session_start();

$id = $_GET["id"];
$ds = $_GET["ds"];

if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    $random = Auth::randomNumber();
    HTTP::redirect("/index.php");
}

if(!isset($_SESSION["button__press"])){
    HTTP::redirect("/index.php");
}

$random = Auth::randomNumber();

$register_member_data = $_SESSION["register_member_data"];
$class_id = $register_member_data["batch_id"];
// $_SESSION["register_form_data_show"] = true;




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
    <script src="../bs/js/bootstrap.bundle.min.js" defer> </script>    

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .style-world{
            margin:17px 0px;
            opacity: 0.7;
            color: red;
            cursor: default;
        }
        .style-world:hover{
            color:black;
            text-decoration: underline;
        }
        .form-width{
            width:450px;
        }
        .photo-style{
            width:250px;
            height:350px;
        }
        td a{
            width:45%;
        }
        @media(max-width:500px){
            .photo-style{
            width:150px;
            height:250px;
        } 
        }
        @media(max-width:450px){
            .form-width{
            width:370px;
        } 
        }
    </style>
</head>
<body>
      <!-- navbar section -->
      <div class="navbar navbar-dark navbar-expand bg-primary">
        <div class="container">
            <a href="../index.php" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>
        </div>
    </div>
    <!-- navbar section -->
    
    <!-- main part section -->
    <div class="container">

    <div class="style-world text-center">
        <span>* ကျေးဇူပြုရျ် ဖြည့်ထားသော အချက်အလက် မှန်ကန်မှု ရှိ/မရှိ ကိုပြန်လည်စစ်ဆေးပေးပါ။</span>
    </div>

    <table class="table table-striped table-bordered table-hover table-success">
        <tr>
            <th>Name</th>
            <td><?=$register_member_data["stu_name"] ?? "" ?></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><?=$register_member_data["stu_phone_number"] ?? "" ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$register_member_data["stu_email"] ?? "" ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?=$register_member_data["stu_address"] ?? ""?></td>
        </tr>
        <tr>
            <th>Payment System</th>
            <td><?=$register_member_data["stu_pay_system"] ?? "" ?></td>
        </tr>
        <tr>
            <th>Payment ScreenShot</th>
            <td><img class="photo-style" src="../user_pay_photo/<?= $register_member_data["stu_pay_photo"] ?>" alt=""></td>
        </tr>
        <tr>
            <th>Action</th>
            <td>
                <a href="register_form.php?id=<?= $register_member_data["batch_id"]?>&&rd=<?=$random ?>&&ds=<?=$ds?>" class="btn btn-danger">Back</a>
                <a href="../_action/class_join_data/register_form_data.php?id=<?= $register_member_data["batch_id"]?>&&rd=<?=$random ?>" class="btn btn-success">Confirm</a>
            </td>
        </tr>
    </table>

    </div>
    <!-- main part section -->
    

</body>
</html>