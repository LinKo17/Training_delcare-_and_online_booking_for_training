<?php 
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UserLoginSystem;
use Helper\HTTP;
require("regular_exp_log.php");
session_start();
$email = checkEmail($_POST["email"]) ? $_POST["email"] : false;
$password =   password($_POST["password"]) ? $_POST["password"] : false;

$sign_in_user_data=[
    "email" => htmlspecialchars($_POST["email"]),
    "password" => htmlspecialchars($_POST["password"]),
];

if(!$email || !$password){

    if(!$email){
        $_SESSION["user_sign_in_email_wrong"] = "* check your email again";
    }
    
    if(!$password){
        $_SESSION["user_sign_in_pass_wrong"] = "* password should be between 6 and 15";
    }


    $_SESSION["user_sign_in_member_data"] = $sign_in_user_data;
    HTTP::redirect("/log/sign_in.php");
}








$database = new UserLoginSystem(new MySQL());
$result = $database->findByEmailAndPassword($email,$password);

if($result){
    $_SESSION["userInfo"] = $result;
    HTTP::redirect("/index.php");
}else{
        $_SESSION["user_sign_in_email_wrong"] = "* wrong email";
        $_SESSION["user_sign_in_pass_wrong"] = "* wrong password";


    $_SESSION["user_sign_in_member_data"] = $sign_in_user_data;
    HTTP::redirect("/log/sign_in.php"); 
}
