<?php
require 'functions.php';
$nik_orangtua = $_GET['nik_orangtua'];
$sql = mysqli_query($conn, "SELECT * FROM orang_tua WHERE nik_orangtua = '$nik_orangtua'");
$orangtua = mysqli_fetch_array($sql);




$data = array (
    'nama_orangtua' => $orangtua['nama_orangtua']
);

    echo json_encode($data);
?>