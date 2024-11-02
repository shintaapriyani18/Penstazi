<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$orangtua = query("SELECT * FROM orang_tua");

//tombol cari ditekan
if( isset($_POST["cariorangtua"]) ){
    $orangtua = cariorangtua($_POST["keyword"]);
}
?>

<html>
<head>
  <title>Laporan Data Orang Tua</title>
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
			<h2>Laporan Data Orang Tua</h2>
				<div class="data-tables datatable-dark">
					
                <table class="table table-bordered" id="laporanorangtua" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th> 
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Tempat 
                                            Lahir
                                        </th>
                                        <th>Tanggal
                                            Lahir
                                        </th>
                                        <th>Golongan
                                            Darah
                                        </th>
                                        <th>Jenis
                                            Kelamin
                                        </th>
                                        <th>Jenis 
                                            Pelayanan
                                        </th>
                                        <th>Fasilitas 
                                            Pelayanan 
                                            Kesehatan
                                        </th>
                                        <th>Pendidikan</th>
                                        <th>Pekerjaan</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach( $orangtua as $row ) : ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row["nama_orangtua"]; ?></td>
                                            <td><?php echo $row["nik_orangtua"]; ?></td>
                                            <td><?php echo $row["tempat_lahir"]; ?></td>
                                            <td><?php echo $row["tanggal_lahir"]; ?></td>
                                            <td><?php echo $row["golongan_darah"]; ?></td>
                                            <td><?php echo $row["jenis_kelamin"]; ?></td>
                                            <td><?php echo $row["jenis_pelayanan"]; ?></td>
                                            <td><?php echo $row["fasilitas_pelayanan_kesehatan"]; ?></td>
                                            <td><?php echo $row["pendidikan"]; ?></td>
                                            <td><?php echo $row["pekerjaan"]; ?></td>
                                            <td><?php echo $row["alamat"]; ?></td>
                                            <td><?php echo $row["telepon"]; ?></td>
                                            <td><?php echo $row["status_orangtua"]; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#laporanorangtua').DataTable( {
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