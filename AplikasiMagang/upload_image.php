<?php

include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $DefaultId = 0;
    $Kegiatan = $_POST['kegiatan'];
    $BidangPenempatan = $_POST['bidang_penempatan'];
    $Keterangan = $_POST['keterangan'];
    $Asal = $_POST['asal'];
    $ImageData = $_POST['image_data'];
    $ImageName = $_POST['image_tag'];
    $ImagePath = "upload/$ImageName.jpg";
    $ServerURL = "http://192.168.1.9/ $ImagePath";
    $InsertSQL = "INSERT INTO imageupload (nama_kegiatan, bidang_penempatan, keterangan, asal, image_path, image_name) VALUES ('$Kegiatan','$BidangPenempatan', '$Keterangan', '$Asal', '$ServerURL', '$ImageName')";

    if (mysqli_query($conn, $InsertSQL)){
        file_put_contents($ImagePath, base64_decode($ImageData));
        echo "Your Image Has Been Uploaded.";

    }
    mysqli_close($conn);
} else {
    echo "Please try again";
}