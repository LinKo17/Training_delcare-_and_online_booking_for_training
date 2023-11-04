<?php 
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;
use Helper\HTTP;
$direction = $_GET["d"];
session_start();
// if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
//     HTTP::redirect("/index.php");
// }


$database = new StuRegisterForm(new MySQL());
$result = $database->waitAndNotWaitAll("wait");
$database->waitAndNotWaitBtnChange(1,1);

if($result){
    if($direction == "cs"){
        HTTP::redirect("/admin/request_register/confirmStudents.php");
    }elseif($direction == "sl"){
        HTTP::redirect("/admin/request_register/studentLimit.php");
    }else{
        HTTP::redirect("/index.php");
    }
}
HTTP::redirect("/index.php");