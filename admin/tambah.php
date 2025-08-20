<?php
session_start();

if (!isset($_SESSION['role'], $_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}


include "../koneksi.php"; // Penting: agar $koneksi aktif
?>
<?php
// Query jumlah produk aktif/tidak aktif
$aktif = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang WHERE br_sts = 1"))['total'];
$nonaktif = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang WHERE br_sts = 0"))['total'];

// Query jumlah user
$totalUser = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM user2"))['total'];

// Query jumlah pembelian
$totalPembelian = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pembelian"))['total'];
?>


<!DOCTYPE html>
<html lang="id">
<head>
    
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            padding-bottom: 50px;
        }
    </style>

    <style>
    #produkChart,
    #statistikChart {
        max-height: 300px;
    }
</style>

</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Dashboard Admin</h2>
    <p class="text-end"><strong>Login sebagai:</strong> <?= htmlspecialchars($_SESSION['username']) ?> 
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Selamat Datang, <?php echo $_SESSION['username']; ?></h4>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">Status Produk</div>
            <div class="card-body">
                <canvas id="produkChart"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-success text-white">Statistik Sistem</div>
            <div class="card-body">
                <div style="position: relative; height: 300px;">
    <canvas id="statistikChart"></canvas>
</div>

            </div>
        </div>
    </div>
</div>


    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="produk-tab" data-bs-toggle="tab" data-bs-target="#produk" type="button">Tambah Produk</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button">Data User</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">


        <!-- Form Produk -->
        <div class="tab-pane fade show active" id="produk" role="tabpanel">
        <form action="simpan.php" method="post" enctype="multipart/form-data" class="mb-4">
    <input type="hidden" name="tipe" value="produk">
    
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="br_nm" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Item</label>
        <input type="text" name="br_item" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="br_hrg" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="br_stok" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Satuan</label>
        <input type="text" name="br_satuan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="ket" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="br_sts" class="form-control" required>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="br_gbr" class="form-control" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Produk</button>
</form>

<h5 class="mt-5">Data Produk</h5>
<table id="produkTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Item</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Aksi</th> <!-- Tambahan -->
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $result = mysqli_query($koneksi, "SELECT * FROM barang");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['br_nm']}</td>
                    <td>{$row['br_item']}</td>
                    <td>Rp " . number_format($row['br_hrg'], 0, ',', '.') . "</td>
                    <td>{$row['br_stok']}</td>
                    <td>{$row['br_satuan']}</td>
                    <td><img src='../uploads/{$row['br_gbr']}' width='80'></td>
                    <td>" . ($row['br_sts'] == 1 ? 'Aktif' : 'Tidak Aktif') . "</td>
                    <td>
                        <a href='edit_produk.php?id={$row['br_id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus_produk.php?id={$row['br_id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                    </td>
                </tr>";
            $no++;
        }
        ?>
    </tbody>
</table>

        </div>

        <!-- Tabel User -->
<div class="tab-pane fade" id="user" role="tabpanel">
    <h5 class="mb-3">Data User</h5>
    <table id="userTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>ID User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $queryUser = "SELECT * FROM user2"; // Gantilah nama tabel jika berbeda
            $resultUser = mysqli_query($koneksi, $queryUser);

            if ($resultUser && mysqli_num_rows($resultUser) > 0) {
                while ($row = mysqli_fetch_assoc($resultUser)) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['password']}</td>
                            <td>{$row['dibuat_pada']}</td>
                        </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='5' class='text-center text-danger'>Tidak ada data user</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


    <hr class="my-5">

   <h4 class="mt-5">Data Pembelian</h4>
<table id="pembelianTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>No Pembelian</th>
            <th>Tanggal</th>
            <th>User</th>
            <th>Kurir</th>
            <th>Pembayaran</th>
            <th>Penerima</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>No HP</th>
            <th>Rekening</th>
            <th>Nama Rek</th>
            <th>Bank</th>
            <th>Catatan</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../koneksi.php";
        $no = 1;

        $sql = "SELECT * FROM pembelian";
        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['no_hdpem']}</td>
                    <td>{$row['tgl_hdpem']}</td>
                    <td>{$row['usr_hdpem']}</td>
                    <td>{$row['crkir_hdpem']}</td>
                    <td>{$row['crpem_hdpem']}</td>
                    <td>{$row['penerima_hdpem']}</td>
                    <td>{$row['almt_pem']} ({$row['kp_pem']})</td>
                    <td>{$row['kota_pem']}</td>
                    <td>{$row['tlp']}</td>
                    <td>{$row['rek_pem']}</td>
                    <td>{$row['nmrek_pem']}</td>
                    <td>{$row['bank_pem']}</td>
                    <td>{$row['ct_pem']}</td>
                    <td>Rp " . number_format($row['tot_hdpem'], 0, ',', '.') . "</td>
                    <td>{$row['sts_pem']}</td>
                </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='16' class='text-center text-danger'>Tidak ada data pembelian</td></tr>";
        }
        ?>
    </tbody>
</table>
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#produkTable').DataTable();
        $('#transaksiTable').DataTable();
        $('#pembelianTable').DataTable();
        $('#userTable').DataTable();

    });
</script>
<script>
    const ctxProduk = document.getElementById('produkChart').getContext('2d');
    const produkChart = new Chart(ctxProduk, {
        type: 'bar',
        data: {
            labels: ['Aktif', 'Tidak Aktif'],
            datasets: [{
                label: 'Jumlah Produk',
                data: [<?= $aktif ?>, <?= $nonaktif ?>],
                backgroundColor: ['#4CAF50', '#F44336']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    const ctxStatistik = document.getElementById('statistikChart').getContext('2d');
    const statistikChart = new Chart(ctxStatistik, {
        type: 'doughnut',
        data: {
            labels: ['User Terdaftar', 'Transaksi Pembelian'],
            datasets: [{
                label: 'Jumlah',
                data: [<?= $totalUser ?>, <?= $totalPembelian ?>],
                backgroundColor: ['#2196F3', '#FFC107']
            }]
        },
        options: {
            responsive: true
        }
    });
</script>

</body>
</html>
