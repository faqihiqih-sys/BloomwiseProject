<?php
include "../../koneksi.php"; // koneksi ke database

$query = "SELECT * FROM user2";
$result = mysqli_query($koneksi, $query);
?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Data User</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataUser" class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['username']); ?></td>
                            <td><?= htmlspecialchars($row['password']); ?></td>
                            <td><?= htmlspecialchars($row['role']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataUser').DataTable();
    });
</script>
