<?php
include("includes/connection.php");
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
       <!-- Edit Modal for each product -->
      <div class="container py-5">
  <div class="card shadow">
    <div class=" bg-primary text-white">
      <h5 class="mb-0">Upload Banner</h5>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">

         <!-- Banner Position -->
        <div class="mb-4">
          <label for="position" class="form-label">Banner Position</label>
          <select class="form-select" id="position" name="position">
            <option value="1">Banner 1</option>
            <option value="2">Banner 2</option>
            <option value="3">Banner 3</option>
          </select>
        </div>

        <!-- Image -->
        <div class="mb-3">
          <label for="image" class="form-label">Banner Image</label>
          <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <!-- Sub Title -->
        <div class="mb-3">
          <label for="sub_title" class="form-label">Sub Title</label>
          <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="100% Natural">
        </div>

        <!-- Title -->
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Fresh Juice">
        </div>

        <!-- Description -->
        <div class="mb-3" id="description-group">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" placeholder="Yahan likho kuch short detail"></textarea>
        </div>

        <!-- Button Text -->
        <div class="mb-3">
          <label for="button_text" class="form-label">Button Text</label>
          <input type="text" class="form-control" id="button_text" name="button_text" value="Shop Collection">
        </div>

        <!-- Button Link -->
        <div class="mb-3">
          <label for="button_link" class="form-label">Button Link</label>
          <input type="text" class="form-control" id="button_link" name="button_link" value="products.php?slug=juices">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Upload Banner</button>
      </form>
    </div>
  </div>
</div>
  </div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sub_title = htmlspecialchars(trim($_POST['sub_title']));
    $title = trim($_POST['title']);
    $button_text = htmlspecialchars(trim($_POST['button_text']));
    $button_link = htmlspecialchars(trim($_POST['button_link']));
    $position = (int) $_POST['position'];

    $description = '';
    if ($position == 1 && isset($_POST['description'])) {
        $description = htmlspecialchars(trim($_POST['description']));
    }

    if ($position == 2 || $position == 3) {
        $check = $conn->prepare("SELECT id FROM banners WHERE position = ?");
        $check->bind_param("i", $position);
        $check->execute();
        $check_result = $check->get_result();

        if ($check_result->num_rows > 0) {
            echo "<script>alert('Banner $position already exists. Please update it instead.'); window.location.href='banners.php';</script>";
            exit;
        }
        $check->close();
    }

    // image upload
    $target_dir = "../../../images/";
    $image_name = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    $new_image_name = uniqid("banner_", true) . "." . $ext;
    $target_file = $target_dir . $new_image_name;

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($tmp_name, $target_file)) {
        $stmt = $conn->prepare("INSERT INTO banners (image, sub_title, title, description, button_text, button_link, position, created_at) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssssssi", $new_image_name, $sub_title, $title, $description, $button_text, $button_link, $position);

        if ($stmt->execute()) {
            echo "<script>alert('Banner uploaded successfully!'); window.location.href='banners.php';</script>";
        } else {
            echo "<script>alert('Database insertion failed!');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Image upload failed');</script>";
    }
}
?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const positionSelect = document.getElementById('position');
    const descriptionGroup = document.getElementById('description-group');

    function toggleDescription() {
      const selectedValue = positionSelect.value;
      if (selectedValue === '1') {
        descriptionGroup.style.display = 'block';
      } else {
        descriptionGroup.style.display = 'none';
      }
    }

    toggleDescription();

    positionSelect.addEventListener('change', toggleDescription);
  });
</script>

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>