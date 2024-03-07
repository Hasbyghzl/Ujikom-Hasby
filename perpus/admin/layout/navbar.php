<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto align-items-center">

        <!-- Nav Item - Ajukan Permintaan -->
        <li class="nav-item">
            <a href="../peminjaman/index.php" class="btn btn-sm btn-primary mr-2">
                Ajukan Peminjaman
            </a>
        </li>

        <!-- Nav Item - Ajukan Peminjaman -->
        <li class="nav-item">
            <a href="../pengembalian/index.php" class="btn btn-sm btn-outline-primary mr-4">
                Ajukan Pengembalian
            </a>
        </li>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        User
                                    </span> -->
                <img class="img-profile rounded-circle" src="../../src/img/undraw_profile.svg" />
            </a>

            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../../sistem/logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->