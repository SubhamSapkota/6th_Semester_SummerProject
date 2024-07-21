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
    <title>Search Product</title>
    <!-- Bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
        .card-img-top{
            width: 100%;
            height: 300px;
            object-fit: contain;
        }
    </style>
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
                            <a class="nav-link " href="contact.php">Contact Us</a>
                        </li>

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
                    <a href='./users_area/logout.php' class='nav-link'><i class='fa fa-sign-out text-danger' aria-hidden='true'></i></a>
                    </li>";
                }
                ?>
            </ul>
        </nav>


       

        <!-- Cards Info about us -->
        <div class="row px-2">
            <div class="col-md-10">
                <!-- Some Products to display -->
                <div class="row">
                 <!-- fetching products -->
                  <?php
                //   Calling the function
                search_product();
                get_unique_categories();
                get_unique_brands();

                cart();
                  ?>


                   
                    <!-- row end -->
                </div>
                <!-- col end -->
            </div>

               <div class="col-md-2 bg-dark p-0">
                   <ul class="navbar-nav me-auto text-center">
                     <!-- Brands to be displayed -->
                     <li class="nav-item bg-secondary ">
                       <a href="#" class="nav-link text-white"><h4>Brands</h4></a>
                      </li>

                      <?php
                    //   displaying brand using function

                    displaybrands();
                            ?>

                    </ul>
                      
                      <!-- Category to be displayed -->
                    <ul class="navbar-nav me-auto text-center">
                       <li class="nav-item bg-secondary ">
                          <a href="#" class="nav-link text-white"><h4>Categories</h4></a>
                        </li>
                           <?php
                        //    displaying category
                        getcategory();
                            ?>
                       
                    </ul>
            </div>
            </div>
        </div>

    </div>
        <!-- Including footer -->
        <?php
        include('./includes/footer.php');
        ?>


</body>
<!-- Bootstrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>
