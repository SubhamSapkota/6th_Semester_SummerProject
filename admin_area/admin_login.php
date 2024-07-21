<?php
include('../includes/connect.php');
include('Functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
     <h2 class="text-center mb-5 text-danger">Admin Login</h2>
    <div class="d-flex  justify-content-center">
        <!-- <div class="col-lg-6 col-xl-5 ">
            <img src="../images/adminreg.jpg" alt="Admin Registration" class="img-fluid">
        </div> -->
       
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Adminname</label>
                    <input type="text" id="admin_name" name="admin_name"
                    placeholder="Enter your adminname" required="required" class="form-control">
                </div>
                
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">password</label>
                    <input type="password" id="admin_password" name="admin_password"
                    placeholder="Enter your password" required="required" class="form-control">
                </div>
               
                <div>
                    <input type="submit"  class="bg-black text-light py-2 px-3 border-0 mb-2"
                   name="admin_login" value="Login" >
                   <p class="small fw-bold">Don't have an acoount?<a href="admin_registration.php" class="text-danger">Register</a></p>
                </div>
            </form>
        
    </div>
    </div>
</body>
</html>

<!-- Php code for admin login logic -->
<?php
global $con;
if(isset($_POST['admin_login'])){
  $admin_name=$_POST['admin_name'];  
  $admin_password=$_POST['admin_password']; 

  $select_query="Select * from `admin_table` where admin_name='$admin_name'";
  $result=mysqli_query($con, $select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
//   $user_ip=getIPAddress();
  
  
  
//   //   cart item
//   $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
//   $select_cart=mysqli_query($con,$select_query_cart);
//   $row_count_cart=mysqli_num_rows($select_cart);

  if($row_count>0){
    $_SESSION['admin_name']=$admin_name;
if(password_verify($admin_password,$row_data['admin_password'])){

    echo"<script>alert('Login Successful')</script>";
    echo"<script>window.open('index.php','_self')</script>";

//     if($row_count==1 and $row_count_cart==0){
//         $_SESSION['username']=$user_username;
//         echo"<script>alert('Login Successful')</script>";
//         echo"<script>window.open('profile.php','_self')</script>";
        
//     }else{
//         $_SESSION['username']=$user_username;
//         echo"<script>alert('Login Successful')</script>";
//         echo"<script>window.open('payment.php','_self')</script>";

//     }

}else{
 echo"<script>alert('Invalid Credentials')</script>";
}
 }else{
    echo"<script>alert('Invalid Credentials')</script>";
  }
}



?>