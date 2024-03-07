<?php
ob_start();
include('../../sistem/koneksi.php');
// Ambil jumlah buku
$selectbuku = "SELECT * FROM buku";
$totalbuku = mysqli_query($koneksi, $selectbuku);
$jumlahbuku = mysqli_num_rows($totalbuku);

// Ambil jumlah anggota
$selectanggota = "SELECT * FROM user WHERE role = anggota";
$totalanggota = mysqli_query($koneksi, $selectanggota);
$jumlahanggota = mysqli_num_rows($totalbuku);

// Ambil jumlah rak
$selectrak = "SELECT * FROM rak";
$totalrak = mysqli_query($koneksi, $selectrak);
$jumlahrak = mysqli_num_rows($totalrak);

// Ambil jumlah kategori
$selectkategori = "SELECT * FROM kategori";
$totalkategori = mysqli_query($koneksi, $selectkategori);
$jumlahkategori = mysqli_num_rows($totalkategori);
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Total Buku -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a class="card border-left-primary shadow h-100 py-2 text-decoration-none" href="../buku/index.php">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Buku
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $jumlahbuku; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Peminjaman -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a class="card border-left-primary shadow h-100 py-2 text-decoration-none" href="../rak/index.php">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Rak Buku
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $jumlahrak; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Kategori -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a class="card border-left-primary shadow h-100 py-2 text-decoration-none" href="../kategori/index.php">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Kategori
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $jumlahkategori; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include('../layout/indexlayout.php')
?>