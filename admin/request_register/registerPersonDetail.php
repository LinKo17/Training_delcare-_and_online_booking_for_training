<?php
include("../../vendor/autoload.php");
use Helper\HTTP;
use Libs\Database\StuRegisterForm;
use Libs\Database\MySQL;
use Helper\Auth;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/request_register/adminRequestRegister.php");
}

$database = new StuRegisterForm(new MySQL());
$database->takeAllData($_GET["id"]);

$rq_data = $database->takeAllData($_GET["id"]);

$fileOpen = $database->changeShow($_GET["id"],1);
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
        .confirm-btn-style{
            width:200px;
        }
        .btn-style{
            padding:10px;
            border-radius: 5px;
            display: inline-block;
        }
        .underline{
            border: 1px dotted black;
            width:100%;
            border-radius: 10px;
            padding:10px;
            display: inline-block;
        }
        .label-style{
            padding:10px;
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
        .container-style{
            margin-top:20px;
        }  
        .style-title{
            border-radius: 20px;
        }
        .page-style{
            width:100%;
            height: 650px;
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
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
    <a href="adminRequestRegister.php" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>
    </div>
</nav>
<!-- navbar section -->



<div class="style-title container text-center text-light bg-dark py-2 fs-3 mt-3">
    Admin view
</div>
<!-- main part section -->
<div class="container mt-3 ">

    <!-- about class information -->
    <table class="table table-striped table table-bordered table-hover table-primary">

        <tr>
            <th class="text-center bg-dark">Join class information</th>
            <th class="text-center"></th>
        </tr>
        <tr>
            <th>Batch (Class_id)</th>
            <td><?=$rq_data->batch_id ?? "" ?></td>
        </tr>
        <tr>
            <th>Course</th>
            <td><?=$rq_data->course ?? "" ?></td>
        </tr>
        <tr>
            <th>Date of Class Start</th>
            <td><?=$rq_data->class_open_date ?? "" ?></td>
        </tr>
        <tr>
            <th>Time of Class Start</th>
            <td><?=$rq_data->class_open_time ?? ""?></td>
        </tr>
        <tr>
            <th>Teacher</th>
            <td><?=$rq_data->teacher_name ?? "" ?></td>
        </tr>
        <tr>
            <th>Class Fee</th>
            <td><?=$rq_data->course_fee ?? "" ?></td>
        </tr>

    </table>

    <!-- register person information -->
    <table class="table table-striped table-bordered table-hover table-primary">

        <tr>
            <th class="text-center bg-dark">
                <span class="d-none d-md-inline">Register</span> person <span class="d-none d-sm-inline">information</span><span class="d-inline d-sm-none">info</span>
            </th>
            <th class="text-center"></th>
        </tr>
        <tr>
            <th>Name</th>
            <td><?=$rq_data->stu_name ?? "" ?></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><?=$rq_data->stu_phone_number ?? "" ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$rq_data->stu_email ?? "" ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?=$rq_data->stu_address ?? ""?></td>
        </tr>
        <tr>
            <th>Payment System</th>
            <td><?=$rq_data->stu_pay_system ?? "" ?></td>
        </tr>
        <tr>
            <th>Payment <span class="d-none d-md-inline">Screenshot</span><span class="d-md-none d-inline">(ss)</span></th>
            <td><img class="photo-style" src="../../user_pay_photo/<?= $rq_data->stu_pay_photo ?>" alt=""></td>
        </tr>

    </table>

    <!-- confirm section -->
    <table class="table table-striped table-bordered table-hover table-primary">

        <tr>
            <th class="text-center bg-dark">Register Confirm Section</th>
            <th class="text-center"></th>
        </tr>
        <tr>
            <th>Admin verification code</th>
            <td>
                <?php if($rq_data->ad_veri_code != "not yet"): ?>
                <span class="btn-style bg-warning"><?=$rq_data->ad_veri_code ?? "" ?></span>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <th>Register verification code</th>
            <td>
                <?php if($rq_data->re_veri_code != "not yet"): ?>
                    <span class="btn-style bg-warning"><?=$rq_data->re_veri_code ?? "" ?></span>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <th>Register Date</th>
            <td>
                <?php if($rq_data->ad_veri_code != "not yet"): ?>
                    <?php if($rq_data->re_veri_code != "not yet"): ?>
                        <?php if(trim($rq_data->ad_veri_code)  ==  trim($rq_data->re_veri_code) ): ?>
                            <button class="btn btn-success"><?=$rq_data->registered_date_time ?? "" ?></button>
                        <?php endif ?>
                    <?php endif ?>   
                <?php endif ?>
            </td>
        </tr>
        <tr>
        </tr>
    </table>

    <!-- confirm section -->


</div>
<!-- main part section -->

<div class="style-title container text-center text-light bg-dark py-2 fs-3 mt-4">
    User View
</div>
<!-- user view -->
<div class="page-style">
    <div class="container container-style">
                <div class="card">
    
                    <div class="card-header bg-primary">
                    <span class="fs-5"><span class="text-warning fs-3">My</span><span class="text-light">Technology</span></span>
                    <button class="btn btn-dark float-end">
                        <?= $rq_data->registered_date_time ?>
                    </button>
                    </div>
    
                    <div class="card-body">
    
                        <div class="row my-2">
                            <div class="col-md-2 col-12 fs-5 label-style">Name</div>
                            <div class="col-md-10 col-12">
                                <span class="underline">
                                    <?= $rq_data->stu_name ?>
                                </span>
                            </div>
                        </div>
    
                        <div class="row my-2">
                            <div class="col-md-2 col-12 fs-5 label-style">Date/Time</div>
                            <div class="col-md-10 col-12">
                                <span class="underline">
                                <?= $rq_data->class_open_date ?>
                                </span>
                            </div>
                        </div>
    
                        <div class="row my-2">
                            <div class="col-md-2 col-12 fs-5 label-style">Class</div>
                            <div class="col-md-10 col-12">
                                <span class="underline">
                                <?= $rq_data->course ?>
                                (<?= $rq_data->teacher_name ?>)
                                </span>
                            </div>
                        </div>
    
                        <div class="row my-2">
                            <div class="col-md-2 col-12 fs-5 label-style">Email</div>
                            <div class="col-md-10 col-12">
                                <span class="underline">
                                <?= $rq_data->stu_email ?>
                                </span>
                            </div>
                        </div>
    
                        <div class="row my-2">
                            <div class="col-md-2 col-12 fs-5 label-style">Phone</div>
                            <div class="col-md-10 col-12">
                                <span class="underline">
                                <?= $rq_data->stu_phone_number ?>
                                </span>
                            </div>
                        </div>
    
                        <div class="row my-2">
                            <div class="col-md-2 col-12 fs-5 label-style">Fee</div>
                            <div class="col-md-10 col-12">
                                <span class="underline">
                                <?= $rq_data->course_fee ?>
                                </span>
                            </div>
                        </div>
    
                    </div>
                    <div class="card-footer">
    
                    <div class="row">
                            <div class="col-6">
                                <div class="my-1 fs-5">Admin name</div>
                            </div>
                            <div class="col-6">
                                <a href="" class="btn btn-primary float-end">Get</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<!-- user view -->
</body>
</html>