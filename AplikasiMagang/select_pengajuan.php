<?php

include 'koneksiDB.php';

$query = mysqli_query($koneksi, "SELECT * FROM pengajuan ORDER BY tanggal");

$json = array();

while($row = mysqli_fetch_assoc($query)){
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($koneksi);
?>