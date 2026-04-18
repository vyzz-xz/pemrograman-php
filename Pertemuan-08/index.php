<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data KRS Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h4>Sistem Informasi Akademik</h4>
        
        <div class="card">
            <div class="card-header">
                Data Kartu Rencana Studi (KRS)
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Nama Lengkap</th>
                                <th>Mata Kuliah</th>
                                <th>Keterangan Pengambilan SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT 
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
                                </tr>
                            <?php 
                                } 
                            } else {
                                echo "<tr><td colspan='4' style='text-align:center; padding:20px;'>Belum ada data KRS.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <p style="text-align: center; color: #94a3b8; font-size: 0.8rem; margin-top: 20px;">
            &copy; 2026 - Muhamad Hafiz
        </p>
    </div>

</body>
</html>