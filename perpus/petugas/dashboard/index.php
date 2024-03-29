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
        <div class="col-xl-3 col-md-6 mb-4">
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

        <!-- Jumlah Anggota -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-primary shadow h-100 py-2 text-decoration-none" href="../anggota/index.php">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Anggota
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $jumlahanggota; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Rak Buku -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-primary shadow h-100 py-2 text-decoration-none" href="../anggota/index.php">
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
        <div class="col-xl-3 col-md-6 mb-4">
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

        <div class="col-xl-6 col-md-6 mb-4">
            <a class="card border-left-primary shadow h-100 py-2 text-decoration-none" href="../peminjaman/index.php">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Buku Yang Dipinjam
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                0
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <a class="card border-left-primary shadow h-100 py-2 text-decoration-none" href="../pengembalian/index.php">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Buku yang dikembalikan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                0
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bookmark fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-start justify-content-between">
                    <div class="div">
                        <h4 class="m-0 font-weight-bold text-primary">
                            Laporan Harian
                        </h4>
                    </div>
                    <!-- Dropdown Text -->
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">
                                Action
                            </div>
                            <a class="dropdown-item" href="#">
                                Download SVG
                            </a>
                            <a class="dropdown-item" href="#">
                                Download PNG
                            </a>
                            <a class="dropdown-item" href="#">
                                Download PDF
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 col-md-4">
                            <h4 class="text-success font-weight-bold">Anggota Baru</h4>
                            <h3 class="font-weight-normal text-gray-800">01</h3>
                        </div>
                        <div class="col-6 col-md-4">
                            <h4 class="text-primary font-weight-bold">Peminjaman</h4>
                            <h3 class="font-weight-normal text-gray-800">01</h3>
                        </div>
                        <div class="col-6 col-md-4">
                            <h4 class="text-primary font-weight-bold">Pengembalian</h4>
                            <h3 class="font-weight-normal text-gray-800">01</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include('../layout/indexlayout.php')
?>