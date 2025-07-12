<?php
include("includes/connection.php");

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$countResult = $conn->query("SELECT COUNT(*) AS total FROM users");
$totalRows = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);

$sql = "SELECT * FROM users LIMIT $start, $limit";
$result = $conn->query($sql);

if (isset($_POST['update_user']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $email, $id);

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully'); window.location.href='users.php';</script>";
    } else {
        echo "<script>alert('Error updating user');</script>";
    }

    $stmt->close();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash - Users</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <!-- Iconify for modern icons -->
  <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo-light.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <?php include("includes/sidebar.php"); ?>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="body-wrapper">
      <?php include("includes/header.php"); ?>

      <div class="container-fluid">

        <!-- Users Table -->
        <div class="card">
          <div class="card-body">
        <!-- Search Bar -->
        <div class="mb-3">
          <input type="search" id="searchInput" class="form-control w-25 mb-4" placeholder="Search users...">
        </div>
            <table class="table" id="userTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php
              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $id = $row['id'];
                      $name = $row['name'];
                      $email = $row['email'];
                      $password = $row['password'];
              ?>
                <tr>
                  <td><?= $id ?></td>
                  <td><?= $name ?></td>
                  <td><?= $email ?></td>
                  <td><?= $password ?></td>
                  <td class="text-center">
                    <a href="#" class="text-warning me-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $id ?>">
                      <iconify-icon icon="mdi:pencil" width="22.5"></iconify-icon>
                    </a>
                    <a href="user_del.php?id=<?= $id ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this user?');">
                      <iconify-icon icon="mdi:delete" width="22.5"></iconify-icon>
                    </a>
                  </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?= $id ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $id ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form method="POST" action="users.php?id=<?= $id ?>">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editModalLabel<?= $id ?>">Edit User - <?= $name ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?= $id ?>">
                          <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="edit_name" class="form-control" value="<?= $name ?>" required>
                          </div>
                          <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="edit_email" class="form-control" value="<?= $email ?>" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="update_user" class="btn btn-primary">Update</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              <?php
                  }
              } else {
                  echo "<tr><td colspan='5' class='text-center'>No users found.</td></tr>";
              }
              $conn->close();
              ?>
              </tbody>
            </table>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
              <div class="d-flex justify-content-end mt-3">
                <nav>
                  <ul class="pagination">
                    <?php if ($page > 1): ?>
                      <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                      </li>
                    <?php endfor; ?>
                    <?php if ($page < $totalPages): ?>
                      <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    document.getElementById('searchInput').onkeyup = function () {
      const input = this.value.toLowerCase();
      const rows = document.querySelectorAll('#userTable tbody tr');
      rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(input) ? '' : 'none';
      });
    };
  </script> 

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
</body>
</html>
