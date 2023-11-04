<?php
include("../../_action/contact_data/media_data.php");
// print_r($data);

use Helper\Auth;
session_start();
$random = Auth::randomNumber();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bs ccs link -->
    <link rel="stylesheet" href="../../bs/css/bootstrap.min.css">

    <!-- bs js link -->
    <script src="../../bs/js/bootstrap.bundle.min.js" defer> </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .btn-style{
          width:100%;
        }
        .container-style{
          width:80%;
        }
        @media(max-width=600px){
          .container-style{
            width:100%;
          }
        }
    </style>    

</head>
<body>
<!-- navbar section -->
<?php  require_once("contentNavbar.php") ?>
<!-- navbar section -->

<!-- social form -->
<div class="container mt-2" class="container-style">
  <div class="card">
  <div class="card-header bg-primary text-light h5">Social Media Controller </div>
  <div class="card-body">

    <!-- ------------------   facebook      -->
    <form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=fb" method="post" class="my-3">

        <label>Facebook</label>

        <div class="input-group">
          <input type="text" class="form-control mt-1" value="<?= $data->facebook?>" name="facebook">
            <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
        </div>

      </form>

    <!-- ------------------  facebook       -->


    <!-- ------------------  viber       -->
    <form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=vb" method="post" class="my-3">

        <label>Viber</label>

        <div class="input-group">
          <input type="text" class="form-control mt-1" value="<?= $data->viber?>" name="viber">
            <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
        </div>

      </form>
    <!-- ------------------  viber       -->

    <!-- ------------------  telegram       -->
    <form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=tg" method="post" class="my-3">

        <label>Telegram</label>

        <div class="input-group">
          <input type="text" class="form-control mt-1" value="<?= $data->telegram?>" name="telegram">
            <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
        </div>

      </form>
    <!-- ------------------  telegram       -->


    <!-- ------------------  phone 1       -->
    <form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=ph1" method="post" class="my-3">

        <label>Phone_1</label>

        <div class="input-group">
          <input type="text" class="form-control mt-1" value="<?= $data->phone_1?>" name="phone_1">
            <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
        </div>

      </form>
    <!-- ------------------  phone 1       -->

    <!-- ------------------  phone 2       -->
    <form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=ph2" method="post" class="my-3">

        <label>Phone_2</label>

        <div class="input-group">
          <input type="text" class="form-control mt-1" value="<?= $data->phone_2?>" name="phone_2">
            <button class="btn btn-danger"  href="../../_action/contact_data/media_edit_data.php">Edit</button>
        </div>

      </form>
    <!-- ------------------  phone 2       -->

    <!-- ------------------  phone 3       -->
    <form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=ph3" method="post" class="my-3">

        <label>Phone_3</label>

        <div class="input-group">
          <input type="text" class="form-control mt-1" value="<?= $data->phone_3?>" name="phone_3">
            <button class="btn btn-danger">Edit</button>
        </div>

      </form>
    <!-- ------------------  phone 3       -->


    <!-- ------------------  mail       -->
    <form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=mail" method="post" class="my-3">

        <label>Mail</label>

        <div class="input-group">
          <input type="text" class="form-control mt-1"  name="mail" value="<?= $data->mail ?>">
            <button class="btn btn-danger">Edit</button>
        </div>

      </form>
    <!-- ------------------  mail       -->

    <!-- ------------------  mail_2       -->
    <form action="../../_action/contact_data/media_edit_data.php?rd=<?= $random?>&md=mail_2" method="post" class="my-3">

        <label>Mail_2</label>

        <div class="input-group">
          <input type="text" class="form-control mt-1"  name="mail_2" value="<?= $data->mail_2 ?>">
            <button class="btn btn-danger">Edit</button>
        </div>

      </form>
    <!-- ------------------  mail       -->

  </div>
  </div>
</div>
<!-- social form -->

<!-- time management form -->
<div class="container mt-4" style="width:80%">
        <div class="card">
          <div class="card-header bg-primary text-light h5">School Time management</div>

          <div class="card-body">
            <form action="../../_action/contact_data/media_edit_extra_open_close.php?rd=<?= $random?>&md=form" method="post">

            
            <!-- Open school -->
            <div class="mt-1 mb-4">

              <div class="text-center fs-4 bg-dark text-light mb-2" style="width:100%;" for="close_time_section">School Open Section</div>

                <label for="open_time_close_time" class="mb-2">Open And Close Time (within 27 letters)</label>
                <input type="text" class="form-control" id="open_time_close_time" name="open_time_close_time" placeholder="example(9:00 AM To 5:00 PM)" value="<?= $data->open_time?>">

                <label for="open_date" class="mt-3 mb-2">Open Date  (within 20 letters)</label>
                <input type="text" class="form-control" name="open_date" id="open_date" placeholder="example (Monday To Friday)" value="<?= $data->open_date?>">

            </div>
            <!-- Open school -->

              <!-- Close school -->
            <div class="my-4">
              <div class="text-center fs-4 bg-dark text-light mb-2" style="width:100%;" for="close_time_section">School Close Section</div>

                <label for="close_date" class="mb-2">Close Date (within 20 letters)</label>
                <input type="text" class="form-control" name="close_date" id="close_date" placeholder="example (Mon To Fri) " value="<?= $data->close_date?>">
            </div>
            <!-- Close school -->

            <!-- Quote section -->
            <div class="my-4">
                <label for="quote_section" class="mb-2">Quote Section (within 27 letters)</label>
                <input type="text" class="form-control" name="quote_section" id="quote_section" value="<?= $data->quote?>">
                
            </div>
            <!-- Quote section -->

            
            <!-- address section -->
            <div class="text-center fs-4 bg-dark text-light" style="width:100%;" for="close_time_section">Address Section</div>

            <div class="my-4">
                <label for="my_address" class="mb-2">Burmese Address</label>
                <input type="text" class="form-control" name="my_address" id="my_address" value="<?= $data->my_address?>">
                
            </div>

            <div class="my-4">
                <label for="eng_address" class="mb-2">Eng Address</label>
                <input type="text" class="form-control" name="eng_address" id="eng_address" value="<?= $data->eng_address?>">
                
            </div>


            <!-- address section -->
            
            <button class="btn btn-danger btn-style">Edit</button>
            </form>
          </div>
        </div>
</div>
<!-- time management form -->

</body>
</html>