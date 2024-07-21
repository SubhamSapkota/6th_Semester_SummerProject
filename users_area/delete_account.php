<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-success mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-4">
        <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account" >
        </div>
        <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="NO!" >
        </div>
        
    </form>
</body>
</html>

<!-- php code to delete user account -->
<?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="Delete from `user_table` where username='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo"<script>alert('account deleted successfully')</script>";
        echo"<script>window.open('../Product.php','_self')</script>";
    }
    
}

if(isset($_POST['dont_delete'])){
    echo"<script>window.open('profile.php','_self')</script>";


}
?>