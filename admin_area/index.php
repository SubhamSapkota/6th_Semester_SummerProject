<!-- Connecting file -->
<?php
include('../includes/connect.php');
include('Functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body {
        overflow-x: hidden;
    }

    .admin_image {
        width: 100px;
        object-fit: contain;
    }
    .user_image {
        width: 70px;
        object-fit: contain;
    }

    .product_img {
        width: 50px;
        object-fit: contain;
    }

    .footer {
        bottom: 0;
        margin: 0;
    }
</style>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-black">
            <div class="container-fluid">
                <img class="logo" src="../Images/logos.png" alt="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-light">Welcome Admin</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </nav>

        <!-- After Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav  me-auto">
                <!-- Php code -->
                <?php
                if (!isset($_SESSION['admin_name'])) {
                    echo " <li class='nav-item'>
                    <a href='#' class='nav-link'>Welcome Guest</a>
                    </li>";
                } else {
                    echo " <li class='nav-item'>
                    <a href='#' class='nav-link'>Welcome " . $_SESSION['admin_name'] . "</a>
                    </li>";
                }
                if (!isset($_SESSION['admin_name'])) {
                    echo " <li class='nav-item'>
                    <a href='admin_login.php' class='nav-link'>Login</a>
                    </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a href='adminlogout.php' class='nav-link'><i class='fa fa-sign-out text-danger' aria-hidden='true'></i></a>
                    </li>";
                }
                ?>

            </ul>
        </nav>

        <!-- Second -->
        <div class="bg-light">
            <h3 class="text-center p-2">
                Manage Details
            </h3>
        </div>

        <!-- Third -->
        <div class="row ">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../Images/logos.png" alt="Admin Image" class="admin_image"></a>
                    <div class="text-light text-center"><?php echo $_SESSION['admin_name']?></div>
                </div>
                <div class="button text-center ">
                    <!-- <button class="my-3"><a href="" class="nav-link text-black  my-1">Patient List</a></button> -->
                    <button class="my-3 "><a href="insert_product.php" class="nav-link text-black my-1">Insert Product</a></button>
                    <button class="my-3"><a href="index.php?view_products" class="nav-link text-black my-1">View Products</a></button>
                    <button class="my-3"><a href="index.php?insert_brand" class="nav-link text-black my-1">Insert Brand</a></button>
                    <button class="my-3"><a href="index.php?view_brands" class="nav-link text-black my-1">View Brands</a></button>
                    <button class="my-3"><a href="index.php?insert_categories" class="nav-link text-black my-1">Insert Categories</a></button>
                    <button class="my-3"><a href="index.php?view_categories" class="nav-link text-black my-1">View Categories</a></button>
                    <button class="my-3"><a href="index.php?list_orders" class="nav-link text-black my-1">All Orders</a></button>
                    <button class="my-3"><a href="index.php?list_payments" class="nav-link text-black my-1">All Payment</a></button>
                    <button class="my-3"><a href="index.php?list_users" class="nav-link text-black my-1">All Users</a></button>
                    <button class="my-3"><a href="" class="nav-link text-black my-1"><i class="fa fa-sign-out text-danger" aria-hidden="true"></i></a></button>
                </div>
            </div>
        </div>

        <!-- Php for acquiring the form -->
        <div class="container my-3">
            <?php
            if (isset($_SESSION['admin_name'])) {
            if (isset($_GET['insert_brand'])) {
                include('insert_brand.php');
            }

            if (isset($_GET['insert_categories'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('edit_brand.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }}
            else{
                echo "<script>window.open('admin_login.php','_self')</script>";
            }
            ?>
        </div>

    </div>
   
     <!-- Including footer -->
     <?php
    include('../includes/footer.php');
    ?>

</body>
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>