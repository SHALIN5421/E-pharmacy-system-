<?php
include('../includes/connect.php');

// Insert Query
if(isset($_POST['insert_brand'])) {
    $brand_name = $_POST['brand_title'];
    $insert_Query = "INSERT INTO `brand_tb`(brand_name) VALUES('$brand_name')";
    $run_insert_Query = mysqli_query($con, $insert_Query);
    if($run_insert_Query) {
        echo "<script> alert('Brand Inserted Successfully!') </script>";
    }
}

// Edit Query
if(isset($_POST['edit_brand'])) {
    $brand_id = $_POST['brand_id'];
    $new_brand_name = $_POST['brand_name'];
    $update_Query = "UPDATE `brand_tb` SET brand_name = '$new_brand_name' WHERE brand_id = $brand_id";
    $run_update_Query = mysqli_query($con, $update_Query);
    if($run_update_Query) {
        echo "<script> alert('Brand Updated Successfully!') </script>";
    }
}

// Delete Query
if(isset($_GET['delete'])) {
    $brand_id = $_GET['delete'];
    $delete_Query = "DELETE FROM `brand_tb` WHERE brand_id = $brand_id";
    $run_delete_Query = mysqli_query($con, $delete_Query);
    if($run_delete_Query) {
        echo "<script> alert('Brand Deleted Successfully!') </script>";
    }
}

// Fetch All Brands
$fetch_brands = "SELECT * FROM `brand_tb`";
$run_brands = mysqli_query($con, $fetch_brands);
?>

<!-- Insert Brand Form -->
<form method="POST" action="">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tag"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Type the brand name here" aria-label="Brand Name" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <button name="insert_brand" class="btn btn-primary">Insert Brand</button>
    </div>
</form>

<!-- Brands Table -->
<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Brand ID</th>
            <th>Brand Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($run_brands)) { ?>
            <tr>
                <td><?php echo $row['brand_id']; ?></td>
                <td>
                    <!-- Edit Form -->
                    <form method="POST" action="">
                        <input type="hidden" name="brand_id" value="<?php echo $row['brand_id']; ?>">
                        <input type="text" name="brand_name" value="<?php echo $row['brand_name']; ?>" class="form-control" required>
                        <button type="submit" name="edit_brand" class="btn btn-warning btn-sm">Edit</button>
                    </form>
                </td>
                <td>
                    <!-- Delete Link -->
                    <a href="?delete=<?php echo $row['brand_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this brand?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
