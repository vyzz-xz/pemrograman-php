<?php
include 'koneksi.php'; //panggil koneksi

// ambil data krs sekalian join ke tabel mahasiswa dan matkul
$data = mysqli_query($koneksi, 
    "SELECT k.id, m.nama AS nama_mhs, mk.nama AS nama_mk, mk.jumlah_sks
    FROM krs k
    JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
    JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk
    ORDER BY k.id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data KRS Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar bg-white border-bottom"> 
    <div class="container-fluid justify-content-center">
        <span class="navbar-brand">Sistem KRS Mahasiswa</span>
    </div>
</nav>

<div class="container my-4" style="max-width: 1000px;">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="fw-semibold">Data KRS</span>
            <a href="tambah.php" class="btn btn-dark btn-sm">+ Tambah KRS</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Nama Lengkap</th>
                        <th>Mata Kuliah</th>
                        <th>Keterangan</th>
                        <th style="width:110px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1; //buat nomor urut
                // cek kalo datanya ada
                if (mysqli_num_rows($data) > 0) {
                    // looping datanya buat ditampilin ke tabel
                    while ($row = mysqli_fetch_assoc($data)) {
                        $ket = "<span class='ket-nama'>" . htmlspecialchars($row['nama_mhs']) . 
                        "</span> Mengambil Mata Kuliah <span class='ket-matkul'>" . 
                        htmlspecialchars($row['nama_mk']) . "</span> (" . $row['jumlah_sks'] . " SKS)";
                        echo "<tr>
                                <td>$no</td>
                                <td>" . htmlspecialchars($row['nama_mhs']) . "</td>
                                <td>" . htmlspecialchars($row['nama_mk']) . "</td>
                                <td>$ket</td>
                                <td>
                                    <a href='edit.php?id=" . $row['id'] . "' 
                                    class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='hapus.php?id=" . $row['id'] . "' 
                                    class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                                </td>
                            </tr>";
                        $no++; // biar nambah 1 terus
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center text-muted py-3'>Belum ada data</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>