<?php
include('../sistem/koneksi.php');
session_start();

if (@$_SESSION["role"] == "admin") {
    header("Location: ../admin/dashboard/index.php");
} elseif (@$_SESSION["status"] == "petugas") {
    header("Location: ../petugas/dashbord/index.php");
} elseif (@$_SESSION["status"] == "anggota") {
    header("Location: ../anggota/dashboard/index.php");
}
