<?Php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['description'];
    $product_keywords=$_POST['product_keyword'];
    $product_category=$_POST['product_categories'];
    $product_brand=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    
    // accessing image temporary name 
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    // checking empty condition
    // if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or 
    // $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
    //     echo"<script>alert('Please fill all the available feilds!')</script>";
    //     exit();
    // }
    //select query
$select_query="Select * from `products` where product_title='$product_title'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
 if($rows_count>0){
    echo "<script>alert('Same product already exist.')</script>";
    
} 
else if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or 
$product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
    echo"<script>alert('Please fill all the available feilds!')</script>";
    exit();
}
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        // insert query
        $insert_product="Insert into `products`(product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status)
        values('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_product);
        if($result_query){
            echo"<script>alert('Successfully Inserted Product')</script>";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert products-Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_tile" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
                <span class="text-danger">&#40; Enter proper product title. &#41;</span>
            </div>

            <!-- Description -->
            <div class="form-outline mb-4">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
                <span class="text-danger">&#40; Enter proper product description. &#41;</span>
            </div>

            <!-- Product keyword -->
            <div class="form-outline mb-4">
                <label for="product_keyword" class="form-label">Product Keyword </label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product keyword " autocomplete="off" required="required">
            </div>

            <!-- categories -->
            <div class="form-outline mb-4">
                <select name="product_categories" id="product_categories" class="form-select" required="required">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query="Select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo"<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                    
                </select>

            </div>
            <!-- brands-->
            <div class="form-outline mb-4">
                <select name="product_brands" id="product_brands" class="form-select" required="required">
                    <option value="">Select a Brand</option>
                    <?php
                    $select_query="Select * from `brands`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo"<option value='$brand_id'>$brand_title</option>";
                    }
                    
                    
                    ?>
                    
                </select>

                <!-- Product Image1 -->
                <div class="form-outline mb-4">
                    <label for="product_image1" class="form-label">Product Image1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                </div>
                <!-- Product Image2 -->
                <div class="form-outline mb-4">
                    <label for="product_image2" class="form-label">Product Image2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
                </div>
                <!-- Product Image3 -->
                <div class="form-outline mb-4">
                    <label for="product_image3" class="form-label">Product Image3</label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
                </div>


                <!-- Product price-->
                <div class="form-outline mb-4">
                    <label for="product_price" class="form-label">Product Price </label>
                    <input type="number" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price " autocomplete="off" required="required"
                    min="1" max="999999" oninput="validity.valid||(value='');">
                </div>
                

                <!-- Product inserting-->
                <div class="form-outline mb-4">
                    <input type="submit" name="insert_product" class="btn btn-info mb3 px-3" value="Insert Product">
                </div>



            </div>
        </form>
    </div>


</body>

</html>