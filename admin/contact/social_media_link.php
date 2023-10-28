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
    </style>    

</head>
<body>
<!-- navbar section -->
<?php  require_once("contentNavbar.php") ?>
<!-- navbar section -->

<!-- social form -->
<div class="container mt-2" style="width:80%">
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




    

  </div>
</div>
</div>
<!-- social form -->
</body>
</html>