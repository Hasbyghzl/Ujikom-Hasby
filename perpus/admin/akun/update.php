<?php
ob_start();
include('../../sistem/koneksi.php');

// ambil data kategori pake id yang udah diambil
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Query SQL Select
    $selectQuery = "SELECT * FROM user WHERE user_id = ?";
    $selectStmt = mysqli_prepare($koneksi, $selectQuery);

    // Periksa kalo preparenya berhasil
    if ($selectStmt) {
        mysqli_stmt_bind_param($selectStmt, 'i', $kategori_id);
        mysqli_stmt_execute($selectStmt);
        $result = mysqli_stmt_get_result($selectStmt);
        $user = mysqli_fetch_assoc($result);
        mysqli_stmt_close($selectStmt);
    }
}

// Form sudah di post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variabel Kategori
    $user_id = $_POST['user_id'];
    $namalengkap = $_POST['namalengkap'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query SQL Update
    $query = "UPDATE user SET namalengkap = ?, username = ?, email = ?, password = ? WHERE user_id = ?";

    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        // Jalananin querynya
        mysqli_stmt_bind_param($stmt, 'ssssi', $namalengkap, $username, $email, $password, $user_id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Kalo bener balikin ke halaman awal
            echo $result;
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
        <h1 class="h3 mb-0 text-gray-800">Edit Petugas</h1>
    </div>

    <div class="row">
        <!-- Total Buku -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                        <div class="form-group">
                            <label for="namapanjang">Nama lengkap:</label>
                            <input type="text" name="namalengkap" class="form-control mb-3">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" class="form-control mb-3">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" class="form-control mb-3">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" name="password" class="form-control mb-3">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
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