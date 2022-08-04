<?php

include 'koneksi.php';


$nama = $_POST['nama_peserta'];
$tanggal = $_POST['tanggal'];
$jenis = $_POST['jenis_pengajuan'];
$keterangan = $_POST['keterangan'];


if (isset($nama) && isset($tanggal) && isset($jenis) && isset($keterangan) ) {
    $add_database = mysqli_query ($koneksi, "INSERT INTO pengajuan VALUES ('$nama', '$tanggal', '$jenis', '$keterangan', )");
   
    if ($add_database){
        $pesan = 'Data berhasil disimpan';

    }else {
        $pesan = 'Data gagal disimpan';
    }
    echo json_encode(array(
        'status' => $pesan
    ));
}
