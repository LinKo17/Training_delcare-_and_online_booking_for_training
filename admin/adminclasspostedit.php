<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Helper\Auth;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/createclassinfo.php");
};

$database = new UsersTable(new MySQL());
$id = $_GET["id"];
$data = $database->showSingleData($id);
// print_r($database->showSingleData($id));

// --------------- date management -----------
$dateString = $data->class_date;
$dateTime = date_create_from_format('j/F/Y', $dateString);

if ($dateTime !== false) {
    $day = $dateTime->format('d');
    $month = $dateTime->format('F');
    $year = $dateTime->format('Y');

    $dbdate =  $day; 
    $dbmonth=  $month; 
    $dbyear =  $year; 
} else {
    echo "Invalid date format: " . $dateString;
}
//--------------- date management -----------

//---------------- time management ----------
$timeString = $data->class_time;

// Split the time string into its components
list($dbminute, $dbhours, $ampm) = explode('/', $timeString);
// echo $dbminute . "<br>";
// echo $dbhours . "<br>";
// echo $ampm . "<br>";


//---------------- /time management ----------

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

    <!-- original css link -->
    <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }


        select {
            flex: 1;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            width:33%;
        }
        form{
            background:#fff;
        }
        @media(max-width:600px){
            select{
                padding:7px;
                font-size:14px;
                display:block;
                width:100%;
            }
        }
    </style>
</head>
<body>
    <!-- navbar section -->
    <ul class="nav justify-content-center bg-primary text-light">
        <li class="nav-item dropdown">
            <a class="nav-link  text-light btn btn-dark m-2 dropdown-toggle" data-bs-toggle="dropdown" href="">Home</a>
            <div class="dropdown-menu">
                <a href="" class="dropdown-item">Admin Panel</a>
                <a href="../index.php" class="dropdown-item">Home</a>
            </div>
        </li> 

        <li class="nav-item dropdown">
            <a class="nav-link text-light btn btn-warning m-2  dropdown-toggle" href="" data-bs-toggle="dropdown">Active Classes</a>
            <div class="dropdown-menu">
                <a href="createclasspost.php" class="dropdown-item">Create Classes</a>
                <a href="createclassinfo.php" class="dropdown-item">Classes Info</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link  text-light btn btn-info m-2" href="#">Teachers List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  text-light btn btn-secondary m-2" href="#">Time Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  text-light btn btn-success m-2" href="#">Payment</a>
        </li>


    </ul>
    <!-- /navbar section -->

    <!-- create classes post form -->
    <div class="container" style="width:80%">
        <h1 class="text-center h4 mt-2 mb-4">Edit a Class Section</h1>

        <form action="../_action/createclassposteditdata.php" class="border p-3 rounded" method="post" enctype="multipart/form-data">
            
            <div class="my-2">
                <input type="hidden" class="form-control" value="<?= $data->id ?>" name="id">
            </div>
            <div class="my-2">
                <label for="image">Post image</label>
                <input type="file" class="form-control" name="image" id="image" required value="<?= $data->image ?>">
            </div>
    
            <div class="my-2">
             <label for="class_category">Category</label>
                <select name="class_category_id" class="form-control" id="class_category" required>
                    <option <?php echo $data->category_id == 1 ? "selected" : "" ?> value="1">Java Course</option>
                    <option <?php echo $data->category_id == 2 ? "selected" : "" ?> value="2">Computer Basic</option>
                    <option <?php echo $data->category_id == 3 ? "selected" : "" ?> value="3">UI/UX Design</option>
                    <option <?php echo $data->category_id == 4 ? "selected" : "" ?> value="4">programming Basic</option>
                    <option <?php echo $data->category_id == 5 ? "selected" : "" ?> value="5">Networking</option>
                    <option <?php echo $data->category_id == 6 ? "selected" : "" ?> value="6">Flutter Course</option>
                    <option <?php echo $data->category_id == 7 ? "selected" : "" ?> value="7">React Course</option>
                    <option <?php echo $data->category_id == 8 ? "selected" : "" ?> value="8">Professional Web Development</option>
                </select>
            </div>


    
            <div class="my-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="2" class="form-control" required><?= $data->description?></textarea>
            </div>
    
            <div class="my-2">
                <label for="teacher">Teacher</label>
                <select name="teacher_id" class="form-control" id="teacher" required>
                    <option <?php echo $data->teacher_id ==1 ? "selected" : "" ?> value="1">Alice</option>
                    <option <?php echo $data->teacher_id ==2 ? "selected" : "" ?> value="2">Bob</option>
                </select>
            </div>

            <div class="my-2">
                <label for="">Class Date</label><br>
                <!-- ---------- -->
                    <select name="date" id="date">
                        <?php for($i=1; $i<=31; $i++): ?>
                            <option <?php echo $dbdate == $i ? "selected" : "" ?>  value="<?=$i?>"><?=$i?></option>
                        <?php endfor ?>
                    </select>
                <!-- ---------- -->

                <!-- ---------- -->
                <select name="month" id="month">
                <?php             $months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
                ];?>

                <?php foreach($months as $month): ?>
                    <option <?php echo $dbmonth == $month ? "selected" : "" ?>  value="<?=$month?>"><?=$month?></option>
                    <?php endforeach ?>
                </select>
                <!-- ---------- -->

                <!-- ---------- -->
                <select name="year" id="year">
                 <?php for($i=2000; $i<=date("Y"); $i++): ?>
                    <option <?php echo $dbyear == $i ? "selected" : "" ?>  value="<?= $i?>"><?= $i?></option>
                    <?php endfor ?>
                    </select>
                <!-- ---------- -->
            </div>

            <div class="my-2">
                <label for="">Class Time</label><br>
                <!-- ---------- -->
                <select name="minute" id="minute">
                    <?php for($i=00; $i<=60; $i++): ?>
                        <option <?php echo $dbminute ==$i ? "selected" : "" ?> value="<?=$i?>"><?=$i . " minutes "?></option>
                        <?php endfor ?>
                    </select>
                <!-- ---------- -->

                <!-- ---------- -->
                <select name="hour" id="hour">
                <?php for($i=00; $i<=12; $i++): ?>
                        <option <?php echo $dbhours ==$i ? "selected" : "" ?> value="<?=$i?>"><?=$i . " hours"?></option>
                        <?php endfor ?>
                    </select>
                <!-- ---------- -->

                <!-- ---------- -->
                <select name="d_n" id="year">
                    <option <?php echo $ampm =="am" ? "selected" : "" ?> value="am">AM</option>
                    <option <?php echo $ampm =="pm" ? "selected" : "" ?> value="pm">PM</option>
                    </select>
                <!-- ---------- -->
            </div>


            <div class="my-2">
                <input type="radio" style="opacity:0"></input>
                <div class="float-end">
                    <button type="reset" class="btn btn-danger ms-2">Reset</button>
                </div>
                    <div class="float-end">
                        <button type="create" class="btn btn-success ms-2">Edit</button>
                    </div>
            </div>
    

        </form>

    </div>
        <!-- /create classes post form -->


</body>
</html>