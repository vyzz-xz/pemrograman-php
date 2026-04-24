<?php
include 'koneksi.php';

$mhs = mysqli_query($koneksi, "SELECT npm, nama FROM mahasiswa ORDER BY nama ASC");
$mk  = mysqli_query($koneksi, "SELECT kodemk, nama, jumlah_sks FROM matakuliah ORDER BY nama ASC");

$pesan = "";

if (isset($_POST['simpan'])) {
    $npm    = $_POST['npm'];
    $kodemk = $_POST['kodemk'];

    $cek = mysqli_query($koneksi, "SELECT * FROM krs WHERE mahasiswa_npm='$npm' AND matakuliah_kodemk='$kodemk'");

    if (mysqli_num_rows($cek) > 0) {
        $pesan = "<div class='alert alert-warning'>Mahasiswa ini sudah mengambil mata kuliah tersebut!</div>";
    } else {
        mysqli_query($koneksi, "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$kodemk')");
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar bg-white border-bottom">
    <div class="container-fluid justify-content-center">
        <span class="navbar-brand">Sistem KRS Mahasiswa</span>
    </div>
</nav>

<div class="container my-4" style="max-width: 500px;">
    <div class="card">
        <div class="card-header">
            <span class="fw-semibold">Tambah Data KRS</span>
        </div>
        <div class="card-body">

            <?= $pesan ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Mahasiswa</label>
                    <select name="npm" class="form-select" required>
                        <option value="">Pilih Mahasiswa</option>
                        <?php while ($row = mysqli_fetch_assoc($mhs)): ?>
                            <option value="<?= $row['npm'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <select name="kodemk" class="form-select" required>
                        <option value="">Pilih Mata Kuliah</option>
                        <?php while ($row = mysqli_fetch_assoc($mk)): ?>
                            <option value="<?= $row['kodemk'] ?>"><?= htmlspecialchars($row['nama']) ?> (<?= $row['jumlah_sks'] ?> SKS)</option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <button type="submit" name="simpan" class="btn btn-dark w-100 mb-2">Simpan</button>
                <a href="index.php" class="btn btn-danger border w-100">Batal</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>