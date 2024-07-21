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
    <title>About Us</title>
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
                            <a class="nav-link" href="Blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="about.php">About Us</a>
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

    <section id="page-header" class="about-header">
        <h2>#knowUS</h2>
        <p>Read All about us!</p>
    </section>

    <section id="about-head" class="section-p1">
        <img src="Images/a6.jpg" alt="Clinic Photo">
        <div>
            <h2>Who We Are?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae perferendis fugiat facere! Est laboriosam hic ratione error! Eum, sed blanditiis numquam vero culpa eius deleniti recusandae! Repudiandae consequuntur eaque corporis praesentium nulla. Vero nulla, natus excepturi ratione rem facilis animi magni distinctio dignissimos, ducimus, officiis consequuntur! Aliquam praesentium voluptatibus neque consequuntur. Ex officiis doloribus illo at eum voluptate odio atque aspernatur sint iusto cumque illum beatae deleniti nemo velit mollitia, fuga nisi qui! Possimus nisi ratione quod laboriosam molestiae repudiandae quam laborum fuga voluptatum, blanditiis necessitatibus perspiciatis unde nobis placeat odio distinctio nam illum aliquam labore similique nulla vero corrupti a impedit! Vitae ducimus corporis natus dicta unde nostrum facere voluptate, impedit doloribus dolorum fugiat minus assumenda id nihil ea commodi officia?</p>

            <abbr title="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, necessitatibus laboriosam sequi natus ab pariatur eveniet, unde rerum explicabo similique ea doloribus? Repudiandae facere excepturi libero distinctio voluptatum sit accusantium ullam aliquam facilis quas. Dolorem omnis accusamus esse possimus officia tenetur quia eaque explicabo numquam.</abbr>

            <br><br>

            <marquee bgcolor="#ccc" loop="-1" scrollammount="5" width="100%" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ex aspernatur harum veritatis, dolores sed atque praesentium voluptates! Quidem inventore ratione possimus sapiente, distinctio obcaecati!</marquee>
        </div>
    </section>

     <section id="about-app" class="section-p1">
        <h1>Download Our <a href="#">App</a> Coming Soon.</h1>
        <div class="video">
            <!-- <video autoplay muted loop src="Images/1.mp4"></video> -->
        </div>
     </section>

     <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="Images/f1.png">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="Images/f2.png">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="Images/f3.png">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="Images/f4.png">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="Images/f5.png">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="Images/f6.png">
            <h6>24/7 Support</h6>
        </div>
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


    <!-- Including footer -->
    <?php
    include('./includes/footer.php');
    ?>



</body>
<!-- Bootstrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>