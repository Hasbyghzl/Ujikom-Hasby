<?php
ob_start();
include('../../sistem/koneksi.php');

// ambil data kategori pake id yang udah diambil
if (isset($_GET['id'])) {
    $kategori_id = $_GET['id'];

    // Query SQL Select
    $selectQuery = "SELECT * FROM kategori WHERE kategori_id = ?";
    $selectStmt = mysqli_prepare($koneksi, $selectQuery);

    // Periksa kalo preparenya berhasil
    if ($selectStmt) {
        mysqli_stmt_bind_param($selectStmt, 'i', $kategori_id);
        mysqli_stmt_execute($selectStmt);
        $result = mysqli_stmt_get_result($selectStmt);
        $kategori = mysqli_fetch_assoc($result);
        mysqli_stmt_close($selectStmt);
    }
}

// Form sudah di post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variabel Kategori
    $kategori_id = $_POST['kategori_id'];
    $nama = $_POST['nama'];

    // Query SQL Update
    $query = "UPDATE kategori SET nama = ? WHERE kategori_id = ?";

    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        // Jalananin querynya
        mysqli_stmt_bind_param($stmt, 'si', $nama, $kategori_id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Kalo bener balikin ke halaman awal
            header("Location: index.php");
            exit();
        } else {
            // Kalo gagal lempar ke halaman eror
            header("Location: ../../error/error.php");
            exit();
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kategori</h1>
    </div>

    <div class="row">
        <!-- Total Buku -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="kategori_id" value="<?php echo $kategori['kategori_id']; ?>">
                        <div class="form-group">
                            <label for="nama">Kategori:</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $kategori['nama']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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