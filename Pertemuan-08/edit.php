<?php 
include 'koneksi.php'; 
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM krs WHERE id='$id'");
$data_krs = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data KRS</title>
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body>

<div class="container" style="max-width: 600px; margin-top: 50px;">
    <div class="card">
        <div class="card-header" style="text-align: center; background: linear-gradient(135deg, #f59e0b, #d97706);">
            Edit Data KRS Mahasiswa
        </div>
        <div class="card-body">
            <form method="POST" action="update.php">
                <input type="hidden" name="id" value="<?= $data_krs['id']; ?>">
                
                <label class="form-label">Ubah Mahasiswa</label>
                <select name="npm" class="form-select" required>
                    <?php
                    $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nama ASC");
                    while($m = mysqli_fetch_array($mhs)){
                        $selected = ($m['npm'] == $data_krs['mahasiswa_npm']) ? "selected" : "";
                        echo "<option value='{$m['npm']}' $selected>{$m['npm']} - {$m['nama']}</option>";
                    }
                    ?>
                </select>

                <label class="form-label">Ubah Mata Kuliah</label>
                <select name="kodemk" class="form-select" required>
                    <?php
                    $mk = mysqli_query($conn, "SELECT * FROM matakuliah ORDER BY nama ASC");
                    while($k = mysqli_fetch_array($mk)){
                        $selected = ($k['kodemk'] == $data_krs['matakuliah_kodemk']) ? "selected" : "";
                        echo "<option value='{$k['kodemk']}' $selected>{$k['nama']} ({$k['jumlah_sks']} SKS)</option>";
                    }
                    ?>
                </select>

                <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary" style="background-color: #f59e0b;">Update Data KRS</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>