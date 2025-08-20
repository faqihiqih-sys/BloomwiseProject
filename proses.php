<?php
$hr = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari_ini = $hr[date("w")];
$tgl = date("d/m/y");

$nama = $_POST["nama"];
$email = $_POST["email"];
$komentar = $_POST["komentar"];
$rating = isset($_POST["rating"]) ? $_POST["rating"] : 0;

$fp = fopen("guestbook.txt", "a+");
fputs($fp, "$hari_ini|$tgl|$nama|$email|$komentar|$rating\n");
fclose($fp);
echo("<script>alert('Komentar anda telah berhasil ditambahkan.'); window.location = 'testimoni.php'</script>");
?>
