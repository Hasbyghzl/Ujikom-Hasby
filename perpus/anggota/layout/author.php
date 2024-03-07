<?php
session_start();

// Cek yang akses udah login atau belum
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header('Location: ../../auth/login.php');
    exit;
}

// Cek rolenya anggota atau bukan
if ($_SESSION['role'] !== 'anggota') {
    // Kalo bukan arahin ke halaman eror
    header('Location: ../../error/errorakses.php');
    exit;
}
