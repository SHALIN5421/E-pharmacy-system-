<?php
   include('./includes/connect.php');
   include('./functions/functions.php');
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>ePaharmacy</title>
      <!-- Bootsrtrap v5.3.8 CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <!-- Font awesome icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="./css/style.css">
   </head>
   <body>
      <!-- Navbar Area: START -->
      <nav class="navbar navbar-expand-lg" style="background-color: #1886fcff;" data-bs-theme="dark">
         <div class="container-fluid">
            <a class="navbar-brand px-3" href="#"><img src="./images/main_logo_white 1.png" width="42"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="http://localhost/WEBB8SYS/">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="http://localhost/WEBB8SYS/admin/">Admin</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="cart_details.php?product_id=$product_id"><i class="fa-solid fa-cart-shopping"></i> <sup><?php  $cart_count = count_cart_items(); echo "$cart_count";?></sup></a>
                  </li>
                  <li class="nav-item">
                     <?php $grand_total_nav = get_cart_total(); ?>
                     <a class="nav-link active" href="cart_details.php">
                     Total (Rs.): <?php echo $grand_total_nav; ?>
                     </a>
                  </li>
               </ul>
               <form class="d-flex " role="search">
                  <input class="form-control me-2" style="background-color:#eaf4ff;" type="search" placeholder="Search" aria-label="Search"/>
                  <button class="btn btn-outline-info" type="submit">Search</button>
               </form>
            </div>
         </div>
      </nav>
      <!-- Navbar Area: END -->
      <!-- Calling the cart function -->
      <?php
         cart();
         ?>
      <div class="bg-light">
      <h1 class="text-center"> My Cart </h1>
      <div class="bg-light">
         <?php
            include('./includes/connect.php');
            
            /* Delete Cart Item */
            if(isset($_GET['delete'])) {
                $product_id = $_GET['delete'];
                $delete_query = "DELETE FROM cart_details WHERE product_id = $product_id";
                $run_delete = mysqli_query($con, $delete_query);
            
                if($run_delete){
                    echo "<script>alert('Item removed from cart');</script>";
                }
            }
            
            /* Fetch Cart Details with Product Info */
            $fetch_cart = "
            SELECT cart_details.product_id,
                   cart_details.quantity,
                   product_tb.product_name,
                   product_tb.product_price,
                   product_tb.product_image1
            FROM cart_details
            JOIN product_tb ON cart_details.product_id = product_tb.product_id
            ";
            
            $run_cart = mysqli_query($con, $fetch_cart);
            
            
            // Increase quantity
            if(isset($_GET['increase'])){
                $product_id = $_GET['increase'];
                $update_query = "UPDATE cart_details SET quantity = quantity + 1 WHERE product_id = $product_id";
                mysqli_query($con, $update_query);
                echo "<script>window.open('cart_details.php','_self')</script>";
            }
            
            // Decrease quantity
            if(isset($_GET['decrease'])){
                $product_id = $_GET['decrease'];
                // Don't allow quantity < 1
                $update_query = "UPDATE cart_details SET quantity = quantity - 1 WHERE product_id = $product_id AND quantity > 1";
                mysqli_query($con, $update_query);
                echo "<script>window.open('cart_details.php','_self')</script>";
            }
            
            
            ?>
         <!-- Cart Table -->
         <table class="table mt-4 text-center">
            <thead>
               <tr>
                  <th class="text-primary">Product Image</th>
                  <th class="text-primary">Product Name</th>
                  <th class="text-primary">Price</th>
                  <th class="text-primary">Quantity</th>
                  <th class="text-primary">Total</th>
                  <th class="text-primary">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php while($row = mysqli_fetch_assoc($run_cart)) { ?>
               <tr>
                  <td>
                     <img src="./admin/product_images/<?php echo $row['product_image1']; ?>"
                        width="70" height="70" style="object-fit:cover;">
                  </td>
                  <td><b><?php echo $row['product_name']; ?></b></td>
                  <td>Rs. <?php echo $row['product_price']; ?></td>
                  <td>
                     <a href="?decrease=<?php echo $row['product_id']; ?>" class="btn btn-warning btn-sm rounded-circle">−</a>
                     <span style="margin: 0 10px;"><?php echo $row['quantity']; ?></span>
                     <a href="?increase=<?php echo $row['product_id']; ?>" class="btn btn-success btn-sm rounded-circle">+</a>
                  </td>
                  <td>
                     Rs. <?php echo $row['product_price'] * $row['quantity']; ?>
                  </td>
                  <td>
                     <a href="?delete=<?php echo $row['product_id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Remove this item from cart?');">
                     Delete
                     </a>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
            <?php
               // Initialize grand total
               $grand_total = 0;
               
               // Fetch cart items again for total calculation
               $grand_total = get_cart_total();
               ?>
            <tfoot>
               <tr>
                  <td colspan="4" class="text-end"><strong>Grand Total:</strong></td>
                  <td colspan="2"><strong>Rs. <?php echo $grand_total; ?></strong></td>
               </tr>
            </tfoot>
         </table>
      </div>
      <!-- Footer: START -->
      <div class="container">
         <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">
               &copy; 2025 Company, Inc
            </p>
            <a
               href="/"
               class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
               aria-label="Bootstrap"
               >
               <svg class="bi me-2" width="40" height="32" aria-hidden="true">
                  <use xlink:href="#bootstrap"></use>
               </svg>
            </a>
            <ul class="nav col-md-4 justify-content-end">
               <li class="nav-item">
                  <a href="#" class="nav-link px-2 text-body-secondary">Home</a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link px-2 text-body-secondary">Features</a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link px-2 text-body-secondary">Pricing</a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link px-2 text-body-secondary">FAQs</a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link px-2 text-body-secondary">About</a>
               </li>
            </ul>
         </footer>
      </div>
      <!-- Footer: END -->
      <!-- Bootstrap v5.3.8 JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
   </body>
</html>