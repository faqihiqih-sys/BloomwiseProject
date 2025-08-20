<?php
require_once("koneksi.php");
if (!isset($_SESSION)) {
    session_start();
}

// Ambil data lengkap user dari database jika sudah login
$userData = null;
if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $getUser = mysqli_query($koneksi, "SELECT * FROM user2 WHERE username='$uname'");
    $userData = mysqli_fetch_assoc($getUser);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/blmws/">
    <meta charset="utf-8">
    <title>BLOOMWISE | New Brand Local Original from JAKARTA UTARA</title>
    <meta name="description" content="Distro, Jakarta, terlengkap, murah"/>
    <meta name="keywords" content="Kaos, Murah, Jakarta, Baru"/>
    <meta name="author" content="Hakko Bio Richard"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif|Boogaloo|Economica:700,400italic" rel="stylesheet">
    <style>
        .profile-img-nav {
            width: 23px;
            height: 23px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 5px;
        }
    </style>
</head>
<body>

<!-- Header -->
<header style="margin: 0; padding: 0;">
    <div class="container">
        <div class="row">
            <!-- Logo -->
            <div class="logo span3">
                <a class="brand" href="index.php"><img src="img/logo2.png" alt="Logo"></a>
            </div>

            <!-- Navigation -->
            <div class="span9">
                <div class="navbar navbar-inverse sticky-navbar">
                    <div class="navbar-inner">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="tentang.php">About</a></li>
                                <li><a href="produk.php">Product</a></li>
                                <li><a href="testimoni.php">Testimoni</a></li>
                                <li><a href="detail.php">Cart</a></li>

                                <?php if (isset($_SESSION['username'])): ?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
        <?php if (!empty($userData['foto'])): ?>
            <img src="uploads/<?= htmlspecialchars($userData['foto']) ?>" style="width:28px; height:28px; border-radius:50%; margin-right:8px;">
        <?php endif; ?>
        <?= htmlspecialchars($userData['nama']) ?> <b class="caret"></b>
    </a>

                                        <ul class="dropdown-menu">
                                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                                <li><a href="admin/tambah.php">Admin Panel</a></li>
                                            <?php else: ?>
                                                <li><a href="user2/dashboard.php">Profil</a></li>
                                            <?php endif; ?>
                                            <li><a href="user2/logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.html">Admin</a></li>
                                            <li><a href="user2/login.php">User</a></li>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Navigation -->
        </div>
    </div>
</header>
<!-- End Header -->
