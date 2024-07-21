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
    <title>Home Page</title>
    <meta name="google-site-verification" content="BHeiBIK-tAnDqSyls6982BKSb3yeN1TxqMIp0FT2xe8" />
    <!-- Bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <div id="header">
        <nav class="navbar navbar-expand-lg "  >
            <div class="container-fluid" >
                <img class="logo" src="./Images/logos.png" alt="logo">
                <button class="navbar-toggler bg-white radius-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation ">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-black fw-bold" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navbar">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                            <a class="nav-link" href="Product.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
  
                        <li class="nav-item">
                            <a class="nav-link " href="cart.php"><i class=" fa-solid fa-cart-shopping "><sup class=" bg-danger text-white"><?php cart_item(); ?></sup></i></a>
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
        <nav class="navbar navbar-expand-lg navbar-light " >
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
                    <a href='./users_area/logout.php' class='nav-link'><i class='fa fa-sign-out text-danger' aria-hidden='true'></i></a>
                    </li>";
                }
                ?>

            </ul>
        </nav>
    


        

    <section id="hero">
        <h4>PRESCRIPTION EYEWEAR &</h4>
        <h2>SUNGLASSES IN NEPAL</h2>
        <h1>Free Delivery on orders placed from website</h1>
        <p>Find best fit</p>
        <button><a href="product.php" style="text-decoration:none;">Shop Now</a></button>
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

     <section id="product1" class="section-p1">
        <h2>Featured Product</h2>
        <p>Cool Stylish Comfortable </p>
        <div class="pro-container">
             <!-- Cards Info about us -->
        <div class="row px-3 pro">
            <div class="col-md-12">
                <!-- Some Products to display -->
                <div class="row">
                 <!-- fetching products -->
                  <?php
                //   Calling the function
                get_random_products();
                // // calling cart function
                cart();
                // $ip = getIPAddress();  
                // echo 'User Real IP Address - '.$ip;  
                  ?>


                   
                    <!-- row end -->
                </div>
                <!-- col end -->
            </div>
                </div>
            </div>
        </div>
     </section>
    
     <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <Span>50% off</Span>- All glasses and Accessories</h2>
        <button class="normal">Explore More</button>
     </section>
     
     <section id="product1" class="section-p1">
        <h2>New Arrival</h2>
        <p>Cool Stylish</p>
        <div class="pro-container">
             <!-- Cards Info about us -->
             <div class="row px-12 pro">
             <div class="col-md-12">
        <div class="row">
                  <?php
                //   Calling the function
                get_random_products();
                // calling cart function
                cart();
                  ?>
            </div>
        </div>
        </div>
            </div>
        </div>
     </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Crazy Deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best eyewears at sale</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcomming seasons</h2>
            <span>The best Summer goggles</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <section id="banner3">
       <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Blue Cut Lenses -25% OFF</h3>
        </div>
       <div class="banner-box banner-box2">
            <h2>Make Prescription Glasses</h2>
            <h3>-5% OFF</h3>
        </div>
      <div class="banner-box banner-box3">
            <h2>Eye Checking Campaign</h2>
            <h3>Free</h3>
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

    <!-- including footer -->
    <div>
        <?php
        include('./includes/footer.php');
        ?>
    </div>

</body>
<!-- Bootstrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>