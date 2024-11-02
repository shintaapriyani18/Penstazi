<?php
session_start();

require 'functions.php';

$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[login]'"));

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

$nama = $_GET['nama'];
$jeniskelamin = $_GET['jenis_kelamin'];
$beratbadan = $_GET['berat_badan'];
$tinggibadan = $_GET['tinggi_badan'];
$umur = $_GET['umur_bulan'];

if( isset($_GET["pencet"]) ) {
   
    if($jeniskelamin == 'Laki-laki') {
        $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM bbu_lakilaki WHERE umur_bulan = $umur"));
    
        $hasilawal = $beratbadan - $query['median'];
        
        if($hasilawal > 0) {
            $hasilgizi = $hasilawal / ($query['1sd'] - $query['median']);
        }elseif($hasilawal < 0) {
            $hasilgizi = $hasilawal / ($query['median'] - $query['-1sd']);
        }

        if($hasilgizi < -3 ) {
            $statusgizi = "Gizi Buruk";
        }elseif($hasilgizi >= -3 && $hasilgizi < -2) {
            $statusgizi = "Gizi Kurang";
        }elseif($hasilgizi >= -2 && $hasilgizi < 2) {
            $statusgizi = "Gizi Baik";
        }else {
            $statusgizi = "Gizi Lebih";
        }

        if($umur < 24) {
            $querypb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pbu_lakilaki"));

            $hasilpertama = $tinggibadan - $querypb['median'];

            if($hasilpertama > 0) {
                $hasiltinggi = $hasilpertama / ($querypb['1sd'] - $querypb['median']);
            }elseif($hasilpertama < 0) {
                $hasiltinggi = $hasilpertama / ($querypb['median'] - $querypb['-1sd']);
            }

            if($hasiltinggi < -3 ) {
                $statustinggi = "Sangat Pendek";
            }elseif($hasiltinggi >= -3 && $hasiltinggi < -2) {
                $statustinggi = "Pendek";
            }elseif($hasiltinggi >= -2 && $hasiltinggi < 2) {
                $statustinggi = "Normal";
            }else {
                $statustinggi = "Tinggi";
            }
            
        }else{
            $querypb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbu_lakilaki"));

            $hasilpertama = $tinggibadan - $querypb['median']; 

            if($hasilpertama > 0) {
                $hasiltinggi = $hasilpertama / ($querypb['1sd'] - $querypb['median']);
            }elseif($hasilpertama < 0) {
                $hasiltinggi = $hasilpertama / ($querypb['median'] - $querypb['-1sd']);
            }

            if($hasiltinggi < -3 ) {
                $statustinggi = "Sangat Pendek";
            }elseif($hasiltinggi >= -3 && $hasiltinggi < -2) {
                $statustinggi = "Pendek";
            }elseif($hasiltinggi >= -2 && $hasiltinggi < 2) {
                $statustinggi = "Normal";
            }else {
                $statustinggi = "Tinggi";
            }
            
        }
    }

    if($jeniskelamin == 'Perempuan') {
        $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM bbu_perempuan WHERE umur_bulan = $umur"));
    
        $hasilawal = $beratbadan - $query['median'];
        
        if($hasilawal > 0) {
            $hasilgizi = $hasilawal / ($query['1sd'] - $query['median']);
        }elseif($hasilawal < 0) {
            $hasilgizi = $hasilawal / ($query['median'] - $query['-1sd']);
        }

        if($hasilgizi < -3 ) {
            $statusgizi = "Gizi Buruk";
        }elseif($hasilgizi >= -3 && $hasilgizi < -2) {
            $statusgizi = "Gizi Kurang";
        }elseif($hasilgizi >= -2 && $hasilgizi < 2) {
            $statusgizi = "Gizi Baik";
        }else {
            $statusgizi = "Gizi Lebih";
        }

        if($umur < 24) {
            $querypb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pbu_perempuan"));

            $hasilpertama = $tinggibadan - $querypb['median']; 

            if($hasilpertama > 0) {
                $hasiltinggi = $hasilpertama / ($querypb['1sd'] - $querypb['median']);
            }elseif($hasilpertama < 0) {
                $hasiltinggi = $hasilpertama / ($querypb['median'] - $querypb['-1sd']);
            }

            if($hasiltinggi < -3 ) {
                $statustinggi = "Sangat Pendek";
            }elseif($hasiltinggi >= -3 && $hasiltinggi < -2) {
                $statustinggi = "Pendek";
            }elseif($hasiltinggi >= -2 && $hasiltinggi < 2) {
                $statustinggi = "Normal";
            }else {
                $statustinggi = "Tinggi";
            }
        }else{
            $querypb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbu_perempuan"));

            $hasilpertama = $tinggibadan - $querypb['median']; 

            if($hasilpertama > 0) {
                $hasiltinggi = $hasilpertama / ($query['1sd'] - $query['median']);
            }elseif($hasilpertama < 0) {
                $hasiltinggi = $hasilpertama / ($query['median'] - $query['-1sd']);
            }

            if($hasiltinggi < -3 ) {
                $statustinggi = "Sangat Pendek";
            }elseif($hasiltinggi >= -3 && $hasiltinggi < -2) {
                $statustinggi = "Pendek";
            }elseif($hasiltinggi >= -2 && $hasiltinggi < 2) {
                $statustinggi = "Normal";
            }else {
                $statustinggi = "Tinggi";
            } 
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

    <title>Hasil Status Gizi Balita</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Hasil Status Gizi Balita</h1>

                    <form action="tambahstatusbalita.php" method="get">
                    <div class="row mb-3">
                        <input type="hidden" name="nik" value="<?php echo $_GET['nik']; ?>">
                        <input type="hidden" name="nama" value="<?php echo $_GET['nama']; ?>">
                        <input type="hidden" name="berat_badan" value="<?php echo $_GET['berat_badan']; ?>">
                        <input type="hidden" name="tinggi_badan" value="<?php echo $_GET['tinggi_badan']; ?>">
                        <input type="hidden" name="umur" value="<?php echo $_GET['umur_bulan']; ?>">
                        <input type="hidden" name="statusgizi" value="<?php echo $statusgizi; ?>">
                        <input type="hidden" name="statustinggi" value="<?php echo $statustinggi; ?>">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $_GET['nama'] ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                            <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="<?php echo $_GET['jenis_kelamin'] ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="berat_badan" class="col-sm-2 col-form-label">Berat Badan(Kg)</label>
                            <div class="col-sm-10">
                            <input type="text" name="berat_badan" class="form-control" id="berat_badan" value="<?php echo $_GET['berat_badan'] ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tinggi_badan" class="col-sm-2 col-form-label">Tinggi Badan(CM)</label>
                            <div class="col-sm-10">
                            <input type="text" name="tinggi_badan" class="form-control" id="tinggi_badan" value="<?php echo $_GET['tinggi_badan'] ?>"disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="umur_bulan" class="col-sm-2 col-form-label">Umur(Bulan)</label>
                            <div class="col-sm-10">
                            <input type="text" name="umur_bulan" class="form-control" id="umur_bulan" value="<?php echo $_GET['umur_bulan'] ?>"disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="statusgizi" class="col-sm-2 col-form-label">Status Gizi</label>
                            <div class="col-sm-10">
                            <input type="text" name="statusgizi" class="form-control" id="statusgizi" value="<?php echo $statusgizi; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="statustinggi" class="col-sm-2 col-form-label">Status Tinggi</label>
                            <div class="col-sm-10">
                            <input type="text" name="statustinggi" class="form-control" id="statustinggi" value="<?php echo $statustinggi; ?>" disabled>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                            <a href="statusgizi.php" class="btn btn-primary">Kembali</a>
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
<?php } ?>