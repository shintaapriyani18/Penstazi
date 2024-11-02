<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id_statusgizi = $_GET['id'];

if( hapusstatusbalita($id_statusgizi) > 0 ) {
    echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'statusgizi.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'statusgizi.php';
        </script>
        "; 
}

?>