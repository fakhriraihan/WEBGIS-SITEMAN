<?php
$db_host    = "localhost";
$db_user    = "root";
$db_pass    = "";
$db_name    = "dokumen";

$koneksidok    = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(!$koneksidok){
    die("Koneksi Gagal");
} 