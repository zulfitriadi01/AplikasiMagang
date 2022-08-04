<?php

include 'koneksiDB.php';


$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];

if (isset($nama) && isset($tanggal) && isset($jam)) {
    $add_dosen = mysqli_query ($koneksi, "INSERT INTO absenkeluar VALUES ('$nama', '$tanggal', '$jam')");
   
    if ($add_dosen){
        $pesan = 'Data berhasil disimpan';

    }else {
        $pesan = 'Data gagal disimpan';
    }
    echo json_encode(array(
        'status' => $pesan
    ));
}
