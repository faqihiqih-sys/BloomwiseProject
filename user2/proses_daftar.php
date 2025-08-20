<?php
require_once("../koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = mysqli_query($koneksi, "SELECT * FROM user2 WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location='daftar.php';</script>";
        exit;
    }

    $query = mysqli_query($koneksi, "INSERT INTO user2 (nama, username, password) VALUES ('$nama', '$username', '$password')");

    if ($query) {
        echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Gagal daftar!'); window.location='daftar.php';</script>";
    }
}
?>
