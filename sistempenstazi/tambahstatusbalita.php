<?php

require 'functions.php';

$nik = $_GET['nik'];
$nama = $_GET['nama'];
$beratbadan = $_GET['berat_badan'];
$tinggibadan = $_GET['tinggi_badan'];
$umur = $_GET['umur'];
$statusgizi = $_GET['statusgizi'];
$statustinggi = $_GET['statustinggi'];

if( isset($_GET["submit"]) ) {
$queryselect = mysqli_query($conn,"SELECT * FROM balita WHERE nik = '$nik'");

$id = mysqli_fetch_assoc($queryselect);
// echo $id['id_orangtua'];

 $beratbadan1 = htmlspecialchars($beratbadan);
 $tinggibadan1 = htmlspecialchars($tinggibadan);
 $umurbulan1 = htmlspecialchars($umur);
 $statusgizi1 = htmlspecialchars($statusgizi);
 $statustinggi1 = htmlspecialchars($statustinggi);
 $id_balita = $id['id'];

//  echo $statusgizi;
 $tambah = mysqli_query($conn, "INSERT INTO status_gizi VALUES ('', '$beratbadan1', '$tinggibadan1', '$umurbulan1', '$statusgizi1', '$statustinggi1', '$id_balita')");
if( $tambah ) {
    echo "
    <script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href = 'statusgizi.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data Gagal Ditambahkan!');
        document.location.href = 'statusgizi.php';
    </script>
    ";
}
}

?>