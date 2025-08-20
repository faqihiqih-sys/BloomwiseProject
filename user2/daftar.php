<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akun</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Daftar Akun</h2>
    <form action="proses_daftar.php" method="post">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email/Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Kata Sandi</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Daftar</button>
        <a href="login.php" class="btn btn-link">Sudah punya akun? Login</a>
    </form>
</div>
</body>
</html>
