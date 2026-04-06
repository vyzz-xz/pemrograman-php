<?php
include 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, jurusan, alamat) VALUES ('$nim', '$nama', '$jurusan', '$alamat')");

header("Location: index.php");
?>