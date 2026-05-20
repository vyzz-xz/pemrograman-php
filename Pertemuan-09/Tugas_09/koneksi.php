<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "my_blog";

// Buat ngehubungin ke db
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// kalo koneksi gagal, tampilkan pesan error
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>