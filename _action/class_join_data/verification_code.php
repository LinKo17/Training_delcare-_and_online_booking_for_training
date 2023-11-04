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


$database = new StuRegisterForm(new MySQL());;

//random verification section 
$stu_id = $database->takeAllData($_GET["id"]);
$times = rand(10,14);
$verfi = password_hash($stu_id->stu_name,PASSWORD_DEFAULT);
$verfication = substr($verfi, $times, $times);

//stored admin verification code in thissection
$database->adminVerification($_GET["id"],$verfication );
$database->rejectRefuse($_GET["id"],2);



$random = Auth::randomNumber();
$path_id = $_GET['id'];
HTTP::redirect("/admin/request_register/adminRequestDetail.php","id=$path_id&&rd=$random");



