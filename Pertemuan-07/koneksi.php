<?php
// koneksi ke database
$host     = "localhost";
$user     = "root";
$password = "";        
$database = "db_campus";

$koneksi = mysqli_connect($host, $user, $password, $database);

// ngecek kalau koneksinya gagal
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// biar format teksnya aman
mysqli_set_charset($koneksi, "utf8");
?>