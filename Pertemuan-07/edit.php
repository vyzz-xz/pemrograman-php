<?php
include 'koneksi.php';

$id  = $_GET['id'];
$krs = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM krs WHERE id='$id'"));

if (!$krs) {
    header("Location: index.php");
    exit();
}

$mhs = mysqli_query($koneksi, "SELECT npm, nama FROM mahasiswa ORDER BY nama ASC");
$mk  = mysqli_query($koneksi, "SELECT kodemk, nama, jumlah_sks FROM matakuliah ORDER BY nama ASC");

$pesan = "";

if (isset($_POST['update'])) {
    $npm    = $_POST['npm'];
    $kodemk = $_POST['kodemk'];

    $cek = mysqli_query($koneksi, "SELECT * FROM krs WHERE mahasiswa_npm='$npm' AND matakuliah_kodemk='$kodemk' AND id != '$id'");

    if (mysqli_num_rows($cek) > 0) {
        $pesan = "<div class='alert alert-warning'>Mahasiswa ini sudah mengambil mata kuliah tersebut!</div>";
    } else {
        mysqli_query($koneksi, "UPDATE krs SET mahasiswa_npm='$npm', matakuliah_kodemk='$kodemk' WHERE id='$id'");
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
    <title>Edit KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar bg-white border-bottom">
    <div class="container-fluid justify-content-center">
        <span class="navbar-brand">Sistem KRS Mahasiswa</span>
    </div>
</nav>

<!-- Form Edit KRS -->
<div class="container my-4" style="max-width: 500px;">
    <div class="card">
        <div class="card-header">
            <span class="fw-semibold">Edit Data KRS</span>
        </div>
        <div class="card-body">

            <?= $pesan ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Mahasiswa</label>
                    <select name="npm" class="form-select" required>
                        <option value="">Pilih Mahasiswa</option>
                        <?php while ($row = mysqli_fetch_assoc($mhs)): ?>
                            <option value="<?= $row['npm'] ?>" <?= ($row['npm'] == $krs['mahasiswa_npm']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['nama']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <select name="kodemk" class="form-select" required>
                        <option value="">Pilih Mata Kuliah</option>
                        <?php while ($row = mysqli_fetch_assoc($mk)): ?>
                            <option value="<?= $row['kodemk'] ?>" <?= ($row['kodemk'] == $krs['matakuliah_kodemk']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['nama']) ?> (<?= $row['jumlah_sks'] ?> SKS)
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <button type="submit" name="update" class="btn btn-dark w-100 mb-2">Update</button>
                <a href="index.php" class="btn btn-light border w-100">Batal</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>