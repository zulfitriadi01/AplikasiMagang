<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("users", $_POST['fullname'], $_POST['username'], $_POST['password'])) {
            echo "Registrasi berhasil";
        } else echo "Registrasi gagal";
    } else echo "Error: Database connection";
} else echo "Data tidak boleh kosong";
?>
