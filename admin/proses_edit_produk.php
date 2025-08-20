<?php
include "../koneksi.php";

$id = $_POST['br_id'];
$nama = $_POST['br_nm'];
$item = $_POST['br_item'];
$harga = $_POST['br_hrg'];
$stok = $_POST['br_stok'];
$satuan = $_POST['br_satuan'];
$ket = $_POST['ket'];
$status = $_POST['br_sts'];

// Cek jika upload gambar baru
if ($_FILES['br_gbr']['name'] != "") {
    $gambar = $_FILES['br_gbr']['name'];
    $tmp = $_FILES['br_gbr']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/$gambar");

    // Update dengan gambar baru
    $sql = "UPDATE barang SET br_nm='$nama', br_item='$item', br_hrg='$harga', br_stok='$stok',
            br_satuan='$satuan', br_gbr='$gambar', ket='$ket', br_sts='$status' WHERE br_id='$id'";
} else {
    // Tanpa mengganti gambar
    $sql = "UPDATE barang SET br_nm='$nama', br_item='$item', br_hrg='$harga', br_stok='$stok',
            br_satuan='$satuan', ket='$ket', br_sts='$status' WHERE br_id='$id'";
}

mysqli_query($koneksi, $sql);
header("Location: tambah.php");
exit;
