<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];

//select from database
$select_query="Select * from `brands` where brand_title='$brand_title'";
$result_select=mysqli_query($con,$select_query);
$number=mysqli_num_rows($result_select);
if ($number>0) {
 echo"<script>alert('This brand is already present inside the database')</script>";
}else{

  $insert_query="insert into `brands` (brand_title) values('$brand_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo"<script>alert('brand has been inserted successfully')</script>";
  }
}}
?>
<h2 class="text-center">Insert Brand</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2 ">
  <span class="input-group-text">@</span>
    <input type="text" class="form-control" id="floatingInputGroup1" name="brand_title" placeholder="Insert Brand"
    aria-label="brand" aria-describedby="basic-addon">

</div>
<div class="input-group w-10 mb-2 ">
  
    <input type="submit" class="form-control bg-black text-white b-0 p-2 my-3" id="floatingInputGroup1" name="insert_brand" value="Insert Brand" autocomplete="off" required="required" >

</div>
</form>