<?php
include("includes/connection.php");

// Pagination setup
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Get total count
$countQuery = $conn->query("SELECT COUNT(*) AS total FROM products"); // or your actual table
$total = $countQuery->fetch_assoc()['total'];
$pages = ceil($total / $limit);

// Fetch limited records
$query = $conn->query("SELECT * FROM products LIMIT $start, $limit");

// For Update Products
// $pro_name = $_POST['name'];
// $pro_price = $_POST['price'];
// $pro_desc = $_POST['description'];
// $pro_name = $_POST['name'];
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
        <div class="modal fade" id="editproModal<?php $pro['id'] ?>" tabindex="-1" aria-labelledby="editproModal<?php $pro['id'] ?>Label1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="editproModal<?php $pro['id'] ?>Label1">Edit Product - Example Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form action="update_product.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="1">
          
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="Example Product" class="form-control">
          </div>

          <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" value="999" class="form-control">
          </div>

          <div class="mb-3">
            <label>Stocks</label>
            <input type="number" name="stocks" class="form-control">
          </div>

          <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">This is a demo product description.</textarea>
          </div>

          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img src="https://via.placeholder.com/70" width="70" class="mt-2" />
          </div>
          
          <div class="modal-footer">
            <button type="submit" name="update_product" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- Edit Products Modal end -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <table class="table">
              
               <!-- Search & Add Button -->
               <input type="search" id="liveSearch" class="form-control w-25 mb-4" placeholder="Search products...">
                <thead>
                   <tr>
                     <th>S.no</th>
                    <th>Pro_Name</th>
                    <th>Pro_Image</th>
                    <th>Pro_Price</th>
                    <th>Pro_Description</th>
                    <th>Options</th>
                   </tr>
                </thead>
                <tbody id="productTable">
            <?php
            $i = $start + 1;
            foreach ($query as $pro) {
            ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $pro['name'] ?></td>
                <td><img src="../../../images/<?= $pro['image'] ?>" width="50" /></td>
                <td><?= $pro['price'] ?></td>
                <td><?= $pro['description'] ?></td>
                <td>
                  <!-- Edit Button -->
                  <a href="#" data-bs-toggle="modal" data-bs-target="#editproModal<?= $pro['id'] ?>" class="text-decoration-none me-2">
                    <iconify-icon icon="mdi:pencil" width="22.5" class="text-warning"></iconify-icon>
                  </a>

                  <!-- Delete Button (if needed) -->
                  <a href="delete_pro.php?id=<?= $pro['id'] ?>" class="text-decoration-none" onclick="return confirm('Delete this product?')">
                    <iconify-icon icon="mdi:delete" width="22.5" class="text-danger"></iconify-icon>
                  </a>
                </td>
              </tr>
        <!-- Edit Modal for this product -->
        <div class="modal fade" id="editproModal<?= $pro['id'] ?>" tabindex="-1" aria-labelledby="editproModalLabel<?= $pro['id'] ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <div class="modal-header">
                <h5 class="modal-title" id="editproModalLabel<?= $pro['id'] ?>">Edit Product - <?= $pro['name'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body">
                <form action="update_product.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= $pro['id'] ?>">
                  
                  <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="<?= $pro['name'] ?>" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label>Price</label>
                    <input type="number" name="price" value="<?= $pro['price'] ?>" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"><?= $pro['description'] ?></textarea>
                  </div>

                  <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="<?= $pro['image'] ?>" width="70" class="mt-2" />
                  </div>

                  <div class="modal-footer">
                    <button type="submit" name="update_product" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      <?php } ?>
      </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
          <nav>
            <ul class="pagination">
              <?php if($page > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
              <?php endif; ?>

              <?php for($i = 1; $i <= $pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                  <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
              <?php endfor; ?>

              <?php if($page < $pages): ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  const searchInput = document.getElementById("liveSearch");
  const tableRows = document.querySelectorAll("#productTable tr");

  searchInput.addEventListener("keyup", function () {
    const searchValue = this.value.toLowerCase();

    tableRows.forEach((row) => {
      const rowText = row.textContent.toLowerCase();
      row.style.display = rowText.includes(searchValue) ? "" : "none";
    });
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