<?php
include("../../vendor/autoload.php");
use Helper\HTTP;
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;

echo $id = $_GET["id"];
echo $direction = $_GET["d"];

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    if(trim($direction) == "arr"){
        HTTP::redirect("/admin/request_register/adminRequestRegister.php");
    }elseif(trim($direction) =="cr"){
        HTTP::redirect("/admin/request_register/confirmRegisters.php");

    }else{
        HTTP::redirect("/admin/request_register/rejectShow.php"); 
    }
}

$database = new StuRegisterForm(new MySQL());
$result = $database->deleteRegister($id);

if(trim($direction) == "arr"){
    HTTP::redirect("/admin/request_register/adminRequestRegister.php");
}elseif(trim($direction) =="cr"){
    HTTP::redirect("/admin/request_register/confirmRegisters.php");

}else{
    HTTP::redirect("/admin/request_register/rejectShow.php");
}