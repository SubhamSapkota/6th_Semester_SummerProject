<!-- Connecting file -->
<?php
include('../includes/connect.php');

include('../admin_area/Functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome <?php echo $_SESSION['username'] ?> </title>
    <!-- Bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        

        .card-img-top {
            width: 100%;
            height: 300px;
            object-fit: contain;
        }

        .profile_img {
            width: 90%;
            margin: auto;
            display: block;
            height: 200px;
            object-fit: contain;
        }
        .edit_img{
         width: 100px;   
         height: 100px;
         object-fit: contain;
        }
    </style>
</head>

<body class="body">
    <!-- Navbar -->
    <div id="header">
        <nav class="navbar navbar-expand-lg "  >
            <div class="container-fluid" >
                <img class="logo" src="../Images/logos.png" alt="logo">
                <button class="navbar-toggler bg-white radius-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation ">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-black fw-bold" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navbar">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="profile.php">MyAccount</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="../Product.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../contact.php">Contact Us</a>
                        </li>
  
                        <li class="nav-item">
                            <a class="nav-link " href="../cart.php"><i class=" fa-solid fa-cart-shopping "><sup class=" bg-danger text-white"><?php cart_item(); ?></sup></i></a>
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
        
        <!-- Calling cart function -->
        <?php
        cart();
        ?>

        <!-- After Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
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
                    <a href='user_login.php' class='nav-link'>Login</a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a href='logout.php' class='nav-link'>Logout</a>
                    </li>";
                }
                ?>

            </ul>
        </nav>



        

        <!-- Fourth child -->
        <div class="row">
            <div class="col-md-2 col-sm-4">
                <ul class="navbar-nav bg-secondary text-white text-center" style="height:100vh">
                    <li class="nav-item bg-black ">
                        <a class="nav-link  text-white" href="#">
                            <h4>Your Profile</h4>
                        </a>
                    </li>
                    <!-- Php Code -->
                    <?php
                    $username = $_SESSION['username'];
                    $user_image = "Select * from `user_table` where username='$username'";
                    $user_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($user_image);
                    $user_image = $row_image['user_image'];
                    echo " <li class='nav-item bg-secondary '>
                     <img src='./user_images/$user_image' alt=''class='profile_img my-4'>
                    </li>";
                    ?>



                    <li class="nav-item bg-secondary ">
                        <a class="nav-link  text-white" href="profile.php">Pending Orders</a>
                    </li>
                    <li class="nav-item bg-secondary ">
                        <a class="nav-link  text-white" href="profile.php?edit_account">Edit Account</a>
                    </li>
                    <li class="nav-item bg-secondary ">
                        <a class="nav-link  text-white" href="profile.php?my_orders">My Orders</a>
                    </li>
                    <li class="nav-item bg-secondary ">
                        <a class="nav-link  text-white" href="profile.php?delete_account">Delete Account</a>
                    </li>
                    <li class="nav-item bg-secondary ">
                        <a class="nav-link  text-white" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 col-sm-8 text-center ">
                <?php get_user_order_details();  
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])){
                    include('user_orders.php');
                }
                if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                }
                ?>
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