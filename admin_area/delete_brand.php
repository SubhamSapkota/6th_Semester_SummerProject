<?php
if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];
    $delete_brand="Delete from `brands` where brand_id=$delete_id";
    $result_product=mysqli_query($con,$delete_brand);
    if($result_product){
        echo"<script>alert('Brand deleted successfully')</script>";
        echo"<script>window.open('./index.php?view_brands','_self')</script>";
   
    }
}


?>