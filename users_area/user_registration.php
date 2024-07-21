<?php
include('../includes/connect.php');
include('../admin_area/Functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
        <!-- Bootstarp css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!-- Font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Linking CSS -->
    <link rel="stylesheet" href="/style.css">

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" 
                        autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" 
                        autocomplete="off" required="required" name="user_email">
                        <span class="text-danger">&#40; Include @gmail.com &#41;</span>
                       
                    </div>

                    <!-- image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Image</label>
                        <input type="file" id="user_image" class="form-control" 
                         required="required" name="user_image">
                    </div>

                      <!-- password field -->
                      <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" 
                        autocomplete="off" required="required" name="user_password">
                       <span class="text-danger">&#40; Password Should be more than 8 characters. &#41;</span>
                    </div>

                      <!-- confirm password -->
                      <div class="form-outline mb-4">
                        <label for="confirm_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_user_password" class="form-control" placeholder="Confirm your password" 
                        autocomplete="off" required="required" name="confirm_user_password">
                    </div>

                      <!-- Address field -->
                      <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">User Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" 
                        autocomplete="off" required="required" name="user_address">
                    </div>

                      <!-- user contact number  -->
                      <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="number" id="user_contact" class="form-control" placeholder="Enter your mobile number" 
                        autocomplete="off" required="required" name="user_contact">
                        <span class="text-danger">&#40; Contact number must consist of 10 digits. &#41;</span>
                    </div>
                    <div class="mt-4 pt-1">
                        <input type="submit"  value="Register" class="bg-dark text-white py-2 px-3 border-0 mb-3" name="user_register">
                        <p class="small fw-bold mb-0">Already have an account?<a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</body>
<!-- Bootstrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>

<!-- Php code for registration -->
<?php
// global $con;
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_user_password=$_POST['confirm_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];  
    $length = strlen($user_contact);
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
  

//select query
$select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('Username and Email already exist please use other username')</script>";
    
} 
else if (strlen ($user_password) < 8) {  
    echo "<script>alert('Password must contain 8 characters.')</script>";
    }  
    else if (strlen ($user_contact) != 10) {  
        echo "<script>alert('Mobile no must contain 10 digits.')</script>";
        } 
else if($user_password!=$confirm_user_password){
    echo "<script>alert('Please insert the same password to confirm!!')</script>";   
}
 else if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {  
    echo "<script>alert('Please enter the valid email format!!')</script>"; 
}  
else{
    
    //insert query to insert user from registration form
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="Insert into `user_table`(username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
    values ('$user_username','$user_email','$hash_password','$user_image',
    '$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con , $insert_query);
    if($sql_execute){
        echo "<script>alert('Data inserted successfully')</script>";
    }
}


// selecting cart items
$select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have some items in your cart!')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
    
}else{
    echo "<script>window.open('../Product.php','_self')</script>";

}

 

}




?>
