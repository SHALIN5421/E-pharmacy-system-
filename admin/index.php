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
          <img src="../images/main_logo_white 1.png" width="42">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="http://localhost/WEBB8SYS/">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#">Admin</a>
                </li>
                
              </ul>
              <form class="d-flex " role="search">
                <input class="form-control me-2" style="background-color:#eaf4ff;" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-info" type="submit">Search</button>
              </form>
            </div>
        </div>
      </nav>
    <!-- Navbar: END -->

    

    <!-- Admin options area: START -->
     <div class="row">
      <div class="col-md-12 p-1" style="background-color:#cdf7f6">
        <div class="button text-center p-2">
    <div class="btn-group" role="group" aria-label="Basic outlined example">
  <button type="button" class="btn btn-outline-primary"><a href="index.php?insert_product" class="nav-link">
    Add Product
  </a></button>
  <button type="button" class="btn btn-outline-primary"><a href="index.php?insert_brand" class="nav-link">
    Add Brand
</a></button>
  <button type="button" class="btn btn-outline-primary"> <a href="index.php?insert_category" class="nav-link">
    Add Category
</a></button>
</div>
</div>
</div>
</div>
    <!-- Admin options area: END -->
   
   

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