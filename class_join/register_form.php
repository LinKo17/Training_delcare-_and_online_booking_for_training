<?php
include("../vendor/autoload.php");
use Helper\HTTP;
use Helper\Auth;


session_start();
if(isset( $_SESSION["register_member_data"])){
    $register_member_data = $_SESSION["register_member_data"];
}

$id= $_GET["id"];
$ds = $_GET["ds"];
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    $random = Auth::randomNumber();
    HTTP::redirect("/indexDetail.php","id=$id&&rd=$random&&ds=$ds");
    // echo "wrong";
    
}
$_SESSION["register_form_back"] = true;

$ds = $_GET["ds"];

if(trim($ds) == "ho"){
     "fine";
}elseif(trim($ds) == "all"){
     "fine";
}else{
    HTTP::redirect("/index.php");
}

unset($_SESSION["button__press"]);
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
            cursor: default;
        }
        .style-world:hover{
            color:black;
            text-decoration: underline;
        }
        .form-width{
            width:450px;
        }
        @media(max-width:450px){
            .form-width{
            width:370px;
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
    

    <!-- session section -->
    <div class="container form-width mt-2">
        <?php if(isset($_SESSION["checkPhoto"])) : ?>
        <div class="alert alert-danger alert-dismissible fade show " role="alert">
            <?= $_SESSION["checkPhoto"] ?>
            <?php unset($_SESSION["checkPhoto"]) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif ?>
    </div>

    <!-- session section -->



    <!-- join register form -->
        <div class="container my-3 form-width">

            <div class="card">
                <div class="card-header  text-white text-center fs-5 bg-primary">Register Here</div>

                <div class="card-body">

                    <form action="../_action/class_join_data/register_session_data.php" method="post" enctype="multipart/form-data">

                        <div class="my-2">
                            <input type="hidden" class="form-control" name="class_id" value="<?= $_GET["id"] ?>" required>
                        </div>

                        <div class="my-2">
                            <input type="hidden" class="form-control" name="ds" value="<?= $_GET["ds"] ?>" required>
                        </div>

                        <div class="my-2">
                            <label for="name" class="my-1">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required value="<?=$register_member_data["stu_name"] ?? "" ?>">
                        </div>

                        <div class="my-2">
                            <label for="phone_number" class="my-1">Phone Number</label>
                            <input type="text" class="form-control" name="ph_num" id="phone_number" placeholder="Phone Number" required value="<?=$register_member_data["stu_phone_number"] ?? "" ?>">
                        </div>

                        <div class="my-2">
                            <label for="email" class="my-1">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" required value="<?=$register_member_data["stu_email"] ?? "" ?>">
                        </div>

                        <div class="my-2">
                            <label for="address" class="my-1">Address</label>
                            <textarea type="text" class="form-control" name="address" id="address" placeholder="Address" required ><?=$register_member_data["stu_address"] ?? ""?></textarea>
    
                        </div>

                        <div class="my-2">
                            <label for="choice_pay" class="my-1">Choice Payment</label>
                            <select  id="choice_pay" name="pay_system" class="form-control" required>
                                <option value="K-pay" <?php echo $register_member_data["stu_pay_system"] ?? "" == "K-pay" ? "selected" : "" ?>>K-pay</option>

                                <option <?php echo $register_member_data["stu_pay_system"] ?? "" == "Wave" ? "selected" : "" ?> value="Wave">Wave</option>

                                <option <?php echo $register_member_data["stu_pay_system"] ?? "" == "A+" ? "selected" : "" ?> value="A+">A+</option>
                            </select>
                        </div>
    
                <div class="my-2">
                    <label for="pay_photo">Payment Screenshot</label>
                    <input type="file" class="form-control" name="pay_photo" id="payphoto" required>
                </div>
    
                        <div class="">
                            <div class="text-center">
                                <a href="../_action/class_join_data/register_session_destroy.php?id=<?= $_GET['id']?>&rd=<?=$random?>" class="btn btn-danger">Reset</a>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    <!-- join register form -->

    <!-- notice messages -->
  <div class="container my-3 form-width">
        <div class="style-world">
            <span>* website အတွင်း အပ်နှံလျှင် အထက်ဖော်ပြပါငွေပေးချေမှုများဖြင့်ငွေပေးချေနိုင်ပါသည်။</span>
        </div>
            
            <div class="style-world">
                <span>* သင်တန်းတွင် ကိုယ်တိုင်လာရောက်ရျ် သင်တန်း အပ်နှံ နိုင်ပါသည်။</span>
            </div>

            <div class="style-world">
                <span>* သင်တန်းသို့လာရောက်ကာ လက်ငင်းငွေချေနိုင်သည်။</span>
            </div>

        <div class="style-world">
                <span>* ငွေလွှဲပြောင်းပြီးကြောင်း ကို screenshot ရိုက်ပြီး အထက်တွင်ပြထားသည့် လေးထောင့်ကွင်း တွင်ထည့်ပေးပါ။</span>
             </div>


    
</div>
    <!-- notice messages -->

    






</body>
</html>