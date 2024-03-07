<?php
ob_start();
include('../../sistem/koneksi.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variabel nama
    $namalengkap = $_POST['namalengkap'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Query Select SQL
    $query = "INSERT INTO user (namalengkap, username, email, password, role) VALUES (?, ?, ?, ?, ?)";


    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        // Eksekusi query
        mysqli_stmt_bind_param($stmt, 'sssss', $namalengkap, $username, $email, $password, $role);
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
        <h1 class="h3 mb-0 text-gray-800">Tambah Petugas</h1>
    </div>

    <div class="row">
        <!-- Total Buku -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="rak_id">
                        <input type="hidden" name="role" value="petugas">
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