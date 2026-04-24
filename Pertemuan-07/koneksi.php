<?php
// koneksi ke database
$host     = "localhost";
$user     = "root";
$password = "";        
$database = "db_campus";

$koneksi = mysqli_connect($host, $user, $password, $database);

// cek koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8");
?>