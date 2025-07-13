<?php
echo "
<nav class='sidebar-nav scroll-sidebar d-flex flex-column' data-simplebar='' style='height: 100vh;'>
  <ul id='sidebarnav' class='flex-grow-1 d-flex flex-column'>

    <li class='nav-small-cap'>
      <i class='ti ti-dots nav-small-cap-icon fs-6'></i>
      <span class='hide-menu'>Main Menu</span>
    </li>

    <li class='sidebar-item'>
      <a class='sidebar-link' href='./index.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:home-smile-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Dashboard</span>
      </a>
    </li>

    <li class='sidebar-item'>
      <a class='sidebar-link' href='users.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:user-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Users</span>
      </a>
    </li>

    <li class='sidebar-item'>
      <a class='sidebar-link' href='banners.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:tag-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Upload Banners</span>
      </a>
    </li>

    <li class='sidebar-item'>
      <a class='sidebar-link' href='categories.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:tag-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Categories</span>
      </a>
    </li>

      <li class='sidebar-item'>
      <a class='sidebar-link' href='add_pro.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:box-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Add Products</span>
      </a>
      </li>

    <li class='sidebar-item'>
      <a class='sidebar-link' href='products.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:box-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Products</span>
      </a>
    </li>

    <li class='sidebar-item'>
      <a class='sidebar-link' href='orders.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:clipboard-text-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Orders</span>
      </a>
    </li>

    <li class='sidebar-item'>
      <a class='sidebar-link' href='payments.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:wallet-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Payments</span>
      </a>
    </li>

    <li class='sidebar-item'>
      <a class='sidebar-link' href='messages.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:chat-round-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Messages</span>
      </a>
    </li>

    <li class='sidebar-item'>
      <a class='sidebar-link' href='profile.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:user-circle-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Profile</span>
      </a>
    </li>

    
    <li class='sidebar-item mt-4'>
      <a class='sidebar-link text-danger fw-semibold' href='logout.php' aria-expanded='false' style='border-top: 1px solid #dee2e6; padding-top: 10px;'>
        <span>
          <iconify-icon icon='solar:logout-2-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Logout</span>
      </a>
    </li>

  </ul>
</nav>
";
?>
