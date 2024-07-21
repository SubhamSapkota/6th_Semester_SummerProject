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
    <title>Contact Us</title>
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
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contact.php">Contact Us</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="display_all.php">All Products</a>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Accessories
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item" href="#">Glasses &raquo;</a>
                                    <ul class="dropdown-menu dropdown-submenu">
                                        <li><a href="#" class="dropdown-item">Sunglasses</a></li>
                                        <li><a href="#" class="dropdown-item">For Gamers</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Lens</a></li>
                            </ul>
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

    <section id="page-header" class="contact-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE.We love to hear from you!</p>
    </section>

   <section id="contact-details" class="section-p1">
       <div class="details">
           <span>GET IN TOUCH</span>
           <h2>Visit our clinic location or contact us today</h2>
           <h3>Clinic</h3>
           <div>
               <li>
                   <i class="fas fa-map"></i>
                   <p>Harisiddhi,Lalitpur 44700</p>
               </li>
               <li>
                   <i class="fas fa-envelope"></i>
                   <p>johndoe@gmail.com</p>
               </li>
               <li>
                   <i class="fas fa-phone-alt"></i>
                   <p>+977 XXXXXXXXXXX</p>
               </li>
               <li>
                   <i class="fas fa-clock"></i>
                   <p>Sunday to Friday: 10:00AM to 6:00PM</p>
               </li>
           </div>
       </div>
       <div class="map">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805.942789562498!2d85.34154226750245!3d27.637514582916875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb17470ae5d6f1%3A0xb8e6c9b71b1fc3be!2sShree%20Harisiddhi%20Secondary%20School!5e0!3m2!1sen!2snp!4v1692690397005!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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