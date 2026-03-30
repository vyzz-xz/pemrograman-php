<?php include 'koneksi.php'; ?>

<h2>Tambah Data</h2>
<form method="POST" action="insert.php">
    Nama: <input type="text" name="nama" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Simpan</button>
</form>

<h2>Data Mahasiswa</h2>
<table border="1">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM mahasiswa");
while ($d = mysqli_fetch_array($data)) {
?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d['nama']; ?></td>
        <td><?= $d['email']; ?></td>
        <td>
            <a href="edit.php?id=<?= $d['id']; ?>">Edit</a> |
            <a href="delete.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        </td>
    </tr>
<?php } ?>
</table>