<?php
session_start();
include('koneksi.php');


// Variabel Akun
$email = $_POST['email'];
$password = $_POST['password'];

// Query Select SQL
$query = "SELECT * from user WHERE email = ? AND password = ?";

// Validasi data di database
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Pengarahan menuju halaman masing-masing role
if ($user) {
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['role'] = $user['role'];

    switch ($user['role']) {
        case 'admin':
            header('Location: ../admin/dashboard/index.php');
            break;
        case 'petugas':
            header('Location: ../petugas/dashboard/index.php');
            break;
        case 'anggota':
            header('Location: ../anggota/dashboard/index.php');
            break;
        default:
            // Rolenya ga ada
            header('Location: ../auth/login.php');
    }
} else {
    // Kalo login gagal balik lagi ke halaman login
    header('Location: ../auth/login.php');
}
