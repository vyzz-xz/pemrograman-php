<?php
include 'koneksi.php';

$npm = $_POST['npm'];
$kodemk = $_POST['kodemk'];

mysqli_query($conn, "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$kodemk')");
header("Location: index.php");
?>