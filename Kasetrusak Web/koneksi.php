<?php
$host     = "localhost";
$username = "root"; 
$password = "";    
$database = "db_kasetrusak"; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>