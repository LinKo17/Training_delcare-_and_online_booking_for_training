<?php 
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;
use Helper\Auth;
use Helper\HTTP;

//current time
$currentTime = date("Y-m-d H:i:s");

$database = new StuRegisterForm(new MySQL());
$result = $database->confirm($_GET["id"],$currentTime,"done");
$database->changeShow($_GET["id"],3);

session_start();
$random = Auth::randomNumber();
$path_id = $_GET['id'];

if($result){
    HTTP::redirect("/admin/request_register/adminConfirmDetail.php","id=$path_id&&rd=$random");
}else{
    HTTP::redirect("/admin/request_register/adminConfirmDetail.php","id=$path_id&&rd=$random");

}