<?php

$conn = mysqli_connect("localhost", "root", "", "gizi");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahbalita($data) {
    global $conn;

//     $query1 = ("SELECT * FROM orang_tua WHERE nik_orangtua = '$data[nik_orangtua]'");

//     $id = mysqli_fetch_assoc($query1);
    

//      $nama = htmlspecialchars($data["nama"]);
//      $anak_ke = htmlspecialchars($data["anakke"]);
//      $no_akte = htmlspecialchars($data["noakte"]);
//      $nik = htmlspecialchars($data["nik"]);
//      $tempat_lahir = htmlspecialchars($data["tempatlahir"]);
//      $tanggal_lahir = htmlspecialchars($data["tanggallahir"]);
//      $jenis_kelamin = htmlspecialchars($data["jeniskelamin"]);
//      $golongan_darah = htmlspecialchars($data["golongandarah"]);
//      $jenis_pelayanan =  htmlspecialchars($data["jenispelayanan"]);
//      $fasilitas_pelayanan_kesehatan = htmlspecialchars($data["fasilitas"]);
//      $alamat = htmlspecialchars($data["alamat"]);
//      $id_orangtua = $id['id_orangtua'];

//      //query insert data
//      $query = "INSERT INTO balita
//      VALUES
//    ('', '$nama', '$anak_ke', '$no_akte', '$nik', '$tempat_lahir', '$tanggal_lahir', 
//      '$jenis_kelamin', '$golongan_darah', '$jenis_pelayanan', '$fasilitas_pelayanan_kesehatan', '$alamat', '$id_orangtua')
//      ";

//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
}


function hapusbalita($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM balita WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function editbalita($data) {
    global $conn;
    
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $anak_ke = htmlspecialchars($data["anakke"]);
    $no_akte = htmlspecialchars($data["noakte"]);
    $nik = htmlspecialchars($data["nik"]);
    $tempat_lahir = htmlspecialchars($data["tempatlahir"]);
    $tanggal_lahir = htmlspecialchars($data["tanggallahir"]);
    $jenis_kelamin = htmlspecialchars($data["jeniskelamin"]);
    $golongan_darah = htmlspecialchars($data["golongandarah"]);
    $jenis_pelayanan =  htmlspecialchars($data["jenispelayanan"]);
    $fasilitas_pelayanan_kesehatan = htmlspecialchars($data["fasilitas"]);
    $alamat = htmlspecialchars($data["alamat"]);
 

    //query update data
   $query = " UPDATE balita SET 
              nama = '$nama',   
              anak_ke = '$anak_ke',
              no_akte = '$no_akte',
              nik = '$nik',
              tempat_lahir = '$tempat_lahir',
              tanggal_lahir = '$tanggal_lahir',
              jenis_kelamin = '$jenis_kelamin',
              golongan_darah = '$golongan_darah',
              jenis_pelayanan = '$jenis_pelayanan',
              fasilitas_pelayanan_kesehatan = '$fasilitas_pelayanan_kesehatan',
              alamat = '$alamat'
              WHERE id = $id;
              ";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

function caribalita($keyword) {
    $query = "SELECT * FROM balita 
             WHERE 
             nama LIKE '%$keyword%' OR
             anak_ke LIKE '%$keyword%' OR
             no_akte LIKE '%$keyword%' OR
             nik LIKE '%$keyword%' OR
             tempat_lahir LIKE '%$keyword%' OR
             tanggal_lahir LIKE '%$keyword%' OR
             jenis_kelamin LIKE '%$keyword%' OR
             golongan_darah LIKE '%$keyword%' OR
             jenis_pelayanan LIKE '%$keyword%' OR
             fasilitas_pelayanan_kesehatan LIKE '%$keyword%' OR
             alamat LIKE '%$keyword%'
             ";

    return query($query);
}

function tambahorangtua($data) {
    global $conn;


     $nama_orangtua = htmlspecialchars($data["namaorangtua"]);
     $nik_orangtua = htmlspecialchars($data["nik_orangtua"]);
     $tempat_lahir = htmlspecialchars($data["tempatlahir"]);
     $tanggal_lahir = htmlspecialchars($data["tanggallahir"]);
     $golongan_darah = htmlspecialchars($data["golongandarah"]);
     $jenis_kelamin = htmlspecialchars($data["jeniskelamin"]);
     $jenis_pelayanan =  htmlspecialchars($data["jenispelayanan"]);
     $fasilitas_pelayanan_kesehatan = htmlspecialchars($data["fasilitas"]);
     $pendidikan = htmlspecialchars($data["pendidikan"]);
     $pekerjaan = htmlspecialchars($data["pekerjaan"]);
     $alamat = htmlspecialchars($data["alamat"]);
     $telepon = htmlspecialchars($data["telepon"]);
     $status_orangtua = htmlspecialchars($data["statusorangtua"]);

     //query insert data
    $query = "INSERT INTO orang_tua
    VALUES
  ('', '$nama_orangtua', '$nik_orangtua', '$tempat_lahir', '$tanggal_lahir', '$golongan_darah', '$jenis_kelamin', 
    '$jenis_pelayanan', '$fasilitas_pelayanan_kesehatan', '$pendidikan', '$pekerjaan', '$alamat', '$telepon', '$status_orangtua')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusorangtua($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM orang_tua WHERE id_orangtua = $id");

    return mysqli_affected_rows($conn);
}

function editorangtua($data) {
    global $conn;
    
     $id = ($data["id_orangtua"]);
     $nama_orangtua = htmlspecialchars($data["nama_orangtua"]);
     $nik_orangtua = htmlspecialchars($data["nik_orangtua"]);
     $tempat_lahir = htmlspecialchars($data["tempatlahir"]);
     $tanggal_lahir = htmlspecialchars($data["tanggallahir"]);
     $golongan_darah = htmlspecialchars($data["golongandarah"]);
     $jenis_kelamin = htmlspecialchars($data["jeniskelamin"]);
     $jenis_pelayanan =  htmlspecialchars($data["jenispelayanan"]);
     $fasilitas_pelayanan_kesehatan = htmlspecialchars($data["fasilitas"]);
     $pendidikan = htmlspecialchars($data["pendidikan"]);
     $pekerjaan = htmlspecialchars($data["pekerjaan"]);
     $alamat = htmlspecialchars($data["alamat"]);
     $telepon = htmlspecialchars($data["telepon"]);
     $status_orangtua = htmlspecialchars($data["statusorangtua"]);

    //query update data
   $query = "UPDATE orang_tua SET  
            nama_orangtua = '$nama_orangtua',
            nik_orangtua = '$nik_orangtua',
            tempat_lahir = '$tempat_lahir',
            tanggal_lahir = '$tanggal_lahir',
            golongan_darah = '$golongan_darah',
            jenis_kelamin = '$jenis_kelamin',
            golongan_darah = '$golongan_darah',
            jenis_pelayanan = '$jenis_pelayanan',
            fasilitas_pelayanan_kesehatan = '$fasilitas_pelayanan_kesehatan',
            pendidikan = '$pendidikan',
            pekerjaan = '$pekerjaan',
            alamat = '$alamat',
            telepon = '$telepon',
            status_orangtua = '$status_orangtua'
            WHERE id_orangtua = $id
            "; 

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

function cariorangtua($keyword) {
    $query = "SELECT * FROM orang_tua
             WHERE 
             nama_orangtua LIKE '%$keyword%' OR
             nik_orangtua LIKE '%$keyword%' OR
             tempat_lahir LIKE '%$keyword%' OR
             tanggal_lahir LIKE '%$keyword%' OR
             golongan_darah LIKE '%$keyword%' OR
             jenis_kelamin LIKE '%$keyword%' OR
             jenis_pelayanan LIKE '%$keyword%' OR
             fasilitas_pelayanan_kesehatan LIKE '%$keyword%' OR
             pendidikan LIKE '%$keyword%' OR
             pekerjaan LIKE '%$keyword%' OR
             alamat LIKE '%$keyword%' OR
             telepon LIKE '%$keyword%' OR
             status_orangtua LIKE '%$keyword%'
             ";

    return query($query);
}

function registrasi($data) {
    global $conn;

    $nama = $data["nama"];
    $username = strtolower(stripslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $ulangipassword = mysqli_real_escape_string($conn, $data["ulangipassword"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE
                 username = '$username'");
    
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
              alert('Username sudah terdaftar!');
              </script>";
        return false;
    }

    //cek konfirmasi password
    if( $password !== $ulangipassword ) {
        echo "<script>
               alert('Password tidak sesuai!');
              </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$username', '$email', '$password')");

    return mysqli_affected_rows($conn);
}

    function hapusstatusbalita($id_statusgizi) {
        global $conn;
        mysqli_query($conn, "DELETE FROM status_gizi WHERE id_statusgizi = $id_statusgizi");
    
        return mysqli_affected_rows($conn);
    }

    function caristatusbalita($keyword) {
        $query = "SELECT * FROM status_gizi
                 WHERE 
                 berat_badan LIKE '%$keyword%' OR
                 tinggi_badan LIKE '%$keyword%' OR
                 umur_bulan LIKE '%$keyword%' OR
                 status_gizi LIKE '%$keyword%' OR
                 status_tinggi LIKE '%$keyword%' OR
                 id_balita LIKE '%$keyword%' 
                 ";
    
        return query($query);
    }

    
?>