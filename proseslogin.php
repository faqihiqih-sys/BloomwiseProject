<?php
session_start();
include "koneksi.php";

$username = $_POST['user'];
$password = $_POST['pass'];

$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'admin'; // ✅ Tambahkan role
    header("Location: admin/tambah.php");
    exit;
} else {
    echo "<script>alert('Login gagal');window.location='index.html';</script>";
}
?>
