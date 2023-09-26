<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
$database = new UsersTable(new MySQL);

$img_type = htmlspecialchars($_FILES["teacher_image"]["type"]);
if($img_type == "image/jpg" || $img_type == "image/jpeg"){
    $img_name = time() . htmlspecialchars($_FILES["teacher_image"]["name"]);
    $img_tmp  = htmlspecialchars($_FILES["teacher_image"]["tmp_name"]);
}

$teacher_name = htmlspecialchars($_POST["teacher_name"]);
$category_id = htmlspecialchars($_POST["category_id"]);
$teacher_description = htmlspecialchars($_POST["teacher_description"]);

$data =[
    "teacher_img" => $img_name,
    "teacher_name"=>$teacher_name,
    "category_id"=>$category_id,
    "description"=>$teacher_description
];

$result = $database->teacherPostInsert($data);
if($result){
    move_uploaded_file("$img_tmp","../../teacherPhotos/$img_name");

    session_start();
    $_SESSION["teacher_success"] = "Successfully insert a teacher";
    HTTP::redirect("/admin/teachers/teachers_create.php");
}else{
   session_start();
   $_SESSION["teacher_fail"] = "Fail to  insert a teacher";
   HTTP::redirect("/index.php");
}



