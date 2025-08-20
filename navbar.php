<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<header>
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="navbar navbar-inverse sticky-navbar">
          <div class="navbar-inner text-center">
            <div class="nav-center-logo">

              <ul class="nav nav-left pull-left">
                <li><a href="index.php">Home</a></li>
                <li><a href="tentang.php">About</a></li>
                <li><a href="produk.php">Product</a></li>
              </ul>

              <a class="brand logo-center" href="index.php">
                <img src="img/logo2.png" alt="Logo" style="height: 60px;">
              </a>

              <ul class="nav nav-right pull-right">
                <li><a href="testimoni.php">Testimoni</a></li>
                <li><a href="detail.php">Cart</a></li>
                <?php if (isset($_SESSION['username']) && isset($_SESSION['role'])): ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <?= htmlspecialchars($_SESSION['username']); ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                      <?php if ($_SESSION['role'] === 'admin'): ?>
                        <li><a href="admin/tambah.php">Dashboard Admin</a></li>
                        <li><a href="user2/logout.php">Logout</a></li>
                      <?php else: ?>
                        <li><a href="user2/dashboard.php">Profile</a></li>
                        <li><a href="user2/logout.php">Logout</a></li>
                      <?php endif; ?>
                    </ul>
                  </li>
                <?php else: ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="index.html">👨‍💼Admin</a></li>
                      <li><a href="user2/login.php">👤User</a></li>
                    </ul>
                  </li>
                <?php endif; ?>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
