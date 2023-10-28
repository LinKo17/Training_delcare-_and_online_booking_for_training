<?php
include("../../vendor/autoload.php");

$aboutUs =  htmlspecialchars($_POST["aboutus"]);

use Libs\Database\MySQL;
use Helper\HTTP;
use Libs\Database\AboutUsAndOthers;

$database = new AboutUsAndOthers(new MySQL());
// print_r($database->takeAboutUsData());
$result = $database->editAboutUsData(1,$aboutUs);

if($result){
    HTTP::redirect("/admin/contact/about_us.php");
}else{
    HTTP::redirect("/admin/contact/about_us.php");
}
HTTP::redirect("/admin/contact/about_us.php");

