<?php
ob_start();
include('../sistem/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variabel Register
    $namalengkap = $_POST['namalengkap'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Query insert SQL
    $query = "INSERT INTO user (namalengkap, username, email, password, role) VALUES (?, ?, ?, ?, ?)";


    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        // Eksekusi query
        mysqli_stmt_bind_param($stmt, 'sssss', $namalengkap, $username, $email, $password, $role);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Kembali ke halaman awal
            header("Location: login.php");
            exit();
            // Kalo salah ke halaman eror
        }

        mysqli_stmt_close($stmt);
    }
}
?>
<div class="d-flex bg-gradient-primary vh-100 align-items-center justify-content-between">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Perpusma!</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group">
                                    <input type="text" name="namalengkap" class="form-control form-control-user" id="exampleInputText" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="exampleInputText" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputEmail" placeholder="Password">
                                </div>
                                <input type="hidden" name="role" value="anggota">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Buat Akun
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <p class="small">Sudah punya akun? <a href="login.php">Masuk!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
$content = ob_get_clean();
include('layout/loginlayout.php');
?>