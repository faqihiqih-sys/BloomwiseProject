<!-- Produk Section -->
<h5 class="mb-3">Tambah Produk</h5>

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
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../koneksi.php"; // disesuaikan dengan struktur folder

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
                    <td><img src='../../uploads/{$row['br_gbr']}' width='80'></td>
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
