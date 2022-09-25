<?php

include 'koneksiDB.php';

$query = mysqli_query($koneksi, "SELECT * FROM absenkeluar ");

$json = array();

while($row = mysqli_fetch_assoc($query)){
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($koneksi);
?>