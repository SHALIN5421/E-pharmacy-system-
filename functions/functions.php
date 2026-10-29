<!--hover.css animation-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">


<?php
// include the connect.php file
include('./includes/connect.php');

// get products function
function getProducts(){
	global $con;

	if(!isset($_GET['cat_id'])){
		if(!isset($_GET['brand_id'])){	
			$select_Query = "SELECT * FROM `product_tb` ORDER BY rand()";
			$run_select_Query = mysqli_query($con, $select_Query);

			while($row=mysqli_fetch_assoc($run_select_Query)){
			  $product_id = $row['product_id'];
			  $product_name = $row['product_name'];
			  $product_detail = $row['product_detail'];
			  $product_image = $row['product_image1'];
			  $product_price = $row['product_price'];

			  echo " 
			<!-- Card: Start-->
			<div class='col-md-4 mb-2'> 
			  <div class='card h-100 card hvr-grow' style='width: 18rem;background-color: #eef4fb;'>
			      <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
			          <div class='card-body'>
			              <h5 class='card-title'>$product_name</h5>
			              <p class='card-text'>$product_detail</p>
			              <h5>Rs. $product_price </h5>
			              <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>More details</a>
		              	  <a href='index.php?add_to_cart=$product_id' class='btn btn-success hvr-pop'>Add to cart</a>
			          </div>
			    </div>
			</div> 
			<!-- Card: End -->";
			}
		}
	}
}

// get Unique Categories
function getUniqueCategory(){
	global $con;

	// check isset condition	
	if(isset($_GET['cat_id'])){
		$cat_id = $_GET['cat_id'];
		$select_Query = "SELECT * FROM `product_tb` WHERE cat_id=$cat_id ORDER BY rand()";
		$run_select_Query = mysqli_query($con, $select_Query);
		$row_count = mysqli_num_rows($run_select_Query);
			if($row_count == 0){
				echo "<h3 class='text-danger text-center'> No Stock Available </h3>";
			}

		while($row=mysqli_fetch_assoc($run_select_Query)){
		  $product_id = $row['product_id'];
		  $product_name = $row['product_name'];
		  $product_detail = $row['product_detail'];
		  $product_image = $row['product_image1'];
		  $product_price = $row['product_price'];

		  echo " 
		<!-- Card: Start-->
		<div class='col-md-4 mb-3'> 
		  <div class='card h-100' style='width: 18rem; background-color: #eef4fb;'>
		      <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
		          <div class='card-body'>
		              <h5 class='card-title'>$product_name</h5>
		              <p class='card-text'>$product_detail</p>
		              <h5>Rs. $product_price </h5>
		              <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>More details</a>
		              <a href='index.php?add_to_cart=$product_id' class='btn btn-success hvr-pop'>Add to cart</a>
			          </div>
		    </div>
		</div> 
		<!-- Card: End -->";
		}
	}
}

// get Unique Brands
function getUniqueBrand(){
	global $con;

	// check isset condition	
	if(isset($_GET['brand_id'])){
		$brand_id = $_GET['brand_id'];
		$select_Query = "SELECT * FROM `product_tb` WHERE brand_id=$brand_id ORDER BY rand()";
		$run_select_Query = mysqli_query($con, $select_Query);
		$row_count = mysqli_num_rows($run_select_Query);
			if($row_count == 0){
				echo "<h3 class='text-danger text-center'> No Stock Available </h3>";
			}
			
		while($row=mysqli_fetch_assoc($run_select_Query)){
		  $product_id = $row['product_id'];
		  $product_name = $row['product_name'];
		  $product_detail = $row['product_detail'];
		  $product_image = $row['product_image1'];
		  $product_price = $row['product_price'];

		  echo " 
			<!-- Card: Start-->
			<div class='col-md-4 mb-3'> 
			  <div class='card h-100' style='width: 18rem; background-color: #eef4fb;' >
			      <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
			          <div class='card-body'>
			              <h5 class='card-title'>$product_name</h5>
			              <p class='card-text'>$product_detail</p>
			              <h5>Rs. $product_price </h5>
			              <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>More details</a>
			              <a href='index.php?add_to_cart=$product_id' class='btn btn-success hvr-pop'>Add to cart</a>
			          </div>
			    </div>
			</div> 
			<!-- Card: End -->";
		}
	}
}


// get Categories
function getCat(){
	global $con;
	$select_cat = "SELECT * FROM `cat_tb`";
	$run_select_cat=mysqli_query($con, $select_cat);

	while ($row_data=mysqli_fetch_assoc($run_select_cat)) {
	$cat_name = $row_data['cat_name'];
	$cat_id = $row_data['cat_id'];
	echo "
	<li class='nav-item'>  <a class='nav-link active' href='index.php?cat_id=$cat_id'> $cat_name </a></li>
	";
	}
}

// get Brands
function getBrand(){
	global $con;
	$select_brands = "SELECT * FROM `brand_tb`";
	$run_select_brands=mysqli_query($con, $select_brands);

	while ($row_data=mysqli_fetch_assoc($run_select_brands)) {
	$brand_name = $row_data['brand_name'];
	$brand_id = $row_data['brand_id'];
	echo "
	<li class='nav-item'>  <a class='nav-link active' href='index.php?brand_id=$brand_id'> $brand_name </a></li>
	";
	}
}

// view Details
function moreDetails(){
	global $con;

	if(isset($_GET['product_id'])){	
		if(!isset($_GET['cat_id'])){
			if(!isset($_GET['brand_id'])){
				$product_id = $_GET['product_id'];	
				$select_Query = "SELECT * FROM `product_tb` WHERE product_id=$product_id";
				$run_select_Query = mysqli_query($con, $select_Query);

				while($row=mysqli_fetch_assoc($run_select_Query)){
				  $product_id = $row['product_id'];
				  $product_name = $row['product_name'];
				  $product_detail = $row['product_detail'];
				  $product_image = $row['product_image1'];
				  $product_image2= $row['product_image2'];
				  $product_price = $row['product_price'];

				  echo " 
				<div class='col-md-4'>
                	<!-- Card: Start-->
                  	<div class='col-md-4 mb-3' data-aos='zoom-in-up'> 
	                    <div class='card' style='width: 18rem;'>
	                        <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
	                            <div class='card-body'>
	                                <h5 class='card-title'>$product_name</h5>
	                                <p class='card-text'>$product_detail</p>
	                                <h5>Rs. $product_price </h5>
	                                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
			          </div>
	                    </div>
                  </div> 
                <!-- Card: End -->
            	</div>

	            <div class='col-md-8'>
	              <div class='row'>
	                <div class='col-md-12' data-aos='flip-down'>
	                  <h4> Related Images</h4>
	                    <div class='col-md-6'>
	                      <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
	                    </div>

	                    <div class='col-md-6'>
	                      <img src='./admin/product_images/$product_image2' class='card-img-top' alt='...'>
	                    </div>
	                </div>
	              </div>
	            </div>";
				}
			}
		}
	}
}


// get IP Address 
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        // IP from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        // IP passed from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Most reliable IP, if no proxy
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getUserIpAddr();
// echo 'User Real IP - ' . getUserIpAddr();

//Cart Function
function cart(){
if(isset($_GET['add_to_cart'])){
	global $con;

	$ip = getUserIpAddr();
	$get_product_id = $_GET['add_to_cart'];

	$select_Query = "SELECT * FROM `cart_details` WHERE ip_address='$ip' AND product_id=$get_product_id";
	$run_select_Query = mysqli_query($con, $select_Query);
	$num_of_rows = mysqli_num_rows($run_select_Query);
	if($num_of_rows>0){
			echo "<script>alert('This item is alerady in the cart')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
		else{
			$insert_query = "INSERT INTO `cart_details`(product_id, ip_address, quantity) VALUES($get_product_id, '$ip',0)";
			$run_insert_query = mysqli_query($con, $insert_query);
			echo "<script>window.open('index.php','_self')</script>";
		}

	}
}

function count_cart_items(){
	global $con;
	$ip = getUserIpAddr();
		
	$select_Query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
	$run_select_Query = mysqli_query($con, $select_Query);
	
	if($run_select_Query){
		$num_of_rows = mysqli_num_rows($run_select_Query);
		return $num_of_rows;
	}

	return 0;
}
$count = count_cart_items();
?>

<?php
function get_cart_total() {
    global $con;

    $ip = getUserIpAddr(); // your existing function to get user's IP
    $grand_total = 0;

    $fetch_cart = "
    SELECT cart_details.quantity, product_tb.product_price
    FROM cart_details
    JOIN product_tb ON cart_details.product_id = product_tb.product_id
    WHERE cart_details.ip_address='$ip'
    ";

    $run_cart = mysqli_query($con, $fetch_cart);
    if($run_cart){
        while($row = mysqli_fetch_assoc($run_cart)){
            $grand_total += $row['product_price'] * $row['quantity'];
        }
    }

    return $grand_total;
}
?>
