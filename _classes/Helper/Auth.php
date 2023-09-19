<?php
namespace Helper;

class Auth{
    static function check(){
        session_start();
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
}