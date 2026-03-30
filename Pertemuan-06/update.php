<?php
include 'koneksi.php';

$id = $_GET['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];

mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', email='$email' WHERE id='$id'");

header("Location: index.php");
?>