<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Helper\HTTP;
use Libs\Database\UserLoginSystem;

require("regular_exp_log.php");

// print_r($_POST);

$username = $_POST["username"];
$email = $_POST["email"];

$password = $_POST["password"];
$conpassword = $_POST["confirm-password"];

if($password == $conpassword){
    
    if(username($username)){
         $checkUser = $username;
    }else{
        $_SESSION["name"] = "Check you name again.<br> (Name should be between 6 and 15)!!";
        HTTP::redirect("/log/sign_up.php");
    }


    if(email($email)){
         $checkEmail = $email;
    }else{
        $_SESSION["email"] = "Check you Email again!!!";
        HTTP::redirect("/log/sign_up.php");
    }


    if(password($conpassword)){
         $checkPassword = $conpassword;
    }else{
        $_SESSION["password"] = "Check your password <br>(Password between 6 and 15) !!!";
        HTTP::redirect("/log/sign_up.php");
    }

    $data =[
        "username" => htmlspecialchars($checkUser),
        "email"=>  htmlspecialchars($checkEmail),
        "password" =>  htmlspecialchars($checkPassword)
    ];

    $database = new UserLoginSystem(new MySQL());
    $result = $database->insertUserdata($data);

    if($result){
        $result = $database->findByEmailAndPassword($data["email"],$data["password"]);
        // print_r($result);
        $_SESSION["userInfo"] = $result;
        HTTP::redirect("/index.php");
    }else{
        $_SESSION["neq"] = "Sign Up Fail.Please Check Again";
         HTTP::redirect("/log/sign_up.php");
    }
    

}else{
    $_SESSION["neq"] = "password and confirm password aren't equal";
    HTTP::redirect("/log/sign_up.php");
}

