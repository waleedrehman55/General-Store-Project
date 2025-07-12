<?php
  include("includes/connection.php");
 $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $limit = 10;
  $start = ($page - 1) * $limit;

  $sql = "SELECT * FROM messages LIMIT $start, $limit";
  $result = $conn->query($sql);

  $countQuery = $conn->query("SELECT COUNT(*) AS total FROM messages");
  $totalRows = $countQuery->fetch_assoc()['total'];
  $totalPages = ceil($totalRows / $limit);
  
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
  <!-- Font Awesome -->
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
            <h5 class="card-title fw-semibold mb-4">Messages</h5>

            <table class="table table-responsive" id="orderTable">
              <div class="d-flex justify-content-between mb-4">
                <input type="search" id="searchInput" placeholder="Search messages..." class="form-control mb-3 w-25">
              <select id="subjectFilter" class="form-control w-25">
                <option value="">All Subjects</option>
                <option value="Query">Query</option>
                <option value="Support">Support</option>
                <option value="Feedback">Feedback</option>
              </select>
              </div>

              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['subject'] ?></td>
                    <td><?= $row['message'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                   <td class="text-center">
                  <a href="reply_message.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary" title="Reply">
                    <iconify-icon icon="ic:round-reply" style="color: white;" width="18"></iconify-icon>
                  </a>
                  <a href="delete_message.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this message?');">
                    <iconify-icon icon="material-symbols:delete-outline" style="color: white;" width="18"></iconify-icon>
                  </a>
                </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
              <div class="d-flex justify-content-end mt-3">
                <nav>
                  <ul class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                      </li>
                    <?php endfor; ?>
                  </ul>
                </nav>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      
   <script>
  const searchInput = document.getElementById("searchInput");
  const subjectFilter = document.getElementById("subjectFilter");
  const rows = document.querySelectorAll("tbody tr");

  function filterRows() {
    const searchValue = searchInput.value.toLowerCase();
    const selectedSubject = subjectFilter.value.toLowerCase();

    rows.forEach(row => {
      const rowText = row.innerText.toLowerCase();
      const subjectText = row.cells[3]?.innerText.toLowerCase(); // Assuming Subject is in 4th column (index 3)

      const matchesSearch = rowText.includes(searchValue);
      const matchesSubject = selectedSubject === "" || subjectText === selectedSubject;

      row.style.display = (matchesSearch && matchesSubject) ? "" : "none";
    });
  }

  searchInput.addEventListener("keyup", filterRows);
  subjectFilter.addEventListener("change", filterRows);
</script>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>