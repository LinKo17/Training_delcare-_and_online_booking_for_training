<?php
session_start();
if(isset($_SESSION["user_member_data"])){
    $user_member_Data = $_SESSION["user_member_data"];
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
    <div class="container mt-3" id="edit-container">

      <div class="card">
      <div class="card-header bg-primary text-light text-center h5">Sign Up Form</div>

      <div class="card-body">
        <form action="../_action/log/sign_up_data.php" method="post">

          <div class="my-2">
            <label for="username">Username</label>
            <!-- -------------------------------- -->
            <input type="text" class="form-control mt-1 <?php if(isset($_SESSION["user_name_wrong"])): ?> is-invalid <?php endif ?>" name="username" id="username" placeholder="Username" required value="<?=$user_member_Data["username"] ?? "" ?>">

            <?php if(isset( $_SESSION["user_name_wrong"])): ?>
                <span class="text-danger"><?= isset( $_SESSION["user_name_wrong"]) ?$_SESSION["user_name_wrong"] : "" ?></span>
            <?php endif  ?>
            <!-- -------------------------------- -->
          </div>

          <div class="my-2">
            <label for="email">Email</label>

            <!-- ------------------------------- -->
              <input type="text" class="form-control mt-1 <?php if(isset($_SESSION["user_email_wrong"])): ?> is-invalid <?php endif ?>" name="email" id="email" placeholder="Email" required value="<?=$user_member_Data["email"] ?? "" ?>">

              <?php if(isset( $_SESSION["user_email_wrong"])): ?>
                <span class="text-danger"><?= isset( $_SESSION["user_email_wrong"]) ? $_SESSION["user_email_wrong"] : "" ?></span>
              <?php endif  ?>
            <!-- ------------------------------- -->
          </div>
  
          <div class="my-2">
            <label for="password">Password</label>

            <!-- --------------------------------------- -->
            <input type="text" class="form-control mt-1 <?php if(isset($_SESSION["user_pass_wrong"])): ?> is-invalid <?php endif ?>" name="password" id="password" placeholder="Password" required value="<?=$user_member_Data["password"] ?? "" ?>">

            <?php if(isset( $_SESSION["user_pass_wrong"])): ?>
              <span class="text-danger"><?= isset( $_SESSION["user_pass_wrong"]) ? $_SESSION["user_pass_wrong"] : "" ?></span>
            <?php endif  ?>
            <!-- --------------------------------------- -->
          </div>
  
          <div class="my-2">
            <label for="confirm-password">Confirm Password</label>

            <!-- --------------------------------------- -->
            <input type="text" class="form-control mt-1 <?php if(isset($_SESSION["not_same_password"])): ?> is-invalid <?php endif ?>" name="confirm-password" id="confirm-password" placeholder="Confirm Password" required value="<?=$user_member_Data["conpassword"] ?? "" ?>">

            <?php if(isset( $_SESSION["not_same_password"])): ?>

              <span class="text-danger"><?= isset( $_SESSION["not_same_password"]) ? $_SESSION["not_same_password"] : "" ?></span>

            <?php endif  ?>
            <!-- --------------------------------------- -->
          </div>
          
          <div class="my-2">
            <input type="radio" style="opacity:0">
            <div class="float-end">
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </div>
  
        </form>
      </div>
      </div>

      <div class="text-center mt-2">
        <a href="sign_in.php">Sign In Form ???</a>
      </div>
    </div>
    <!-- /register form -->

    <?php
        if(isset( $_SESSION["user_member_data"])){
            unset($_SESSION["user_member_data"]);
        }
        if(isset( $_SESSION["user_name_wrong"])){
            unset($_SESSION["user_name_wrong"]);
        }
        if(isset( $_SESSION["user_email_wrong"])){
            unset($_SESSION["user_email_wrong"]);
        }
        if(isset( $_SESSION["user_pass_wrong"])){
            unset($_SESSION["user_pass_wrong"]);
        }
        if(isset( $_SESSION["not_same_password"])){
            unset($_SESSION["not_same_password"]);
        }

    ?>
</body>
</html>