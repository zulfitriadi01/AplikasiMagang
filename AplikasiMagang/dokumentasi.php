
<?php

include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $DefaultId = 0;
    $ImageData = $_POST['image_data'];
    $ImageName = $_POST['image_tag'];
    $ImagePath = "upload/$ImageName.jpg";
    $ServerURL = "http://192.168.1.8/aplikasimagang/$ImagePath";
    $nama = $_POST['nama_peserta'];
    $asal = $_POST['asal'];
    $namakegiatan = $_POST['nama_kegiatan'];
    $tanggal = $_POST['tanggal'];
    $bidang = $_POST['bidang'];
    $keterangan = $_POST['keterangan'];

$InsertSQL = "INSERT INTO dokumentasi (nama_peserta, asal, nama_kegiatan, tanggal, bidang, keterangan, image_path, image_name) VALUES ('$nama', '$asal', '$namakegiatan', '$tanggal', '$bidang', '$keterangan', '$ServerURL', '$ImageName' )";


if (mysqli_query($conn, $InsertSQL)){
    file_put_contents($ImagePath, base64_decode($ImageData));
    echo "Data berhasil disimpan";

}
mysqli_close($conn);
} else {
echo "Coba Kembali";
}

?>

