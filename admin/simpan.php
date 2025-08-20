<?php
include "../koneksi.php";

if ($_POST['tipe'] === 'produk') {
    $nama = $_POST['br_nm'];
    $item = $_POST['br_item'];
    $harga = $_POST['br_hrg'];
    $stok = $_POST['br_stok'];
    $satuan = $_POST['br_satuan'];
    $keterangan = $_POST['ket'];
    $status = $_POST['br_sts'];

    // Upload gambar
    $gambar = $_FILES['br_gbr']['name'];
    $tmp = $_FILES['br_gbr']['tmp_name'];

    $folder = "../uploads/";
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $path = $folder . $gambar;

    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO barang 
                  (br_nm, br_item, br_hrg, br_stok, br_satuan, br_gbr, ket, br_sts)
                  VALUES 
                  ('$nama', '$item', '$harga', '$stok', '$satuan', '$gambar', '$keterangan', '$status')";

        mysqli_query($koneksi, $query);
        header("Location: user2/tambah.php");
        exit;
    } else {
        echo "Upload gambar gagal.";
    }
}
?>
