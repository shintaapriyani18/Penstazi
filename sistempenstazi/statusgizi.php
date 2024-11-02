<?php
session_start();

require 'functions.php';

$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[login]'"));

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

$jumlahdataperhalaman = 5;
$jumlahdata = count(query("SELECT * FROM status_gizi"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"]) ) ? $_GET("halaman") : 1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

$statusgizi = query("SELECT * FROM status_gizi 
                 INNER JOIN balita ON status_gizi.id_balita = balita.id
                 LIMIT $awaldata, $jumlahdataperhalaman
                ");

//tombol cari ditekan
if( isset($_POST["caristatusbalita"]) ){
    $statusgizi = caristatusbalita($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Balita</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i><img src="img/logo.png" width="50px" height="50px"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sistem Penstazi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

              <!-- Divider -->
              <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu
</div>

<!-- Nav Item - Pages Collapse Menu -->
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pendataan Identitas</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">:</h6> -->
            <a class="collapse-item" href="balita.php">Data Balita</a>
            <a class="collapse-item" href="orangtua.php">Data Orang Tua</a>
        </div>
    </div>
</li>


          <!-- Nav Item - Utilities Collapse Menu -->
          <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Sistem Status Gizi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="bbumurlakilaki.php">BB/U Laki-Laki</a>
                        <a class="collapse-item" href="bbumurperempuan.php">BB/U Perempuan</a>
                        <a class="collapse-item" href="pbumurperempuan.php">PB/U Perempuan</a>
                        <a class="collapse-item" href="tbumurperempuan.php">TB/U Perempuan</a>
                        <a class="collapse-item" href="pbumurlakilaki.php">PB/U Laki-laki</a>
                        <a class="collapse-item" href="tbumurlakilaki.php">TB/U Laki-Laki</a>
                        <a class="collapse-item" href="statusgizi.php">Status Gizi</a> 
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['username']; ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-4 text-gray-800">Admin</h1> -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Balita</h1>
                    <a href="exportstatusbalita.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Buat Laporan</a>
</div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="hitungstatusgizi.php" class="btn btn-primary">Hitung</a>
                        <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" 
                            action="" method="post">
                            <div class="input-group">
                            <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Cari Data Status Balita..." 
                                autofocus autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-primary" name="caristatusbalita" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                            </div>
                        </form> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th> 
                                        <th>Nama</th> 
                                        <th>Berat Badan</th> 
                                        <th>Tinggi Badan</th> 
                                        <th>Umur</th> 
                                        <th>Status Gizi</th> 
                                        <th>Status Tinggi</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach( $statusgizi as $row ) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["berat_badan"]; ?></td>
                                            <td><?= $row["tinggi_badan"]; ?></td>
                                            <td><?= $row["umur_bulan"]; ?></td>
                                            <td><?= $row["status_gizi"]; ?></td>
                                            <td><?= $row["status_tinggi"]; ?></td>
                                            <td>
                                                <a href="hapusstatusbalita.php?id=<?= $row["id_statusgizi"]; ?>" class="btn btn-danger" 
                                                   onclick="return confirm('Apakah anda yakin menghapus data?');">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <ul class="pagination">
                                <?php if( $halamanaktif > 1 ) : ?>
                                    <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanaktif - 1; ?>">&laquo;</a></li>
                                <?php endif; ?>

                            <?php for( $i = 1; $i <= $jumlahhalaman; $i++ ) : ?>
                                    <?php if( $i== $halamanaktif ) : ?>
                                            <li class="page-item"><a class="page-link" href="?halaman<?= $i; ?>" style="font-weight: bold; color:blue"><?= $i; ?></a></li>
                                        <?php else: ?>
                                            <li class="page-item"><a class="page-link" href="?halaman<?= $i; ?>"><?= $i; ?></a></li>
                                    <?php endif; ?>
                            <?php endfor; ?>
                                <?php if( $halamanaktif < $jumlahhalaman ) : ?>
                                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanaktif + 1; ?>">&raquo;</a></li>
                                    <?php endif; ?>
                            </ul>
                            <a href="index.php" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah jika ingin keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>