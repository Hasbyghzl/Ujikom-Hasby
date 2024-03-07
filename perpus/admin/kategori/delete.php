<?php
include('../../sistem/koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //Query Delete
    $deleteQuery = "DELETE FROM kategori WHERE kategori_id = $id";
    $deleteResult = mysqli_query($koneksi, $deleteQuery);

    if ($deleteResult) {
        // Kembali ke halaman awal
        header("Location: index.php");
        exit();
    } else {
        // Kalo gagal arahin ke halaman eror
        header("Location: ../../error/error.php");
    }
} else {
    // Kalo ga ada idnya
    header("Location: ../../error/error.php");
    exit();
}
