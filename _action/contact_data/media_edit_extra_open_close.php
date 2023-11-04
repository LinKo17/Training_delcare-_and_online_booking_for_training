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

    case "form";
        $open_section_open_time_close_time =  htmlspecialchars(substr($_POST["open_time_close_time"],0,27)) != "" ? htmlspecialchars(substr($_POST["open_time_close_time"],0,27)): "empty";

        $open_section_open_date =  htmlspecialchars(substr($_POST["open_date"],0,20))  != "" ? htmlspecialchars(substr($_POST["open_date"],0,20)) : "empty";

        $close_section_close_date =  htmlspecialchars(substr($_POST["close_date"],0,20)) != "" ? htmlspecialchars(substr($_POST["close_date"],0,20)) : "empty";

        $quote_section =  htmlspecialchars(substr($_POST["quote_section"],0,27)) != "" ? htmlspecialchars(substr($_POST["quote_section"],0,27)) : "empty";

        $burmese_address =  htmlspecialchars($_POST["my_address"]) != "" ? htmlspecialchars($_POST["my_address"]) : "empty";

        $eng_address =  htmlspecialchars($_POST["eng_address"]) != "" ? htmlspecialchars($_POST["eng_address"]) : "empty";


        $result = $database->indexFromEdit(1,$open_section_open_time_close_time,$open_section_open_date,$close_section_close_date,$quote_section,$burmese_address,$eng_address);
        check($result);
    break;

    default:
        HTTP::redirect("/admin/contact/social_media_link.php");                           
}
?>