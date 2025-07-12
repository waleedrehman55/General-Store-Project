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
        <div class="card">
          <div class="card-body">
            <div class="mb-3 d-flex justify-content-between">
            <input type="search" id="searchInput" class="form-control w-25 mb-4" placeholder="Search order...">
            <div class="col-md-2">
              <select class="form-control text-center" id="statusFilter">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
                <option value="returned">Returned</option>
                <option value="refunded">Refunded</option>
                </select>
            </div>
            </div>
            <?php
            include("includes/connection.php");

            $limit = 10;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            $sql = "SELECT COUNT(*) as total FROM orders JOIN shipping_details ON orders.id = shipping_details.order_id";
            $total_result = $conn->query($sql)->fetch_assoc();
            $total_pages = ceil($total_result['total'] / $limit);

            $query = "SELECT 
                orders.id AS order_id,
                orders.user_id,
                orders.total_amount,
                orders.status,
                orders.created_at,
                shipping_details.full_name,
                shipping_details.address,
                shipping_details.city,
                shipping_details.zip_code,
                shipping_details.phone
            FROM orders
            JOIN shipping_details ON orders.id = shipping_details.order_id
            LIMIT ?, ?";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $offset, $limit);
            $stmt->execute();
            $result = $stmt->get_result();
            ?>

        <table class="table" id="orderTable">
        <thead>
            <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Zip Code</th>
            <th>Phone</th>
            <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['order_id'] ?></td>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['total_amount'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['full_name'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['zip_code'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-end">
        <nav>
            <ul class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            </ul>
        </nav>
        </div>

        <?php $stmt->close(); $conn->close(); ?>
                </div>
                </div>
            </div>
            </div>
        </div>

  <script>
  const searchInput = document.getElementById('searchInput');
  const statusFilter = document.getElementById('statusFilter');
  const rows = document.querySelectorAll('tbody tr');

  function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    const selectedStatus = statusFilter.value.toLowerCase();

    rows.forEach(row => {
      const rowText = row.innerText.toLowerCase();
      const statusText = row.children[3].innerText.toLowerCase(); // 4th column is status

      const matchesSearch = rowText.includes(searchValue);
      const matchesStatus = selectedStatus === "" || statusText === selectedStatus;

      row.style.display = matchesSearch && matchesStatus ? "" : "none";
    });
  }

  searchInput.addEventListener('keyup', filterTable);
  statusFilter.addEventListener('change', filterTable);
</script>

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>