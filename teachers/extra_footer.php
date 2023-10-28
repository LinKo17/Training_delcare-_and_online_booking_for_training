<!-- awesome icon link -->
<link rel="stylesheet" href="../bs/css/all.min.css">


<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersContentTable;
$mediaDatabase = new UsersContentTable(new MySQL);
$mediaLink = $mediaDatabase->mediaData();
?>

<style>
    .ft_bg_color{
        background-color: #012a4a;
        width:100%;
        height:auto;
    }
    .shawdow-line{
        background-color: #ccd5ae;
        width:100%;
        height:1px;
        opacity:0.6;
        border-radius: 100px;
        margin:2px auto;
    }

    #cus_title{
        color: white;
        font-size:18px;
        cursor:default;
        opacity: 0.6;
    }
    #cus_title:hover{
        opacity: 0.9;
        text-decoration: underline;
    }
    #link{
        margin:6px 0px;
    }
    #link a{
        color:gray;
        text-decoration: none;
        opacity: 0.6;
    }
    #link a:hover{
        text-decoration: underline;
        opacity: 0.9;
    }
    #address{
        margin:5px 0px;
    }

    #address span{
        font-size:18px;
        color:white;
        opacity: 0.7;
        cursor: default;
    }
    #address span:hover{
        opacity: 0.9;
        text-decoration: underline;
    }
    #measure{
        margin-top:13px;
    }
    /* ---- media css code ---- */

    .edit-icon{
            width:40px;
            height:40px;
            border-radius:100px;
            background-color:white;
            margin:0px 2px;
            display:flex;
            position:relative;
            opacity: 0.5;
        }
        .edit-icon:hover{
            background-color:#212529;
            color:#fff0f3;
            opacity: 0.8;
        }
        .icon-inner-edit{
            position:absolute;
            bottom:5px;
            right:8px;
        }
        .f-size{
            font-size:23px;
        }

        .fs-edit{
            margin-top:10px;
            font-size:20px;
            color:#ffffff;
        }

        #writter{
            color:white;
        }
    /* ---- media css code ---- */
</style>

<div class="ft_bg_color">
    <div class="container">

        <div class="row">
            <div class="col text-center">
            <a href="../index.php" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span><span style="color:white;">Technology</span></span></a>
            </div>
        </div>

    <div class="row text-center mt-3" >
        <div class="col-lg-4 col-md-12 col-12" id="measure">

            <div>
                <span id="cus_title">Address</span>
            </div>


            <div id="address">
                <span>
                    အမှတ် ၂၀၉ | ၄ လွှာ ဗညားဒလလမ်း တာမွေမြို့နယ်။
                </span>
            </div>

            <div id="address">
                <span>
                    No.209 | 4 floors Banyerdala street Tarmwe Township
                </span>
            </div>


        </div>

            <div class="col-lg-4 col-md-6 col-12" id="measure">
                <div> 
                <span id="cus_title">About</span>
                </div>

                <div id="link">
                    <a href="teachers/teachers_info.php">Teachers</a>
                </div>

                <div id="link">
                    <a href="../courses/course_info.php">Courses And Fee</a>
                </div>

                <div id="link">
                        <a href="../others/contact_us.php">Contact Us</a>
                </div>

                <div id="link">
                        <a href="../others/about_us.php">About Us</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12" id="measure">
                <div>
                <span id="cus_title">Contact</span>

                <div id="link">
                    <a href="">+959 237235774</a>
                </div>

                <div id="link">
                    <a href="">01-328392774</a>
                </div>

                <div id="link">
                    <a href="">mytechnology@gmail.com</a>
                </div>
                
                <div id="link">
                    <a href="">techforeveryone@gmail.com</a>
                </div>


                </div>


            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="shawdow-line"></div>
    </div>

    <div class="container">
    <div class="row">

            <div class="col-12 text-center">
                
                <a href=" <?= $mediaLink->telegram ?>">
                    <div class="edit-icon d-inline-block mx-1 ">
                        <div class="icon-inner-edit">
                            <i class="fa-brands fa-telegram f-size"></i>
                        </div>
                    </div>
                </a>

                <a href=" <?= $mediaLink->viber ?>">
                    <div class="edit-icon d-inline-block mx-1">
                        <div class="icon-inner-edit">
                            <i class="fa-brands fa-viber f-size"></i>
                        </div>
                    </div>
                </a>
                

                <a href="<?= $mediaLink->facebook ?>">
                        <div class="edit-icon d-inline-block mx-1">
                            <div class="icon-inner-edit">
                                <i class="fa-brands fa-facebook f-size "></i>
                            </div>
                        </div>
                </a>
            </div>

        </div>
    </div>

</div>