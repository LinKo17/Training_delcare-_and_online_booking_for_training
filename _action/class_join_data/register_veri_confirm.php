<?php 
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;
use Helper\Auth;
use Helper\HTTP;

$database = new StuRegisterForm(new MySQL());
$stu_data=$database->takeAllData($_POST["stu_id"]);
print_r($stu_data);

$stu_id = $_POST["stu_id"];
$reg_verification = $_POST["verification"];
$ad_verification = $stu_data->ad_veri_code;
session_start();

function backVerifi(){
    global $stu_data;

    session_start();
    $class_id =$stu_data->batch_id; 
    $random = Auth::randomNumber();
    $student_id =$_POST["stu_id"];
    
    $_SESSION["verifi_msg_back"] = "* verification code မှားယွင်းနေပါသည်။ ကျေဇူးပြုရျ် ထပ်မံဖြည့်ပေးပါ။";
    return HTTP::redirect("/class_join/confirm_code.php","id=$student_id&&rd=$random&&stu=$student_id");
}

if($ad_verification  != "not yet"){
    if($reg_verification != "not yet"){
        if(trim($ad_verification) === trim($reg_verification)){
            $result = $database->reConfirmVerfi($stu_id,$reg_verification);
            if($result){
                $random = Auth::randomNumber();
                $student_id =$_POST["stu_id"];
                $database->changeShow($student_id,3);
                HTTP::redirect("/class_join/loading.php","stu_id=$student_id&&rd=$random");
            }else{
                backVerifi();
                echo "no db";
            }
        }else{
            backVerifi();
            echo $ad_verification . "<br>";
            echo $reg_verification . "<br>";
            echo "not same";
        }

    }else{
        backVerifi();
        echo "wrong reg";
    }

}else{
    backVerifi();
    echo "wrong ad";
}



