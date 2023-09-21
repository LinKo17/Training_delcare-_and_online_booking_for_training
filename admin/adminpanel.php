<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bs ccs link -->
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css">

    <!-- bs js link -->
    <script src="../bs/js/bootstrap.bundle.min.js" defer></script>

    <!-- original css link -->
    <link rel="stylesheet" href="style.css">
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
<!-- navbar section -->



</body>
</html>