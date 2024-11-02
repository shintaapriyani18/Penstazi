<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$jumlahdataperhalaman = 5;
$jumlahdata = count(query("SELECT * FROM status_gizi"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

$balita = query("SELECT * FROM status_gizi 
                 INNER JOIN balita ON status_gizi.id_balita = balita.id
                 LIMIT $awaldata, $jumlahdataperhalaman
                ");

//tombol cari ditekan
if( isset($_POST["caribalita"]) ){
    $balita = caribalita($_POST["keyword"]);
}
?>

<html>
<head>
  <title>Laporan Data Balita dengan Status Gizi</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Laporan Data Balita dengan Status Gizi</h2>
				<div class="data-tables datatable-dark">
					
                <table class="table table-bordered" id="laporanstatusbalita" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th> 
                                        <th>Nama</th>
                                        <th>Berat Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Umur(Bulan)</th>
                                        <th>Status Gizi</th>
                                        <th>Status Tinggi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach( $balita as $row ) : ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row["nama"]; ?></td>
                                            <td><?php echo $row["berat_badan"]; ?></td>
                                            <td><?php echo $row["tinggi_badan"]; ?></td>
                                            <td><?php echo $row["umur_bulan"]; ?></td>
                                            <td><?php echo $row["status_gizi"]; ?></td>
                                            <td><?php echo $row["status_tinggi"]; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#laporanstatusbalita').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>