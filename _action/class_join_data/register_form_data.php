<?php

include("../../vendor/autoload.php");
use Helper\HTTP;
use Libs\Database\StuRegisterForm;
use Libs\Database\MySQL;
use Helper\Auth;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/index.php");
    // echo "not same number";
}

$data =  $_SESSION["register_member_data"]; 
print_r($_SESSION["register_member_data"]);

if(!isset($data["stu_name"]) || !isset($data["stu_phone_number"]) || !isset($data["stu_email"]) || !isset($data["stu_address"]) || !isset($data["stu_pay_system"]) || !isset($data["batch_id"])){
    # အပေါ်က တစ်ခုခု true ထွကိရင် ဒီထဲဝင်လာလိမ့်မယ်။
    # မရှိတာ ဟုတ်တယ်ဆိုရင် ဒီထဲဝင်လာလိမ့်မယ်။
    HTTP::redirect("/index.php");
    // echo "not same given words";
}

$database = new StuRegisterForm(new MySQL());
$result = $database->insertStuData($data);

if($result){
    $rd_stu_id_data = $database->register_menber_id($data["stu_name"],$data["stu_email"],$data["stu_address"],$data["batch_id"],$data["course"],$data["course_fee"]);

    $id = $rd_stu_id_data->id;
    $random = Auth::randomNumber();
    
   HTTP::redirect("/class_join/firstCheckloading.php","rd=$random&&stu=$id");
    echo "perform done";
}else{
    HTTP::redirect("/index.php");
    // echo "fail to db";
}
