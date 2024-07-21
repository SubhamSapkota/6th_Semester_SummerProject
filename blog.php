<!-- Connecting file -->
<?php
include('includes/connect.php');
include('admin_area/Functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- Bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navbar -->
    <div id="header">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <img class="logo" src="./Images/logos.png" alt="logo">
                <button class="navbar-toggler bg-white radius-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation ">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-black fw-bold" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navbar">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <!-- Php code -->
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
                             <a class='nav-link text-black' href='./users_area/profile.php'>My Account</a>
                             </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link text-black' href='./users_area/user_registration.php'>Register</a>
                           </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link " href="Product.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="Blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="display_all.php">All Products</a>
                        </li> -->

                     
                        <li class="nav-item">
                            <a class="nav-link " href="cart.php"><i class=" fa-solid fa-cart-shopping "><sup class=" bg-danger"><?php cart_item(); ?></sup></i></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#">Total Amount: <?php total_cart_price(); ?>/-</a>
                        </li>

                        
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-1 fs-10 fw-bold" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <!-- After Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light ">
        <ul class="navbar-nav  me-auto">
            <!-- Php code -->
            <?php
            if (!isset($_SESSION['username'])) {
                echo " <li class='nav-item'>
                    <a href='#' class='nav-link'>Welcome Guest</a>
                    </li>";
            } else {
                echo " <li class='nav-item'>
                    <a href='#' class='nav-link'>Welcome " . $_SESSION['username'] . "</a>
                    </li>";
            }
            if (!isset($_SESSION['username'])) {
                echo " <li class='nav-item'>
                    <a href='./users_area/user_login.php' class='nav-link'>Login</a>
                    </li>";
            } else {
                echo "<li class='nav-item'>
                    <a href='./users_area/logout.php' class='nav-link'>Logout</a>
                    </li>";
            }
            ?>

        </ul>
    </nav>

    <section id="page-header" class="blogheader">
        <h2>#readmore</h2>
        <p>Read all case studies about our products and services!</p>
    </section>
    
    <section id="blog">
        <div class="blog-box">
            <div class="blog-img">
                <img src="Images/EyeChecking.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Eye Checking</h4>
                <p>Get your eyes checked in this clinic by experienced optometrist.</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>01/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="Images/BlueCut1.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Blue Cut Lens</h4>
                <p>Blue Cut Lenses have a special coating which reflects blue light and prevents it from passing through.</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>01/02</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="Images/Eye-banner4.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Glasses For Children</h4>
                <p>Get your children glasses prescribed by one of the best optometrist in town.</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>01/03</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="Images/Eye-Banner1.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Eye Infection</h4>
                <p>Protect your eyes from infection, visit us for medical care and glasses.</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>01/04</h1>
        </div>
    </section>


    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
         <input type="text" placeholder="Your email address">
         <button class="normal">Sign Up</button>
        </div>
    </section>

        <!-- <div class="col-md-2 bg-dark p-0">
            <ul class="navbar-nav me-auto text-center">
                Brands to be displayed
                <li class="nav-item bg-secondary ">
                    <a href="#" class="nav-link text-white">
                        <h4>Brands</h4>
                    </a>
                </li>

               /* <?php
                //   displaying brand using function

                displaybrands();
                ?>  */

            </ul>

            Category to be displayed
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-secondary ">
                    <a href="#" class="nav-link text-white">
                        <h4>Categories</h4>
                    </a>
                </li>
                //<?php
                //    displaying category
                // getcategory();
                //?> 

            </ul> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- </div> -->

    <!-- </div> -->
    <!-- Including footer -->
    <?php
    include('./includes/footer.php');
    ?>



</body>
<!-- Bootstrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>