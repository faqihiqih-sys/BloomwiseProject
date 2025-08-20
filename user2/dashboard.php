<?php
session_start();

include "../koneksi.php";
include "../header.php";

$username = $_SESSION['username'];

// Inisialisasi
$nama_baru = "";
$update_foto = "";

// Ambil data user
$query = mysqli_query($koneksi, "SELECT * FROM user2 WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

// Proses update profil
if (isset($_POST['update'])) {
    $nama_baru = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $password_baru = $_POST['password'];

    // Upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $update_foto = "";

    if (!empty($foto)) {
        $folder = "../uploads/";
        $namaFileAsli = basename($foto);
        $namaFileBersih = str_replace(' ', '_', strtolower($namaFileAsli));
        $filename = uniqid() . "_" . $namaFileBersih;

        if (move_uploaded_file($tmp, $folder . $filename)) {
            $update_foto = ", foto='$filename'";

            // Hapus foto lama jika ada
            if (!empty($user['foto']) && file_exists($folder . $user['foto'])) {
                unlink($folder . $user['foto']);
            }
        }
    }

    // Update database
    if (!empty($password_baru)) {
        $hash = password_hash($password_baru, PASSWORD_DEFAULT);
        $update = mysqli_query($koneksi, "UPDATE user2 SET nama='$nama_baru', password='$hash' $update_foto WHERE username='$username'");
    } else {
        $update = mysqli_query($koneksi, "UPDATE user2 SET nama='$nama_baru' $update_foto WHERE username='$username'");
    }

    if ($update) {
        // Refresh data user
        $query = mysqli_query($koneksi, "SELECT * FROM user2 WHERE username='$username'");
        $user = mysqli_fetch_assoc($query);

        echo "<script>alert('Profil berhasil diperbarui!'); window.location='dashboard.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal memperbarui profil!');</script>";
    }
}
?>

<!-- Konten Halaman Dashboard -->
<div class="container">
    <div class="dashboard-container">
        <h1>Selamat datang, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>

        <!-- Tampilkan Foto Profil -->
        <?php if (!empty($user['foto'])): ?>
            <img src="http://localhost/blmws/uploads/<?= htmlspecialchars($user['foto']) ?>" width="120" class="img-thumbnail mt-2">
        <?php else: ?>
            <p><i>Belum ada foto profil</i></p>
        <?php endif; ?>

        <p><strong>Tanggal Daftar:</strong> <?= htmlspecialchars($user['dibuat_pada']) ?></p>

        <hr>
        <h3>Edit Profil</h3>
        <form method="post" enctype="multipart/form-data">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" required>

            <label>Password Baru (opsional):</label>
            <input type="password" name="password" placeholder="Kosongkan jika tidak ingin ganti">

            <label>Ganti Foto Profil:</label>
            <input type="file" name="foto" accept="image/*">

            <button type="submit" name="update" class="btn">Simpan Perubahan</button>
            <a href="logout.php" class="btn logout">Logout</a>
            <div class="clearfix"></div>
        </form>
    </div>
</div>

<!-- CSS Lokal Khusus Dashboard -->
<style>
    .dashboard-container {
        background: white;
        padding: 30px;
        max-width: 600px;
        margin: auto;
        border-radius: 10px;
        box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }
    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
    }
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }
    .btn {
        margin-top: 20px;
        padding: 10px 20px;
        border: none;
        color: white;
        background-color: #0275d8;
        border-radius: 6px;
        cursor: pointer;
    }
    .btn.logout {
        background-color: #d9534f;
        float: right;
    }
    .clearfix {
        clear: both;
    }
    .img-thumbnail {
        border-radius: 100px;
        border: 2px solid #ccc;
    }
</style>

<?php include "../footer.php"; ?>
