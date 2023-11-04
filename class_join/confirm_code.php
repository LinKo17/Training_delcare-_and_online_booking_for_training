<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;
use Helper\HTTP;

session_start();
if(!isset($_SESSION["verification_file"]) || isset($_SESSION["loading_file"])){
    HTTP::redirect("/index.php");

}

if(isset($_SESSION["rejection"])){
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
        .style-div{
            display: inline;
            user-select: none;
        }
        .style-div .style-input{
            border:1px solid gray;
            width:100%;
            height:60px;
            border-radius: 15px;
            cursor: pointer;
            font-size:25px;
            text-align: center;
        }
        span .container{
            width:450px;
            height: 280px;
            /* border:1px solid black; */
            /* margin-top:150px; */
        }
        .container-style{
            width:450px;            
        }
        .btn-style{
            width:32%;
        }
        .body-style{
            height:150px;
            padding-top:45px;
        }
        .style-world{
            margin:17px 0px;
            opacity: 0.7;
            color: red;
            cursor: default;

        }
        .style-world:hover{
            color:black;
            text-decoration: underline;
        }
        @media(max-width:500px){
            span .container{
            width:400px;
            height: 280px;
        } 
        .container-style{
            width:400px;           
        }
        } 

        @media(max-width:403px){
            span .container{
            width:340px;
            height: 280px;
        }  
        .style-div .style-input{
            height:50px;
            border-radius: 15px;
            font-size:20px;
        }
        .container-style{
            width:340px;           
        }
        }
    </style>
</head>
<body>
      <!-- navbar section -->
      <div class="navbar navbar-dark navbar-expand bg-primary">
        <div class="container">
            <a href="../index.php" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>
        </div>
    </div>
    <!-- navbar section -->

    <!-- main part section -->
    <span >
        <div class="container mt-5 ">

    
        <div class="card">

        <div class="card-header  text-white text-center fs-5 bg-primary">Verification Code</div>
            
            <form action="../_action/class_join_data/register_veri_confirm.php" method="post">
                <div class="">
                    <input type="hidden" value="<?= $_GET["stu"]?>" class="form-control" name="stu_id" >
                </div>
                <div class="card-body body-style">
                    <span class="span-style">
                        <div class="style-div">
                        <input name="verification" type="text" class="style-input" placeholder="Enter Validation Code" required>
                        </div>
            
                    </span>
                </div>

                <?php
                    $random = rand(10,99);
                    $random_id = $_GET["stu"] . $random .  $random;
                ?>
                <div class="card-footer">
                    <a href="../index.php" class="btn-style btn btn-outline-danger">Home</a>
                    <a href="../_action/class_join_data/register_veri_resend.php?id=<?=$random_id?>" class="btn-style btn btn-outline-secondary">Resend</a>
                    <button type="submit"class="btn-style btn btn-outline-primary">Confirm</button>
                </div>

            </form>
        </div>
        </div>
    </span>
    <!-- main part section -->

            <!-- session section -->
            <div class="container container-style">
            <?php if(isset($_SESSION["verifi_msg_back"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION["verifi_msg_back"] ?>
                    <?php unset($_SESSION["verifi_msg_back"]) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>        
            </div>
        <!-- session section -->    

    <!-- notice messsage  -->
    <div class="container  container-style">
        
    <div class="style-world">
        <span>* ကျေးဇူပြုရျ် ၁ မိနစ် မှ ၁၀ မိနစ်ကြား စောင့်ပေးပါ။</span>
    </div>

    <div class="style-world">
        <span>* သင့်ရဲ့ Verification code ကို သင့်ရဲ့  email account တွင် ပို့ပေးမည်ဖြစ်သည်။</span>
    </div>

    <div class="style-world">
        <span>* ၁၀ မိနစ် ကျော်လွန်သွားလျှင် ခေတ္တခဏစောင့်ရျ် နောက်တစ်ကြိမ် ထပ်မံ သင်တန်းအပ်ပေးရန် မေတ္တာရပ်ခံ အပ်ပါသည်။</span>
    </div>

    <div class="style-world">
        <span>* Resend ကို တစ်ကြိမ် နှိပ် ပြီးသွားရင် သုံးမိနစ် စောင့်ပေးပါ။</span>
    </div>
    </div>
    <!-- notice messsage  -->
    


</body>
</html>