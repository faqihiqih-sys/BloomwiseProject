<?php
session_start();
$_SESSION['id'] = $row['id'];


include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user2 WHERE username='$username'");
$data = mysqli_fetch_array($query);

if ($data) {
    if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = 'user'; // default 'user', bisa dari $data['role'] jika ada
        header("Location: ../index.php");
        exit;
    } else {
        echo "<script>alert('Password salah!'); window.location='login.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location='login.php';</script>";
}
?>
