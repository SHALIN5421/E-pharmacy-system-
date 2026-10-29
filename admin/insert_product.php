<?php
include('../includes/connect.php');

// Insert Query
if(isset($_POST['insert_product'])) {
   $product_name = $_POST['product_name'];
   $product_detail = $_POST['product_detail'];
   $product_keyword = $_POST['product_keyword'];
   $product_cat = $_POST['product_cat'];
   $product_brand = $_POST['product_brand'];
   $product_price = $_POST['product_price'];

   // Product Image Area
   $product_image1 = $_FILES['product_image1']['name'];
   $product_image2 = $_FILES['product_image2']['name'];

   // Product Image Tmp Name Area
   $tmp_product_image1 = $_FILES['product_image1']['tmp_name'];
   $tmp_product_image2 = $_FILES['product_image2']['tmp_name'];

   // Check for empty conditions
   if($product_name == '' or $product_detail == '' or $product_keyword == '' or $product_cat == '' or $product_brand == '' or $product_price == '' or $product_image1 == '' or $product_image2 == ''){
    echo "<script> alert('Please fill all the available fields.')</script>";
    exit();
   }
   else{
    move_uploaded_file($tmp_product_image1, "./product_images/$product_image1");
    move_uploaded_file($tmp_product_image2, "./product_images/$product_image2");

    $insert_query = "INSERT INTO `products_tb`(`product_name`, `product_detail`, `product_keyword`, `cat_id`, `brand_id`, `product_image1`, `product_image2`, `product_price`, `date`) VALUES ('$product_name', '$product_detail', '$product_keyword', $product_cat, $product_brand,'$product_image1', '$product_image2','$product_price',NOW())";

    $run_insert_Query = mysqli_query($con, $insert_query);
    if($run_insert_Query){
        echo "<script>alert('Product Inserted Successfully')</script>";
    }
   }
   
}
?>

<!-- Insert Product Form -->
<form method="POST" action="" enctype="multipart/form-data">
    <!--  Product Name -->
    <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-staff-snake"></i></span>
        <input type="text" class="form-control" name="product_name" placeholder="Type the product name here" aria-label="Product Name" aria-describedby="basic-addon1" required="required">
    </div>

    <!-- Product Description -->
    <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-alt"></i></span>
        <input type="text" class="form-control" name="product_detail" placeholder="Type the product details here" aria-label="Product Detail" aria-describedby="basic-addon1" required="required">
    </div>

    <!-- Product Keyword -->
    <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tags"></i></span>
        <input type="text" class="form-control" name="product_keyword" placeholder="Type the product keywords here" aria-label="Product Keyword" aria-describedby="basic-addon1" required="required">
    </div>

    <!-- Product Category -->
    <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-layer-group"></i></span>
        <select name="product_cat" id="" class="form-select">
            <option value="">Select a category</option>
             <?php
                $select_cat = "SELECT * FROM `cat_tb`";
                $run_select_cat=mysqli_query($con, $select_cat);

                while ($row_data=mysqli_fetch_assoc($run_select_cat)) {
                  $cat_name = $row_data['cat_name'];
                  $cat_id = $row_data['cat_id'];
                  echo "<option value='$cat_id'> $cat_name </option>";
            }
          ?>
        </select>
    </div>

    <!-- Product Brands -->
    <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-registered"></i></span>
        <select name="product_brand" id="" class="form-select">
            <option value="">Select a brand</option>

             <?php
                $select_brand = "SELECT * FROM `brand_tb`";
                $run_select_brand=mysqli_query($con, $select_brand);

                while ($row_data=mysqli_fetch_assoc($run_select_brand)) {
                  $brand_name = $row_data['brand_name'];
                  $brand_id = $row_data['brand_id'];
                  echo "<option value='$brand_id'> $brand_name </option>";
            }
          ?>
        </select>
    </div>

     <!-- Product Image 1 -->
    <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-image"></i></span>
        <input type="file" class="form-control" name="product_image1" required="required">
    </div>

    <!-- Product Image 2 -->
    <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-images"></i></span>
        <input type="file" class="form-control" name="product_image2" required="required">
    </div>

    <!-- Product Price -->
    <div class="input-group mb-3 w-50">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-money-bill-wave"></i></span>
        <input type="text" class="form-control" name="product_price" placeholder="Type the product price here" aria-label="Product Price" aria-describedby="basic-addon1" required="required">
    </div>

    <div class="input-group mb-3">
        <button name="insert_product" class="btn btn-primary">Insert Product</button>
    </div>
</form>
 
