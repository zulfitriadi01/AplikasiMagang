<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "aplikasiabsensi";
$koneksi = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno()){
    echo "gagal konek dengan database" . mysqli_connect_errno();

}

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM users where username = '$username' AND password = '$password' ";
$obj_query = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($obj_query);

if ($data){
    echo json_encode (
        array(
            'response ' => true ,
            'payload' => array (
                "fullname" => $data["fullname"],
                "username" => $data["username"],
                "role" => $data["role"],
            )
        )
            );
}else {
    echo json_encode(
        array(
            'response' => false,
            'payload' => null
        )
        );
}

header('Content-Type: application/json');