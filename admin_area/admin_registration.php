<?php
include('../includes/connect.php');
include('Functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
       <!-- bootstrap css link -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body{
        overflow-x: hidden;
        background-image: url(https://cdn.pixabay.com/photo/2016/11/06/21/05/hot-air-ballooning-1804140_960_720.jpg);
        /* background-repeat: no-repeat; */
        background-size: cover;
    }
</style>
<body>
    <div class="container m-3 ">
     <h2 class="text-center mb-5 text-danger">Admin Registration</h2>
    <div class="d-flex  justify-content-center">
        <!-- <div class="col-lg-6 col-xl-5 ">
            <img src="../images/adminreg.jpg" alt="Admin Registration" class="img-fluid">
        </div> -->
       
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Adminname</label>
                    <input type="text" id="admin_name" name="admin_name"
                    placeholder="Enter your name" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_email" class="form-label">Email</label>
                    <input type="email" id="admin_email" name="admin_email"
                    placeholder="Enter your email" required="required" class="form-control">
                    <span class="text-danger">&#40; Include @gmail.com &#41;</span>
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">password</label>
                    <input type="password" id="admin_password" name="admin_password"
                    placeholder="Enter your password" required="required" class="form-control">
                    <span class="text-danger">&#40; Should be more than 8 characters. &#41;</span>
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="confirm_password" id="confirm_admin_password" name="confirm_admin_password"
                    placeholder="confirm password" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit"  class="bg-black text-light py-2 px-3 border-0 mb-2"
                   name="admin_registration" value="Register" >
                   <p class="small fw-bold">Already have an acoount?<a href="admin_login.php" class="text-danger">Login</a></p>
                </div>
            </form>
        
    </div>
    </div>
</body>
</html>



<!-- Php code for registration -->
<?php
// global $con;
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_admin_password=$_POST['confirm_admin_password'];

    // $user_address=$_POST['user_address'];
    // $user_contact=$_POST['user_contact'];
    // $user_image=$_FILES['user_image']['name'];
    // $user_image_tmp=$_FILES['user_image']['tmp_name'];
    // $user_ip=getIPAddress();

//select query
$select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('Username and Email already exist please use other username')</script>";
    
}
else if (strlen ($admin_password) < 8) {  
    echo "<script>alert('Password must contain 8 characters.')</script>";
    }  
    // else if (strlen ($user_contact) != 10) {  
    //     echo "<script>alert('Mobile no must contain 10 digits.')</script>";
    //     } 
        else if(!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {  
            echo "<script>alert('Please enter the valid email format!!')</script>"; 
        }  
else if($admin_password!=$confirm_admin_password){
    echo "<script>alert('Please insert the same password to confirm!!')</script>";
    
}
else{
    
    //insert query to insert user from registration form
    // move_uploaded_file($user_image_tmp,"./user_images/$user_image");

    $insert_query="Insert into `admin_table`(admin_name,admin_email,admin_password)
    values ('$admin_name','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con , $insert_query);
    if($sql_execute){
        echo "<script>alert('Data inserted successfully')</script>";
    }
}


}




?>
