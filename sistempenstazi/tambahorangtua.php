<?php
session_start();

require 'functions.php';

$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[login]'"));

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
   
    //cek apakah data berhasil ditambahkan atau tidak
    if( tambahorangtua($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'orangtua.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'orangtua.php';
        </script>
        ";
    }

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

    <title>Tambah Data Orang Tua</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Data Orang Tua</h1>

                    <form action="" method="post">
                        <div class="row mb-3">
                            <label for="namaorangtua" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" name="namaorangtua" class="form-control" id="nama" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nik_orangtua" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                            <input type="text" name="nik_orangtua" class="form-control" id="nik_orangtua" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                            <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                            <input type="date" name="tanggallahir" class="form-control" id="tanggallahir" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="golongandarah" class="col-sm-2 col-form-label">Golongan Darah</label>
                            <div class="col-sm-10">
                            <input type="text" name="golongandarah" class="form-control" id="golongandarah" required>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="Perempuan">
                                <label class="form-check-label" for="perempuan">
                                Perempuan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="lakilaki" value="Laki-laki">
                                <label class="form-check-label" for="lakilaki">
                                Laki-laki
                                </label>
                            </div>
                            </div>
                        </fieldset>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Pelayanan</legend>
                            <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenispelayanan" id="jkn" value="JKN">
                                <label class="form-check-label" for="jkn">
                                JKN
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenispelayanan" id="asuransilain" value="Asuransi Lain">
                                <label class="form-check-label" for="asuransilain">
                                Asuransi Lain
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="jenispelayanan" id="tidakada" value="Tidak Ada">
                                <label class="form-check-label" for="tidakada">
                                Tidak Ada
                                </label>
                            </div>
                            </div>
                        </fieldset>
                        <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Fasilitas Pelayanan Kesehatan</legend>
                            <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fasilitas" id="primer" value="Primer">
                                <label class="form-check-label" for="primer">
                                Primer
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fasilitas" id="sekunder" value="Sekunder">
                                <label class="form-check-label" for="sekunder">
                                Sekunder
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="fasilitas" id="tidakada" value="Tidak Ada">
                                <label class="form-check-label" for="tidakada">
                                Tidak Ada
                                </label>
                            </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="pendidikam" class="col-sm-2 col-form-label">Pendidikan</label>
                            <div class="col-sm-10">
                            <input type="text" name="pendidikan" class="form-control" id="pendidikan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                            <input type="text" name="alamat" class="form-control" id="alamat" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telepon" class="col-sm-2 col-form-label">No Telepon</label>
                            <div class="col-sm-10">
                            <input type="text" name="telepon" class="form-control" id="telepon" required>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="statusorangtua" id="ibu" value="Ibu">
                                <label class="form-check-label" for="ibu">
                                Ibu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="statusorangtua" id="ayah" value="Ayah">
                                <label class="form-check-label" for="ayah">
                                Ayah
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="statusorangtua" id="wali" value="Wali">
                                <label class="form-check-label" for="wali">
                                Wali
                                </label>
                            </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>

                        <a href="orangtua.php" class="btn btn-primary">Kembali</a>
                    </form>
            
                </div>
                <!-- /.container-fluid -->

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
                        <span aria-hidden="true">×</span>
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