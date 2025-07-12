<?php
include('includes/connection.php'); 

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

// For Insert Products

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_product'])) {

    $Pname = $_POST['product_name'];
    $Pprice = $_POST['product_price'];
    $Pcat = $_POST['product_category'];
    $Pdesc = $_POST['product_description'];
    $Pstock = $_POST['product_stock']; 

    $imagename = $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];
    $uploadDir = "../../../images";
    $newimageName = "";

    if (!empty($imagename)) {
        $imageExt = pathinfo($imagename, PATHINFO_EXTENSION);
        $newimageName = uniqid("prd_", true) . "." . $imageExt;
        $uploadPath = $uploadDir . "/" . $newimageName;

        move_uploaded_file($tmp_name, $uploadPath);
    }

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image, category_id, stock) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissi", $Pname, $Pdesc, $Pprice, $newimageName, $Pcat, $Pstock);

    if ($stmt->execute()) {
        echo "<script>alert('Product added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add product: " . $stmt->error . "');</script>";
    }

    $stmt->close();
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
  <div class="card mt-5 mx-5">
    <div class="card-body p-5">
      <h4 class="mb-5">Add Products</h4>
      <form method="POST" enctype="multipart/form-data">
        <div class="row">
        
          <!-- Product Name -->
          <div class="col-md-6">
            <label class="form-label mb-2" for="product_name">Product Name</label>
            <input placeholder="Enter product name" type="text" name="product_name" class="form-control mb-3" id="product_name">
          </div>

          <!-- Product Category -->
          <div class="col-md-6">
            <label class="form-label mb-2" for="category">Product Category</label>
            <select name="product_category" class="form-control mb-3" id="category">
              <option selected disabled value="">Select Category</option>
              <?php foreach ($category as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Product Price -->
          <div class="col-md-6">
            <label class="form-label mb-2" for="product_price">Product Price</label>
            <input placeholder="Enter price" type="number" name="product_price" class="form-control mb-3" id="product_price">
          </div>

            <!-- Product Stock -->
          <div class="col-md-6">
            <label class="form-label mb-2" for="product_stock">Product Stock</label>
            <input placeholder="Enter available stock" type="number" name="product_stock" class="form-control mb-3" id="product_stock" min="0">
          </div>

          <!-- Product Image -->
          <div class="col-md-6">
            <label class="form-label mb-2" for="product_image">Product Image</label>
            <input type="file" name="product_image" class="form-control mb-3" id="product_image">
          </div>

          <!-- Product Description -->
          <div class="col-md-12">
            <label class="form-label mb-2" for="product_description">Product Description</label>
            <textarea rows="5" name="product_description" id="product_description" class="form-control mb-1" placeholder="Write product description..."></textarea>
          </div>

          <!-- Submit Button -->
          <div class="col-md-12 mt-4">
            <button type="submit" name="add_product" class="btn btn-primary w-100">Add Product</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>