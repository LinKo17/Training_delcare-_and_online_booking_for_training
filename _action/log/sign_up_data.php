<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Helper\HTTP;
use Libs\Database\UserLoginSystem;

require("regular_exp_log.php");

// print_r($_POST);
session_start();
$username = checkUser($_POST["username"]) ? $_POST["username"] : false;
$email = checkEmail($_POST["email"]) ? $_POST["email"] : false;

$password =   password($_POST["password"]) ? $_POST["password"] : false;
$conpassword = password($_POST["confirm-password"]) ? $_POST["confirm-password"] : false;

$user_data=[
    "username" => htmlspecialchars($_POST["username"]),
    "email" => htmlspecialchars($_POST["email"]),
    "password" => htmlspecialchars($_POST["password"]),
    "conpassword" => htmlspecialchars($_POST["confirm-password"])
];

if(!$username|| !$email || !$password || !$conpassword){

    if(!$username){
        $_SESSION["user_name_wrong"] = "* write English and no special charactor";
    }

    if(!$email){
        $_SESSION["user_email_wrong"] = "* check your email again";
    }
    
    if(!$password){
        $_SESSION["user_pass_wrong"] = "* password should be between 6 and 15";
    }


    if($password != $conpassword){
        $_SESSION["not_same_password"] = "* password not equal";
    }

    $_SESSION["user_member_data"] = $user_data;
    HTTP::redirect("/log/sign_up.php");
}

 if(strlen(htmlspecialchars($_POST["password"])) == strlen($_POST["confirm-password"])){
    $data =[
        "username" => htmlspecialchars($username),
        "email"=>  htmlspecialchars($email),
        "password" =>  htmlspecialchars($conpassword)
    ];

    $database = new UserLoginSystem(new MySQL());
    $result = $database->insertUserdata($data);

    if($result){
        $result = $database->findByEmailAndPassword($data["email"],$data["password"]);
        // print_r($result);
        $_SESSION["userInfo"] = $result;
        HTTP::redirect("/index.php");
    }else{
        $_SESSION["user_email_wrong"] = "* check your email again";
        $_SESSION["user_member_data"] = $user_data;
        HTTP::redirect("/log/sign_up.php");
    }
    
 }else{
    $_SESSION["not_same_password"] = "* password not equal";
    $_SESSION["user_member_data"] = $user_data;
    HTTP::redirect("/log/sign_up.php");    
 }


