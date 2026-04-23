<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik - Data KRS</title>
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body>

    <div class="container">
        <h4>Sistem Informasi Akademik</h4>
        
        <div class="header-actions">
            <h4 style="margin: 0; color: #1e293b; font-size: 1.2rem;">Data Kartu Rencana Studi (KRS)</h4>
            <a href="tambah.php" class="btn btn-primary">+ Tambah Data KRS</a>
        </div>
        
        <div class="card">
            <div class="card-header">
                Daftar Pengambilan Mata Kuliah
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 5%;">No</th>
                                <th width="20%">Nama Lengkap</th>
                                <th width="20%">Mata Kuliah</th>
                                <th width="40%">Keterangan</th>
                                <th style="text-align: center; width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT 
                                        krs.id,
                                        mahasiswa.nama AS nama_mhs, 
                                        matakuliah.nama AS nama_mk, 
                                        matakuliah.jumlah_sks 
                                    FROM krs 
                                    JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm 
                                    JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
                                    ORDER BY krs.id ASC";

                            $result = mysqli_query($conn, $query);

                            if(mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td style="text-align: center; font-weight: 500; color: #94a3b8;"><?= $no++; ?></td>
                                    <td style="font-weight: 600; color: #334155;"><?= $row['nama_mhs']; ?></td>
                                    <td><?= $row['nama_mk']; ?></td>
                                    <td>
                                        <span class="text-highlight"><?= $row['nama_mhs']; ?></span> 
                                        mengambil mata kuliah 
                                        <span class="text-highlight"><?= $row['nama_mk']; ?></span> 
                                        dengan beban <b><?= $row['jumlah_sks']; ?> SKS</b>.
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                    <div style="display: flex; justify-content: center; gap: 8px; flex-wrap: nowrap;">
                                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning" style="margin: 0;">Edit</a>
                                        <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" style="margin: 0;" onclick="return confirm('Yakin ingin menghapus KRS ini?')">Hapus</a>
                                    </div>
                                </td>
                                </tr>
                            <?php 
                                } 
                            } else {
                                echo "<tr><td colspan='5' style='text-align:center; padding:30px; color:#94a3b8;'>Belum ada data KRS. Silakan tambah data.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>