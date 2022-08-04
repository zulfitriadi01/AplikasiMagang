<?php

include 'koneksi.php';


$nama = $_POST['nama_kegiatan'];
$tanggal = $_POST['tanggal'];
$bidang = $_POST['bidang'];
$keterangan = $_POST['keterangan'];


if (isset($nama) && isset($tanggal) && isset($bidang) && isset($keterangan) ) {
    $add_database = mysqli_query ($koneksi, "INSERT INTO pengajuan VALUES ('$nama', '$tanggal', '$bidang', '$keterangan', )");
   
    if ($add_database){
        $pesan = 'Data berhasil disimpan';

    }else {
        $pesan = 'Data gagal disimpan';
    }
    echo json_encode(array(
        'status' => $pesan
    ));
}
