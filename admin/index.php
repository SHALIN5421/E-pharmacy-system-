<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ePaharmacy - Admin Panel</title>

    <!-- Bootsrtrap v5.3.8 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body>
   <div class="container-fluid p-0">
    <!-- Navbar: START -->
     <nav class="navbar navbar-expand-lg" style="background-color: #057dfc;" data-bs-theme="dark">
        <div class="container-fluid">
          <img src="../images/main_logo_white.png" width="5%">
        </div>
      </nav>
    <!-- Navbar: END -->

    <!-- Admin options area: START -->
    <div class="row">
      <div class="col-md-12 bg-secondary p-1">
        <div class="button text-center p-2">
          <button class="p-2">
            <a href="index.php?insert_product" class="nav-link">
              Add Product
            </a>
          </button>

          <button class="p-2">
            <a href="index.php?insert_brand" class="nav-link">
              Add Brand
            </a>
          </button>

          <button class="p-2">
            <a href="index.php?insert_category" class="nav-link">
              Add Category
            </a>
          </button>
        </div>
      </div>
    </div>
    <!-- Admin options area: END -->
   </div>
   

   <div class="container my-5">
     <?php
      if(isset($_GET['insert_brand'])){
        include('./insert_brand.php');
      }

      if(isset($_GET['insert_category'])){
        include('./insert_category.php');
      }

      if(isset($_GET['insert_product'])){
        include('./insert_product.php');
      }
     ?>
   </div>

    <!-- Bootstrap v5.3.8 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>