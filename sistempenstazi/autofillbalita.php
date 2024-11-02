<?php
require 'functions.php';
$nik = $_GET['nik'];
$sql = mysqli_query($conn, "SELECT * FROM balita WHERE nik = '$nik'");
$balita = mysqli_fetch_array($sql);


$data = array (
    'nama' => $balita['nama'],
    'jenis_kelamin' => $balita['jenis_kelamin']
);

    echo json_encode($data);

?>