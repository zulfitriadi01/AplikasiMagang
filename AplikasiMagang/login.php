<?php
require "DataBase.php";
$db = new DataBase();

//if ($db->logIn("users", $_POST['admin'], $_POST['admin'])){
  //  echo "Login Success;"
//} else echo "Salah";
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->logIn("users", $_POST['username'], $_POST['password'])) {
            echo "Login berhasil";
        } else echo "Username atau Password Salah";
    
    } else echo "Error: Database connection";
} else echo "Data tidak boleh kosong";


?>
