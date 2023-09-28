<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\UsersAnotherTable;
use Helper\HTTP;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/courses/course_info.php");
};

$id = $_GET["id"];
echo $id;

$database = new UsersAnotherTable(new MySQL);
$result = $database->hidecourse($id,1);

if($result){
    HTTP::redirect("/admin/courses/course_info.php");
}else{
    HTTP::redirect("/admin/courses/course_info.php");
}