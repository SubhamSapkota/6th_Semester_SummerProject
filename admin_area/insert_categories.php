<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title=$_POST['cat_title'];

//select from database
$select_query="Select * from `categories` where category_title='$category_title'";
$result_select=mysqli_query($con,$select_query);
$number=mysqli_num_rows($result_select);
if ($number>0) {
 echo"<script>alert('This category is already present inside the database')</script>";
}else{

  $insert_query="insert into `categories` (category_title) values('$category_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo"<script>alert('category has been inserted successfully')</script>";
  }
}}
?>

<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2 ">
  <span class="input-group-text">@</span>
    <input type="text" class="form-control" id="floatingInputGroup1" name="cat_title" placeholder="Insert Categories"
    aria-label="categories" aria-describedby="basic-addon" required="required">

</div>
<div class="input-group w-10 mb-2 ">
  
    <input type="submit" class=" bg-black border-0 p-2 my-3 text-white" id="floatingInputGroup1" name="insert_cat" value="Insert Category"
    >

</div>
</form>