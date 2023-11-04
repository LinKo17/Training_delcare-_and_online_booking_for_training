<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Libs\Database\UsersAnotherTable;

use Libs\Database\UsersContentTable;
$database = new UsersContentTable(new MySQL());


session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/contact/social_media_link.php");
}

function check($result){
    if($result){
        HTTP::redirect("/admin/contact/social_media_link.php");
    }else{
        HTTP::redirect("/admin/contact/social_media_link.php");
    }
}

$media = $_GET["md"];
switch($media){

    case "fb":
        echo $data = htmlspecialchars($_POST["facebook"]);
        $result = $database->facebookEdit(1,$data);
        check($result);
        break;

    case "vb":
        echo $data = htmlspecialchars($_POST["viber"]);
        $result = $database->viberEdit(1,$data);
        check($result);
        break;

    case "tg":
        echo $data = htmlspecialchars($_POST["telegram"]);
        $result = $database->telegramEdit(1,$data);
        check($result);
        break;

    case "ph1":
        echo $data = htmlspecialchars($_POST["phone_1"]);
        $result = $database->phone_1(1,$data);
        check($result);
        break;

    case "ph2":
        echo $data = htmlspecialchars($_POST["phone_2"]);
        $result = $database->phone_2(1,$data);
        check($result);
        break;
        
    case "ph3":
        echo $data = htmlspecialchars($_POST["phone_3"]);
        $result = $database->phone_3(1,$data);
        check($result);
        break;

    case "mail";
        echo $data = htmlspecialchars($_POST["mail"]);
        $result = $database->mailEdit(1,$data);
        check($result);
        break;            

    case "mail_2";
        echo $data = htmlspecialchars($_POST["mail_2"]);
        $result = $database->mailEdit_2(1,$data);
        check($result);
        break;            

    default:
        HTTP::redirect("/admin/contact/social_media_link.php");                           
}
?>