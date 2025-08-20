<?php
session_start();
include "../koneksi.php";

$id_user = $_SESSION['id']; // pastikan id disimpan di session saat login
$query = mysqli_query($koneksi, "SELECT * FROM user2 WHERE id = '$id_user'");
$data = mysqli_fetch_assoc($query);
?>

<h3>Profil Pengguna</h3>

<form action="update_profil.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>Username:</label>
    <input type="text" name="username" class="form-control" value="<?= $data['username'] ?>" readonly><br>

    <label>Email:</label>
    <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required><br>

    <label>Password Baru (Opsional):</label>
    <input type="password" name="password" class="form-control"><br>

    <label>Foto Profil Sekarang:</label><br>
    <?php if ($data['foto']) : ?>
        <img src="../uploads/<?= $data['foto'] ?>" width="100"><br>
    <?php else: ?>
        <p><i>Tidak ada foto</i></p>
    <?php endif; ?>

    <label>Ganti Foto Profil:</label>
    <input type="file" name="foto" class="form-control" accept="image/*"><br>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
