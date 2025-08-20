<?php
session_start();
session_unset(); // hapus semua variabel session
session_destroy(); // hancurkan session

// redirect ke halaman utama (index.php di luar folder admin)
header("Location: ../index.php");
exit;
