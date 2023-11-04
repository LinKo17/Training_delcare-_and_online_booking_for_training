<?php
include("../vendor/autoload.php");
use Helper\HTTP;
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;

//register confirm section
$database = new StuRegisterForm(new MySQL());
$result = $database->takeAllData($_GET["stu_id"]);
$action_done = $result->registered_done;
$action_reject = $result->reject;

session_start();
$_SESSION["loading_file"] = true; //not to move back
$_SESSION["loading"]=true; // to forward section
$_SESSION["rejection"] = true;


//register reject section
$rejct_reason_data = $database->rejectReasonTaker($_GET["stu_id"]); // reject reason
$stu_id_from_reject_reason = isset($rejct_reason_data->stu_id);


$stu_id = $_GET["stu_id"];
$random = rand().rand().rand().rand().rand().rand().rand().rand().rand();

if(trim($action_reject) == 1 && isset($stu_id_from_reject_reason)){

    
    HTTP::redirect("/class_join/confirm_reject.php","stu=$stu_id&&$random");

}elseif(trim($action_reject) == 2){

    if($action_done == "done"){
        HTTP::redirect("/class_join/confirm_done.php","rd=$random&&zix=$stu_id");
    }
}

if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/index.php");
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bs ccs link -->
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css">

    <!-- bs js link -->
    <script src="../bs/js/bootstrap.bundle.min.js" defer> </script>    

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }   
        .style-world{
            margin:17px 0px;
            opacity: 0.7;
            color: red;
            font-size:20px;
            cursor: default;
            align-items: center;


        }
        .container-style{
            margin-top:280px;
        }
        .style-world-extra{
            margin:17px 0px;
            opacity: 0.7;
            color: red;
            cursor: default;
        }
        .style-world-extra:hover{
            color:black;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container container-style">
        <div class="style-world text-center">
            <span>ခဏစောင့်ပေးပါ။</span>
        </div>

        <div class="style-world-extra text-center">
                <span>* confirm ဖြစ်/မဖြစ် ကို စက္ကန့် သုံးဆယ် ကြားရင် တစ်ကြိမ် refresh လုပ်ကာ စမ်းနိုင်ပါသည်။</span>
             </div>
        
    </div>

    <!-- <script>
        setTimeout(function() {
            location.reload();
        }, 300000);
    </script> -->

</body>
</html>