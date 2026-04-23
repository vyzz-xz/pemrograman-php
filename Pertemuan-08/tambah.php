<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data KRS</title>
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body>

<div class="container" style="max-width: 600px; margin-top: 50px;">
    <div class="card">
        <div class="card-header" style="text-align: center;">
            Form Pengisian KRS Mahasiswa
        </div>
        <div class="card-body">
            <form method="POST" action="insert_krs.php">
                
                <label class="form-label">Pilih Mahasiswa</label>
                <select name="npm" class="form-select" required>
                    <option value="" disabled selected>Pilih Mahasiswa</option>
                    <?php
                    $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nama ASC");
                    while($m = mysqli_fetch_array($mhs)){
                        echo "<option value='{$m['npm']}'>{$m['npm']} - {$m['nama']}</option>";
                    }
                    ?>
                </select>

                <label class="form-label">Pilih Mata Kuliah</label>
                <select name="kodemk" class="form-select" required>
                    <option value="" disabled selected>Pilih Mata Kuliah</option>
                    <?php
                    $mk = mysqli_query($conn, "SELECT * FROM matakuliah ORDER BY nama ASC");
                    while($k = mysqli_fetch_array($mk)){
                        echo "<option value='{$k['kodemk']}'>{$k['nama']} ({$k['jumlah_sks']} SKS)</option>";
                    }
                    ?>
                </select>

                <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data KRS</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>