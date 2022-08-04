<?php

$image = base64_decode($_POST['foto']);
$namaimage= rand(1, 10000);

$nama = "image-".$namaimage;

$targer_dir="foto/".$nama.".jpeg";

if (file_put_contents($targer_dir, $image)) {
    echo json_encode(array('response'=>'succes'));

} else {
    echo json_encode(array('response'=>'image not upload'));
}
?>