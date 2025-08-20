<?php
include "../koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE br_id = '$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan";
    exit;
}
?>

<h3>Edit Produk</h3>
<form action="proses_edit_produk.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="br_id" value="<?= $data['br_id'] ?>">

    <label>Nama:</label>
    <input type="text" name="br_nm" value="<?= $data['br_nm'] ?>" required><br>

    <label>Item:</label>
    <input type="text" name="br_item" value="<?= $data['br_item'] ?>" required><br>

    <label>Harga:</label>
    <input type="number" name="br_hrg" value="<?= $data['br_hrg'] ?>" required><br>

    <label>Stok:</label>
    <input type="number" name="br_stok" value="<?= $data['br_stok'] ?>" required><br>

    <label>Satuan:</label>
    <input type="text" name="br_satuan" value="<?= $data['br_satuan'] ?>" required><br>

    <label>Keterangan:</label>
    <textarea name="ket"><?= $data['ket'] ?></textarea><br>

    <label>Status:</label>
    <select name="br_sts">
        <option value="1" <?= $data['br_sts'] == 1 ? 'selected' : '' ?>>Aktif</option>
        <option value="0" <?= $data['br_sts'] == 0 ? 'selected' : '' ?>>Tidak Aktif</option>
    </select><br>

    <label>Gambar Sekarang:</label><br>
    <img src="../uploads/<?= $data['br_gbr'] ?>" width="100"><br>

    <label>Ganti Gambar:</label>
    <input type="file" name="br_gbr"><br><br>

    <button type="submit">Simpan Perubahan</button>
</form>
