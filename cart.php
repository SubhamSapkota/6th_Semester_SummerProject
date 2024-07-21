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
    <title>Cart Details</title>
    <!-- Bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .cart_image {
            width: 100%;
            height: 60px;
            object-fit: contain;
        }
        
    </style>
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
                <ul class="navbar-nav    me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link " aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./users_area/user_registration.php">Register</a>
                        </li>
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
                   
                </div>
            </div>
        </nav>
    </div>
        <hr class="mt-1 mb-1" />

 <!-- After Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light">
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



    

        <!-- Table for the ones cart -->
        <div class="container  ">
            <div class="row m-2">
                <form action="" method="post">
                    <table class="table table-bordered text-center">

                        <!-- php code for fetching the cart items in cart table -->
                        <?php

                        $get_ip_address = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<thead>
                                 <tr>
                                     <th>Product Title</th>
                                      <th>Product Image</th>
                                      <th>Quantity</th>
                                       <th>Total Price</th>
                                       <th>Remove</th>
                                       <th colspan='2'>Operations</th>
                                       </tr>
                                       </thead>
                                       <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "Select * from `products` where product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;

                        ?>
                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_image"></td>
                                        <td><input type="text" name="qty" class="form-input w-56"></td>
                                        <?php
                                        $get_ip_address = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "Update `cart_details` set quantity=$quantities where ip_address='$get_ip_address'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }
                                        ?>

                                        <td><?php echo $price_table ?>/-</td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <!-- <button class="bg-dark text-light p-2 m-2">Update</button> -->
                                            <input type="submit" value="Update Cart" class="bg-dark text-light p-2 m-2" name="update_cart">
                                            <!-- <button class="bg-dark text-light p-2 ">Remove</button> -->
                                            <input type="submit" value="Remove Cart" class="bg-dark text-light p-2 m-2" name="remove_cart">
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                       
                        else{
                            echo "<h2 class='text-center' >Cart is empty. Please add some Products. Thank You!!</h2>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- Subtotal -->
                    <div class="d-flex mb-2">
                        <?php
                        $get_ip_address = getIPAddress();
                        
                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                           echo " <h4 class=' px-4'>Your Total:<strong class='text-danger'> $total_price/-</strong></h4>
                           <input type='submit' value='Continue Shopping' class='bg-dark text-light p-2 m-2' name='continue_shopping'>
                            <button class='bg-secondary text-light px-3 py-2 border-0 mx-3 mb-2'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                        }else{
                           echo" <input type='submit' value='Continue Shopping' class='bg-dark text-light p-2 m-2' name='continue_shopping'>;";

                        }
                        if(isset($_POST['continue_shopping'])){
                            echo "<script>window.open('Product.php','_self')</script>";
                        }
                    
                        ?>
                      
                    </div>
            </div>
        </div>
        </form>

        <!-- Removing to remove item from cart -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete  from `cart_details` where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();


        ?>



        <!-- Including footer -->

        <?php
        include('./includes/footer.php');
        ?>

    </div>


</body>
<!-- Bootstrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html> 