<?php 
// print_r($_POST);
// print_r($_FILES);


// print_r($_POST);

include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;

$db = new UsersTable(new MySQL());


echo $image_type = htmlspecialchars($_FILES["teacher_image"]["type"]);


if($image_type == "image/jpg" || $image_type == "image/jpeg"){
    $image_name = time(). htmlspecialchars($_FILES["teacher_image"]["name"]);
    $image_tmp_name = htmlspecialchars($_FILES["teacher_image"]["tmp_name"]);
}

// data section
echo $id =htmlspecialchars($_POST["id"]);
echo $teacher_name = $_POST["teacher_name"];
echo $category_id = $_POST["category_id"];                              
echo $description = htmlspecialchars($_POST["teacher_description"]);


$database = new UsersTable(new MySQL);
$data = [
    "id" => $id,
    "teacher_img"=> $image_name,
    "teacher_name" => $teacher_name,
    "category_id"=>$category_id,
    "description" => $description
];
$result = $database->updateTeacherData($data);

    if($result){
         move_uploaded_file("$image_tmp_name","../../teacherPhotos/$image_name");

         session_start();
         $_SESSION["teacher_update"] = "Teacher is successfully edit";
         HTTP::redirect("/admin/teachers/teachers_info.php");
    }else{
        session_start();
        $_SESSION["teacher_update_fail"] = "Teacher edit is fail";
        HTTP::redirect("/admin/teachers/teachers_info.php");
    }