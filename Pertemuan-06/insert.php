// Insert Database
<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];

mysqli_query($conn, "INSERT INTO mahasiswa (nama, email) VALUES ('$nama', '$email')");

header("Location: index.php");
?>