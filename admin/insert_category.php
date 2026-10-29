<?php
include('../includes/connect.php');

// Insert Query
if(isset($_POST['insert_cat'])) {
    $cat_name = $_POST['cat_title'];
    $insert_Query = "INSERT INTO `cat_tb`(cat_name) VALUES('$cat_name')";
    $run_insert_Query = mysqli_query($con, $insert_Query);
    if($run_insert_Query) {
        echo "<script> alert('Category Inserted Successfully!') </script>";
    }
}

// Edit Query
if(isset($_POST['edit_cat'])) {
    $cat_id = $_POST['cat_id'];
    $new_cat_name = $_POST['cat_name'];
    $update_Query = "UPDATE `cat_tb` SET cat_name = '$new_cat_name' WHERE cat_id = $cat_id";
    $run_update_Query = mysqli_query($con, $update_Query);
    if($run_update_Query) {
        echo "<script> alert('Category Updated Successfully!') </script>";
    }
}

// Delete Query
if(isset($_GET['delete'])) {
    $cat_id = $_GET['delete'];
    $delete_Query = "DELETE FROM `cat_tb` WHERE cat_id = $cat_id";
    $run_delete_Query = mysqli_query($con, $delete_Query);
    if($run_delete_Query) {
        echo "<script> alert('Category Deleted Successfully!') </script>";
    }
}

// Fetch All Categories
$fetch_categories = "SELECT * FROM `cat_tb`";
$run_categories = mysqli_query($con, $fetch_categories);
?>

<!-- Insert Category Form -->
<form method="POST" action="">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-layer-group"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Type the category name here" aria-label="Category Name" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <button name="insert_cat" class="btn btn-primary">Insert Category</button>
    </div>
</form>

<!-- Categories Table -->
<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($run_categories)) { ?>
            <tr>
                <td><?php echo $row['cat_id']; ?></td>
                <td>
                    <!-- Edit Form -->
                    <form method="POST" action="">
                        <input type="hidden" name="cat_id" value="<?php echo $row['cat_id']; ?>">
                        <input type="text" name="cat_name" value="<?php echo $row['cat_name']; ?>" class="form-control" required>
                        <button type="submit" name="edit_cat" class="btn btn-warning btn-sm">Edit</button>
                    </form>
                </td>
                <td>
                    <!-- Delete Link -->
                    <a href="?delete=<?php echo $row['cat_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
