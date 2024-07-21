<!-- Connecting file -->
<?php
include('../includes/connect.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <!-- Bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="light">
            <div class="container-fluid">
                <img class="logo" src="../Images/logos.png" alt="logo" href="../index.php">
                <button class="navbar-toggler bg-white radius-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation ">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse fw-bold" id="navbarSupportedContent">
                    <ul class="navbar-nav    me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active text-white" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white" href="#">Offers</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white" href="../Product.php">Shop</a>
                        </li>
                        
                        <li class="nav-item ">
                            <a class="nav-link text-white" href="../contact.php">Contact Us</a>
                        </li>
                        
                    </ul>
                    <form class="d-flex  " action="search_product.php" method="get">
                        <input class="form-control me-2 fs-5 fw-bold" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <hr class="mt-1 mb-1" />

        <!-- After Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav  me-auto">
               <!-- Php code -->
               <?php
                  if(!isset($_SESSION['username'])){
                    echo" <li class='nav-item'>
                    <a href='#' class='nav-link'>Welcome Guest</a>
                    </li>";
                }else{
                    echo" <li class='nav-item'>
                    <a href='#' class='nav-link'>Welcome ".$_SESSION['username']."</a>
                    </li>";
                }
                if(!isset($_SESSION['username'])){
                    echo" <li class='nav-item'>
                    <a href='./users_area/user_login.php' class='nav-link'>Login</a>
                    </li>";
                }else{
                    echo"<li class='nav-item'>
                    <a href='./users_area/logout.php' class='nav-link'>Logout</a>
                    </li>";
                }
                ?>
            </ul>
        </nav>


       
        <!-- Fourth child -->
<div class="row px-1">
        <div class="col-md-12">
<!--  -->
<div class="row">
    <?php
    if(!isset($_SESSION['username'])){
include('user_login.php');
    }else{
        include('payment.php');
    }
    ?>
</div>
        </div>
        </div>
        

    </div>
        <!-- Including footer -->
        <?php
        include('../includes/footer.php');
        ?>



</body>
<!-- Bootstrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>
