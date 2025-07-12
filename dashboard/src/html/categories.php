<?php
include("includes/connection.php");

// For Fetch
$category = [];
$fetch_query = "SELECT id, name, created_at FROM categories";
$fetch_stmt = $conn->prepare($fetch_query);
$fetch_stmt->execute();
$fetch_stmt->bind_result($c_id, $c_name, $created);

while ($fetch_stmt->fetch()) {
    $category[] = [
        'id' => $c_id,
        'name' => $c_name,
        'created_at' => $created
    ];
}
$fetch_stmt->close();

// For Insert Category
// Slug function
function slugify($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    return trim($text, '-');
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["category_name"]) && isset($_POST["add"])) {
    $catName = (trim($_POST["category_name"]));
    $slug = slugify($catName);

    // Image Upload 
    $target_dir = "../../../images/";
    $file_tmp = $_FILES['category_image']['tmp_name'];
    $file_name = $_FILES['category_image']['name'];

    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = uniqid("cat_", true) . '.' . $file_ext;
    $upload_path = $target_dir . $new_file_name;

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($file_tmp, $upload_path)) {
        $insert_query = "INSERT INTO categories (name, slug, image, created_at) VALUES (?, ?, ?, NOW())";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("sss", $catName, $slug, $new_file_name);

        if ($insert_stmt->execute()) {
            echo "<script>alert('Category added successfully'); window.location.href='categories.php';</script>";
        } else {
            echo "<script>alert('Failed to insert category');</script>";
        }

        $insert_stmt->close();
    } else {
        echo "<script>alert('Image upload failed');</script>";
    }
}


// For Update Category
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
    $Cat_Name = $_POST['category_name'];
    $Cat_Id = $_POST['cat_id'];

    $update_query = "UPDATE categories SET name = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);

    if (!$update_stmt) {
        die("Update Prepare failed: " . $conn->error);
    }

    $update_stmt->bind_param('si', $Cat_Name, $Cat_Id);

    if ($update_stmt->execute()) {
        echo "<script>
         alert('Category Updated Successfully');
         window.location.href = 'categories.php';
         </script>";
    } else {
        echo "Execute failed: " . $update_stmt->error;
    }

    $update_stmt->close();
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
   <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-3wRMpUjP5X5Ik+wr+Wl1c1Vx8K1nmrklQcyYGV5Q+MZ3Lbkq2w04GqIzf7JkRy4g" crossorigin="anonymous">
  <!-- Font Awesome CDN -->
   <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
</head>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo-light.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <?php
            include("includes/sidebar.php")
        ?>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
         <?php
            include("includes/header.php")
         ?>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
           <div class="d-flex justify-content-between">
            <h3>Categories</h3>
           <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add +</button>
           <!-- Insert Modal -->
            <!-- Add Category Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <input type="text" name="category_name" class="form-control mb-3" placeholder="Enter category name" required>
                    <input type="file" name="category_image" class="form-control" required accept="image/*">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                  </div>
                </form>
                </div>
            </div>
            </div>
           <!-- Insert Modal -->
           </div>
           <table class="table">
                <thead>
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Options</th>
                </thead>
                 <tbody>
                  <?php foreach ($category as $cat): ?>
            <tr>
                <td><?= $cat['id'] ?></td>
                <td><?= $cat['name'] ?></td>
                <td><?= $cat['created_at'] ?></td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#editModal<?= $cat['id'] ?>" class="text-decoration-none me-2">
                        <iconify-icon icon="mdi:pencil" width="22.5" class="text-warning"></iconify-icon>
                    </a>
                   <a href="delete_cat.php?id=<?= $cat['id'] ?>" 
                  class="text-decoration-none" 
                  onclick="return confirm('Are you sure you want to delete the category: <?= $cat['name'] ?>?')">
                  <iconify-icon icon="mdi:delete" width="22.5" class="text-danger"></iconify-icon>
                </a>
                </td>
            </tr>
    <!-- Edit Modal -->
        <div class="modal fade" id="editModal<?= $cat['id'] ?>" tabindex="-1" aria-labelledby="editLabel<?= $cat['id'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                <h5 class="modal-title" id="editLabel<?= $cat['id'] ?>">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="cat_id" value="<?= $cat['id'] ?>">
                <input type="text" name="category_name" value="<?= $cat['name'] ?>" class="form-control" required>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <?php endforeach; ?>
                </tbody>
           </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap 5 JS Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qe2wZX5vMZ/ORulPq3Y1uzN6vl7pCZcdKJzCK4wzS9ZrTI4cm+z1nCkBJ6PSWeOB" crossorigin="anonymous"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>