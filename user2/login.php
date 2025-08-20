<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); // arahkan jika sudah login
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Login User</h2>
    <form action="proses_login.php" method="post">
        <div class="form-group">
            <label>Username/Email</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Kata Sandi</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success" type="submit">Login</button>
        <a href="daftar.php" class="btn btn-link">Belum punya akun? Daftar</a>
    </form>
</div>
</body>
</html>
