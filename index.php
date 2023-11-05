<?php
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\UsersAnotherTable;
use Helper\HTTP;
use Helper\Auth;

session_start();


if(isset($_SESSION["userInfo"])){
  $userData = $_SESSION["userInfo"];
}
unset($_SESSION["loading"]);

$database = new UsersAnotherTable(new MySQL);
$data = $database->joinClassPostsAndCoursesLimit();
// session_start();
// echo Auth::randomNumber();
?>

<?php
use Libs\Database\UsersContentTable;
$mediaDatabase = new UsersContentTable(new MySQL);
$titleLink = $mediaDatabase->mediaData();
// print_r($titleLink);

//------ session unset part
if(isset($_SESSION["verification_file"])){
  unset($_SESSION["verification_file"]);
}
if(isset($_SESSION["loading_file"])){
  unset($_SESSION["loading_file"]);
}
if(isset($_SESSION["rejection"])){
  unset($_SESSION["rejection"]);
}
//------ session unset part
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bs ccs link -->
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">

    <!-- bs js link -->
    <script src="bs/js/bootstrap.bundle.min.js" defer> </script>

    <!-- original css link -->
    <link rel="stylesheet" href="style.css">

    <style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        /* ------------ */
        .warp{
            width:1000px;
            margin:20px auto;
            background-color: black;
            position: relative;
            color:white;
            font-family: Courier;
            user-select: none;
        }
        .box{
            height:200px;
            text-align: center;
        }
        #box1{
            background-color: black;
        }
        #box2{

            background-color: #013a63;
            display: none;
            color:#e7ecef;
        }
        #box3{
          background-color: #03045e;
          display: none;
          color: orange;
        }
        .action{
            background-color: transparent;
            border:none;
            font-size: 1.5em;
            position: absolute;
            top:42%;
            cursor: pointer;
        }

        #prev{
            left:20px;
        }
        #next{
            right:20px;
        }
        .font-style-header{
          font-size:45px;
          line-height: 100px;
        }
        .font-style-text{
          font-size:30px;
        }
        .font-style-quote{
          font-size:30px;
          line-height: 200px;
        }
        @media(max-width:1007px){
          .warp{
            width:700px;
          }
        }

        @media(max-width:739px){
          .warp{
            width:600px;
          }
        }

        @media(max-width:623px){
          .warp{
            width:500px;
          }
        }
        
        @media(max-width:623px){
          .warp{
            width:500px;
          }
        }

        @media(max-width:519px){
          .warp{
            width:400px;
          }
          .font-style-quote{
          font-size:20px;
          line-height: 200px;
          }
        }
        @media(max-width:407px){
          .warp{
            width:377px;
          }
        }
    </style>
</head>
<body>


    <!-- navbar section -->
   <nav class="navbar navbar-dark bg-primary">
    <div class="container">

    <a href="index.php" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>

    <!-- responsive button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- responsive button -->

    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></h5>

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

          <li class="nav-item my-1">
            <a href="teachers/teachers_info.php" class="nav-link active btn btn-light text-dark"> Teachers </a>
          </li>

          <li class="nav-item my-1">
          <a href="courses/course_info.php" class="nav-link active btn btn-light text-dark"> Courses And Fee </a>
          </li>

          <li class="nav-item my-1">
          <a href="others/contact_us.php" class="nav-link active btn btn-light text-dark"> Contact Us</a>
          </li>

          <li class="nav-item my-1">
          <a href="others/about_us.php" class="nav-link active btn btn-light text-dark"> About Us</a>
          </li>

          <li class="nav-item my-1 dropdown">
          <a href="others/about_us.php dropdown-toggle" class="nav-link active btn btn-light text-dark" data-bs-toggle="dropdown">

          <?php if(isset($_SESSION["userInfo"])): ?>
              <?php echo $userData->username ?>
            <?php else : ?>
                User
              <?php endif ?>

          </a>

          <div class="dropdown-menu">
          <?php if(isset($_SESSION["userInfo"])): ?>

            <a href="_action/log/sign_out_data.php" class="dropdown-item text-center">Sign Out</a>

            <?php else : ?>

              <a href="log/sign_in.php" class="dropdown-item text-center">Sign In</a>
              <a href="log/sign_up.php" class="dropdown-item text-center">Sign Up</a>

              <?php endif ?>
          </div>
          </li>

          <?php if(isset($_SESSION["userInfo"])): ?>
            <?php if($_SESSION["userInfo"]->role_id == 4 || $_SESSION["userInfo"]->role_id == 5): ?>
              <li class="nav-item my-1">
                <a href="admin/adminpanel.php" class="nav-link active btn btn-danger">Admin</a>
              </li>
              <?php endif ?>
          <?php endif ?>
          
        </ul>

      </div>
    </div>
  </div>
</nav>
    <!-- navbar section -->

    <!-- view section -->
    <div class="viewHomePage">
        <div class="header bg-light p-2">
            <h1 class="h4 text-center fs-3 text-primary">Technology <span class="fs-5 text-black">is for everyone</span></h1>
            <h1 class="h5 text-center fs-6">-- <span class="fs-6"><span class="text-warning fs-5">My</span>Technology</span> is warmly welcome you --</h1>
        </div>
    </div>
    <!-- view section -->

    <!-- open time -->
    <div class="warp">
        <button class="action" id="prev"></button>
        <button class="action" id="next"></button>

        <div class="box" id=box1>
            <div class="font-style-header">Open Time</div>
            <div class="font-style-text"><?= $titleLink->open_time ?></div>
            <div class="font-style-text"><?= $titleLink->open_date ?></div>
        </div>

        <div class="box" id=box2>
          <span class="font-style-header">Close Time</span>
          <div class="font-style-text"><?= $titleLink->close_date ?></div>
        </div>

        <div class="box" id=box3>
          <span class="font-style-quote"><?= $titleLink->quote ?></span>
        </div>
    </div>
    <!-- open time -->

    <!-- recently class open -->
    <div class="container border rounded border-seconary g-0 mt-2">
        <div class="navbar navbar-dark bg-secondary p-2">
            <span class="navbar-brand">New Classes</span>
            <div class="navbar-menu">
                <a href="getMoreClassInfo.php" class=" btn btn-primary p-2">Get More Infomation</a>
            </div>
        </div>
        <div class="row">
<!-- ------------- -->
<div class="container" style="width:100%;"> 
    <div class="row mx-1">

        <?php foreach($data as $item) : ?>
        <div class="col-lg-4  p-2 col-md-6">
            <div class="border card p-1">
                <div class="card-body">
                    <?php if(file_exists("classPostPhotos/$item->image")): ?>
                    <img src="classPostPhotos/<?= $item->image ?>" alt="" style="width:100%; height:200px;">
                    <?php endif ?>
                    <h1 class="h5 text-center my-1"><?= $item->c_course ?></h1>
                </div>

                <div class="card-footer">
                    <a style="width:32%" href="indexDetail.php?id=<?=$item->id?>&&rd=<?= Auth::randomNumber() ?>&&ds=ho" class="btn btn-secondary float-end">Details</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>


    </div>
</div>
<!-- ------------- -->
        </div>
    </div>
    <!-- /recently class open -->

    <!-- footer -->
    <?php include("index_footer.php"); ?>
    <!-- footer -->

    <script>
        document.querySelector("#prev").onclick = prev;
        document.querySelector("#next").onclick = next;

        setInterval(next,2000);
        // clearInterval();
        //setTimeout();
        var num =1;
        function prev(){
            document.querySelector("#box"+num).style.display = "none";
            num--;
            if(num<1){
                num=3;
                document.querySelector("#box"+num).style.display = "block";
            }
            document.querySelector("#box"+num).style.display = "block";
        }

        function next(){
            document.querySelector("#box"+num).style.display = "none";
            num++;
            if(num>3){
                num=1;
                document.querySelector("#box"+num).style.display = "block";
            }
            document.querySelector("#box"+num).style.display = "block";
        }
    </script>
</body>
</html>