<?php
namespace Helper;

use Libs\Database\UserLoginSystem;

class Auth{
    static function check(){
        // session_start();
        if(isset($_SESSION["userInfo"])){
            return $_SESSION["userInfo"];

        }else{
            $_SESSION["login_fail"] = "true";
            HTTP::redirect("/index.php");
            exit();
        }
    }

    static function randomNumber(){

        $random = md5("whoareyou" . time()) . sha1("whatareyoudoing" . time());
        if($random){
            // session_start();
            $_SESSION["checkRandomNumber"] = $random;
            return  $random;
        }
    }

    static function checkUserRole(){
        $role = null;
        if(isset($_SESSION["userInfo"])){
            $user_data = $_SESSION["userInfo"];
            $role = $user_data->role_id;
        }
        if($role == 4 || $role == 5){
            return true;
        }else{
            HTTP::redirect("/index.php");
            // echo "wrong";
        }
    }
}