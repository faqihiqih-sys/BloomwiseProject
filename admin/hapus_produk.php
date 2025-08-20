<?php
include "../koneksi.php";

$id = $_GET['id'];

// Hapus gambar dulu
$get = mysqli_query($koneksi, "SELECT br_gbr FROM barang WHERE br_id = '$id'");
$row = mysqli_fetch_assoc($get);
if ($row && file_exists("../uploads/" . $row['br_gbr'])) {
    unlink("../uploads/" . $row['br_gbr']);
}

// Hapus data dari database
mysqli_query($koneksi, "DELETE FROM barang WHERE br_id = '$id'");

header("Location: tambah.php");
exit;
