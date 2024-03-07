<?php
ob_start();
include('../../sistem/koneksi.php');
?>
<?php
$query = "SELECT * FROM `user` WHERE `role` = 'petugas'";
$result = mysqli_query($koneksi, $query);
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Anggota</h1>
        <a href="create.php" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-plus fa-sm text-primary-50"></i>
            Tambah Petugas
        </a>
    </div>

    <!-- Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['namalengkap']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td class="btn-group">
                                        <a href="update.php?id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-primary mr-2" target="_self">Edit</a>
                                        <a href="delete.php?id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>Tidak ada data buku.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php
$content = ob_get_clean();
include('../layout/indexlayout.php');

?>