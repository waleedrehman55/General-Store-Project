<?php
include("includes/connection.php");

$query = "SELECT * FROM payments WHERE is_archived = 0 ORDER BY id DESC";

$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
}

if (isset($_GET['id'])) {
    $achieve_id = intval($_GET['id']);

    $get = $conn->prepare("SELECT is_archived FROM payments WHERE id = ?");
    $get->bind_param("i", $achieve_id);
    $get->execute();
    $result = $get->get_result()->fetch_assoc();
    $get->close();

    if ($result) {
        $new_status = ($result['is_archived'] == 0) ? 1 : 0;

        $update = $conn->prepare("UPDATE payments SET is_archived = ? WHERE id = ?");
        $update->bind_param("ii", $new_status, $achieve_id);
        $update->execute();
        $update->close();
    }

    header("Location: payments.php");
    exit();
}
if (isset($_GET['id'])) {
    $achieve_id = intval($_GET['id']);

    $get = $conn->prepare("SELECT is_archived FROM payments WHERE id = ?");
    $get->bind_param("i", $achieve_id);
    $get->execute();
    $result = $get->get_result()->fetch_assoc();
    $get->close();

    if ($result) {
        $new_status = ($result['is_archived'] == 0) ? 1 : 0;

        $update = $conn->prepare("UPDATE payments SET is_archived = ? WHERE id = ?");
        $update->bind_param("ii", $new_status, $achieve_id);
        $update->execute();
        $update->close();
    }

    header("Location: payments.php");
    exit();
}

$conn->close();

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

  <style>
  .table-responsive {
    width: 100%;
    overflow-x: auto;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px; 
  }

  th, td {
    padding: 10px;
    text-align: left;
    white-space: nowrap;
  }

  @media (max-width: 768px) {
    table {
      font-size: 14px;
    }
  }
</style>

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
            <input type="text" id="searchInput" placeholder="Search..." class="form-control w-25 mb-3">
           <div class="col-md-2">
            <select class="form-control text-center" id="statusFilter">
                <option value="">Hide/Unhide</option>
                <option value="0">Visible</option>
                <option value="1">Hidden</option>
            </select>
            </div>
            <div class="col-md-2">
              <select class="form-control text-center" id="statusFilter">
                <option value="">All Status</option>
                <option value="success">success</option>
                <option value="failed">failed</option>
                <option value="refunded">refunded</option>
                <option value="pending">pending</option>  
                </select>
            </div>
            </div>
           <div class="table-responsive">
            <table class="table text-center">
                <thead>
                <tr>
                    <th>S.no</th>
                    <th>User ID</th>
                    <th>Order ID</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Payment Response</th>
                    <th>Archived</th>
                    <th>Created At</th>
                </tr>
                </thead>
              <tbody class="text-center">
                <?php foreach ($result as $row): ?>
                    <tr data-archived="<?= $row['is_archived'] ?>">
                        <td class="text-center"><?= $row['id'] ?></td>
                        <td class="text-center"><?= $row['user_id'] ?></td>
                        <td class="text-center"><?= $row['order_id'] ?></td>
                        <td class="text-center"><?= $row['payment_method'] ?></td>
                        <td class="text-center">
                            <span class="badge bg-success"><?= $row['payment_status'] ?></span>
                        </td>
                        <td class="text-center"><?= $row['transaction_id'] ?></td>
                        <td class="text-center"><?= $row['amount'] ?></td>
                        <td class="text-center"><?= $row['payment_date'] ?></td>
                        <td class="text-center"><?= $row['payment_response'] ?></td>
                        <td>
                            <a href="payments.php?id=<?= $row['id'] ?>" onclick="return confirm('Toggle archive status?')">
                                <?php if ($row['is_archived'] == 0): ?>
                                    <iconify-icon icon="mdi:archive" width="22.5" class="text-info"></iconify-icon>
                                <?php else: ?>
                                    <iconify-icon icon="mdi:archive-remove" width="22.5" class="text-danger"></iconify-icon>
                                <?php endif; ?>
                            </a>
                        </td>
                        <td class="text-center"><?= $row['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const statusFilter = document.querySelectorAll("#statusFilter")[0]; // for Archived
  const paymentStatusFilter = document.querySelectorAll("#statusFilter")[1];
  const rows = document.querySelectorAll("table tbody tr");

  function filterTable() {
    const searchTerm = searchInput.value.toLowerCase();
    const archiveValue = statusFilter.value;
    const statusValue = paymentStatusFilter.value;

    rows.forEach(row => {
      const archiveStatus = row.getAttribute("data-archived");
      const rowText = row.textContent.toLowerCase();
      const paymentStatusCell = row.querySelector("td:nth-child(5)").innerText.toLowerCase();

      const matchesSearch = rowText.includes(searchTerm);
      const matchesArchive = archiveValue === "" || archiveStatus === archiveValue;
      const matchesStatus = statusValue === "" || paymentStatusCell.includes(statusValue);

      if (matchesSearch && matchesArchive && matchesStatus) {
        row.style.display = "block";
      } else {
        row.style.display = "none";
      }
    });
  }

  // Attach event listeners
  searchInput.addEventListener("input", filterTable);
  statusFilter.addEventListener("change", filterTable);
  paymentStatusFilter.addEventListener("change", filterTable);
});
</script>


  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>