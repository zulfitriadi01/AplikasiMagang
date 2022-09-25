<?php

include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];

$InsertSQL = "INSERT INTO absenkeluar (nama, tanggal,jam) VALUES ('$nama',  '$tanggal', '$jam' )";

if (mysqli_query($conn, $InsertSQL)){
    echo "Data berhasil disimpan.";

}
mysqli_close($conn);
} else {
echo "Coba kembali";



}
?>
