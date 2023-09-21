<?php 
// print_r($_POST);

include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;

$db = new UsersTable(new MySQL());


$image_type = htmlspecialchars($_FILES["image"]["type"]);

if($image_type == "image/jpg" || $image_type == "image/jpeg"){
    $image_name = time(). htmlspecialchars($_FILES["image"]["name"]);
    $image_tmp_name = htmlspecialchars($_FILES["image"]["tmp_name"]);
}

// data section
$category_id = $_POST["class_category_id"];
$description = htmlspecialchars($_POST["description"]);
$teacher_id = $_POST["teacher_id"];
$classDate = $_POST["date"] . "/" . $_POST["month"] . "/" . $_POST["year"];
$classTime = $_POST["minute"] . "/" . $_POST["hour"] . "/" . $_POST["d_n"];

if(isset($image_name) AND isset($image_tmp_name) AND isset($category_id) AND isset($description) AND isset($teacher_id) AND isset($classDate) AND isset($classTime)){
    $data =[
        "image" => $image_name,
        "description" => $description,
        "category_id" => $category_id,
        "teacher_id"=> $teacher_id,
        "class_date"=>$classDate,
        "class_time"=> $classTime,
    ];
    $result = $db->insertClassPost($data);

    if($result){
         move_uploaded_file("$image_tmp_name","../classPostPhotos/$image_name");

         session_start();
         $_SESSION["insert_post"] = "A post is successfully created";
         HTTP::redirect("/admin/createclasspost.php");
    }else{
        session_start();
        $_SESSION["insert_post_fail"] = "Can't create post";
        HTTP::redirect("/index.php");
    }
}else{
    session_start();
    $_SESSION["insert_post_fail"] = "Can't create post";
    HTTP::redirect("/admin/createclasspost.php");

}