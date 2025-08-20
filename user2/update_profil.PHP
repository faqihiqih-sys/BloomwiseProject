<?php
include "../koneksi.php";

$id = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];

// Cek jika upload foto baru
if ($_FILES['foto']['name'] != "") {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/$foto");

    // Update foto + email
    $query = "UPDATE user2 SET email='$email', foto='$foto' WHERE id='$id'";
} else {
    // Update tanpa ganti foto
    $query = "UPDATE user2 SET email='$email' WHERE id='$id'";
}

mysqli_query($koneksi, $query);

// Jika user mengisi password baru
if (!empty($password)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($koneksi, "UPDATE user2 SET password='$passwordHash' WHERE id='$id'");
}

header("Location: profil.php");
exit;
