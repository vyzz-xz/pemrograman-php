<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<h2>Edit Data</h2>
<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= $d['id']; ?>">

    Nama: <input type="text" name="nama" value="<?= $d['nama']; ?>"><br>
    Email: <input type="email" name="email" value="<?= $d['email']; ?>"><br>

    <button type="submit">Update</button>
</form>