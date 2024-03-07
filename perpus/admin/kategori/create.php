<?php
ob_start();
include('../../sistem/koneksi.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variabel nama
    $nama = $_POST['nama'];

    // Query Select SQL
    $query = "INSERT INTO kategori (nama) VALUES (?)";


    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        // Eksekusi query
        mysqli_stmt_bind_param($stmt, 's', $nama);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Kembali ke halaman awal
            header("Location: index.php");
            exit();
            // Kalo salah ke halaman eror
        } else {
            header("Location: ../../error/error.php");
            exit();
        }

        mysqli_stmt_close($stmt);
    }
}
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
    </div>

    <div class="row">
        <!-- Total Buku -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="kategori_id">
                        <div class="form-group">
                            <label for="nama">Kategori:</label>
                            <input type="text" name="nama" class="form-control mb-3">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include('../layout/indexlayout.php');
?>