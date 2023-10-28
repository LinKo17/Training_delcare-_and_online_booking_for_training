<?php 
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UserLoginSystem;
use Helper\HTTP;

$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["password"]);


$database = new UserLoginSystem(new MySQL());
$result = $database->findByEmailAndPassword($email,$password);

if($result){
    session_start();
    $_SESSION["userInfo"] = $result;
    HTTP::redirect("/index.php");
}else{
    session_start();
    $_SESSION["neq"] = "Sign In Fail.Please Check Again";
     HTTP::redirect("/log/sign_in.php");
}