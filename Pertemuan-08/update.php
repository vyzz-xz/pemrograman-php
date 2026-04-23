<?php
include 'koneksi.php';

$id = $_POST['id'];
$npm = $_POST['npm'];
$kodemk = $_POST['kodemk'];

mysqli_query($conn, "UPDATE krs SET mahasiswa_npm='$npm', matakuliah_kodemk='$kodemk' WHERE id='$id'");
header("Location: index.php");
?>