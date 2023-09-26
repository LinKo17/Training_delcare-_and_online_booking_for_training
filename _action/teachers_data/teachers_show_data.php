<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/teachers/teachers_info.php");
};

$id = $_GET["id"];
echo $id;

$database = new UsersTable(new MySQL);
$result = $database->hideTeacher($id,0);

if($result){
    HTTP::redirect("/admin/teachers/teachers_info.php");
}else{
    HTTP::redirect("/admin/teachers/teachers_info.php");
}