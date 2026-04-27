<?php
include 'koneksi.php'; //Panggil koneksi

// Ambil ID dari URL
$id = $_GET['id'];
// hapus data sesuai ID
mysqli_query($koneksi, "DELETE FROM krs WHERE id='$id'");
// balik ke halaman index.php
header("Location: index.php");
exit();
?>