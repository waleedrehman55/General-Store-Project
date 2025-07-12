<?php
session_start();
include("includes/connection.php");

// Replace this with actual session/db data later
$adminName = "Waleed Rehman";
$adminEmail = "waleedrehman2007@gmail.com";
$adminImage = "../assets/images/profile/user-1.jpg";
$adminRole = "Super Admin";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Profile</title>
  <link rel="shortcut icon" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <style>
    .card {
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }
    .banner {
      width: 100%;
      height: 160px;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      background: linear-gradient(90deg, #87e0fd, #53cbf1, #05abe0);
      position: relative;
    }
    .profile-circle {
      width: 100px;
      height: 100px;
      border: 5px solid #fff;
      border-radius: 50%;
      overflow: hidden;
      position: absolute;
      top: 100px;
      left: 30px;
      background: white;
    }
    .profile-circle img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .edit-btn {
      margin-top: 20px;
    }
    .card-body {
      padding-top: 60px;
    }
    .infoopt {
      font-size: 16px;
      margin-top: 15px;
    }
    .infoopt strong {
      width: 80px;
      display: inline-block;
    }
    .status-active {
      color: green;
      font-weight: bold;
    }
    .activities-box {
      border: 1px solid #e0e0e0;
      padding: 15px;
      border-radius: 10px;
      margin-top: 30px;
    }
    .activity-entry {
      display: flex;
      justify-content: space-between;
      border-bottom: 1px solid #eee;
      padding: 8px 0;
      font-size: 15px;
    }
    .activity-entry:last-child {
      border-bottom: none;
    }
    @media (max-width: 576px) {
      .profile-circle {
        left: 50%;
        transform: translateX(-50%);
      }
      .card-body {
        padding-left: 15px;
        text-align: center;
      }
    }
  </style>
</head>
<body>
    <!-- Edit Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="update_profile.php" method="POST"> <!-- You can use a real PHP update file -->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="adminName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="adminName" name="admin_name" value="Waleed Rehman" required>
          </div>
          <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="Malir, Karachi, Pakistan">
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="24">
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender">
              <option value="Male" selected>Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="Active" selected>Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="waleedrehman2007@gmail.com" required>
          </div>
          <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact" name="contact" value="+92 315 2210948">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
     data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  <aside class="left-sidebar">
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.php" class="logo-img text-nowrap">
          <img src="../assets/images/logos/logo-light.svg" alt="Logo" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <?php include("includes/sidebar.php"); ?>
    </div>
  </aside>

  <div class="body-wrapper">
    <?php include("includes/header.php"); ?>

    <div class="container-fluid">
      <div class="card">
        <div class="banner"></div>

        <div class="profile-circle">
          <img src="<?= $adminImage ?>" alt="Profile">
        </div>

        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start flex-wrap">
            <div class="mt-4">
              <h4><?= $adminName ?></h4>
              <p> Malir, Karachi, Pakistan<br>
                <span> Age: 24 | Gender: Male | Status: <span class="status-active">Active</span></span>
              </p>
            </div>
            <a href="#" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">✏️ Edit Profile</a>
          </div>

          <div class="infoopt mt-4">
            <p><strong>Role:</strong> <?= $adminRole ?></p>
            <p><strong>Email:</strong> <?= $adminEmail ?></p>
            <p><strong>Contact:</strong> +92 315 2210948</p>
            <p><strong>Region:</strong> Central PK</p>
          </div>

          <div class="activities-box mt-5">
            <h5 class="mb-3">Your Activities</h5>
            <div class="activity-entry">
              <span>You added a role ‘Select Lead’</span>
              <span>19/02/2023<br>10:40:55 AM</span>
            </div>
            <div class="activity-entry">
              <span>You assigned task API Integration to Technical Lead - BE</span>
              <span>19/02/2023<br>09:40:55 AM</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
