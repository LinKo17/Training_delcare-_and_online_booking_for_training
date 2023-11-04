<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;
use Helper\HTTP;
use Helper\Auth;

session_start();
$rd = Auth::randomNumber();
$id = $_GET["stu"];



$database = new StuRegisterForm(new MySQL());
$data = $database->takeAllData($_GET["stu"]); // i used this for taking rejcet or/not and done

$rejct_reason_data = $database->rejectReasonTaker($_GET["stu"]); // reject reason
$stu_id_from_reject_reason = isset($rejct_reason_data->stu_id);




if(trim($data->reject) == 1 && isset($stu_id_from_reject_reason)){

    $_SESSION["rejection"] = true;
    HTTP::redirect("/class_join/confirm_reject.php","stu=$id&&$rd");

}elseif(trim($data->reject) == 2){
    $_SESSION["verification_file"] = true;
    HTTP::redirect("/class_join/confirm_code.php","stu=$id&&$rd");
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