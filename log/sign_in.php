<?php
session_start();
if(isset($_SESSION["user_sign_in_member_data"])){
    $user_sign_in_member_Data = $_SESSION["user_sign_in_member_data"];
    // print_r($user_sign_in_member_Data);
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
        #edit-container{
          width:400px;
        }

        @media(max-width:420px){
          #edit-container{
          width:325px;
        }

        }
    </style>
</head>
<body>


    <!-- navbar section -->
    <div class="navbar bg-primary  navbar-expand navbar-dark text-danger">
        <div class="container">
        <a href="../index.php" class="navbar-brand"><span class="fs-5"><span class="text-warning fs-3">My</span>Technology</span></a>
        </div>
    </div>
    <!-- navbar section -->


    <!-- register form -->
    <div class="container mt-5" id="edit-container">

      <div class="card">
      <div class="card-header bg-primary text-light text-center h5">Sign In Form</div>

      <div class="card-body">
        <form action="../_action/log/sign_in_data.php" method="post">


          <!-- ---------------------------------------------- -->

          <div class="my-2">
            <label for="email">Email</label>

            <!-- ------------------------------- -->
              <input type="text" class="form-control mt-1 <?php if(isset($_SESSION["user_sign_in_email_wrong"])): ?> is-invalid <?php endif ?>" name="email" id="email" placeholder="Email" required value="<?=$user_sign_in_member_Data["email"] ?? "" ?>">

              <?php if(isset( $_SESSION["user_sign_in_email_wrong"])): ?>
                <span class="text-danger"><?= isset( $_SESSION["user_sign_in_email_wrong"]) ? $_SESSION["user_sign_in_email_wrong"] : "" ?></span>
              <?php endif  ?>
            <!-- ------------------------------- -->
          </div>
  
          <div class="my-2">
            <label for="password">Password</label>

            <!-- --------------------------------------- -->
            <input type="text" class="form-control mt-1 <?php if(isset($_SESSION["user_sign_in_pass_wrong"])): ?> is-invalid <?php endif ?>" name="password" id="password" placeholder="Password" required value="<?=$user_sign_in_member_Data["password"] ?? "" ?>">

            <?php if(isset( $_SESSION["user_sign_in_pass_wrong"])): ?>
              <span class="text-danger"><?= isset( $_SESSION["user_sign_in_pass_wrong"]) ? $_SESSION["user_sign_in_pass_wrong"] : "" ?></span>
            <?php endif  ?>
            <!-- --------------------------------------- -->
          </div>

          <!-- ---------------------------------------------- -->

          <div class="my-2">
            <input type="radio" style="opacity:0">
            <div class="float-end">
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </div>
  
        </form>
      </div>
      </div>

      <div class="text-center mt-2">
        <a href="sign_up.php">Haven't you Sign Up???</a>
      </div>
    </div>
    <!-- /register form -->

    <?php
        if(isset($_SESSION["user_sign_in_member_data"])){
          unset($_SESSION["user_sign_in_member_data"]);
        }   
        if(isset( $_SESSION["user_sign_in_email_wrong"])){
            unset($_SESSION["user_sign_in_email_wrong"]);
        }
        if(isset( $_SESSION["user_sign_in_pass_wrong"])){
            unset($_SESSION["user_sign_in_pass_wrong"]);
        }

    ?>
</body>
</html>