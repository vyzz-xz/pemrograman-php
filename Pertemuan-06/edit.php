<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 pt-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5"> 
            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0 fw-bold">Edit Data Mahasiswa</h5>
                </div>
                <div class="card-body p-4 p-md-5">
                    
                    <form method="POST" action="update.php">
                        <input type="hidden" name="id" value="<?= $d['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-muted">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>" required>
                        </div>
                        
                        <div class="mb-5">
                            <label class="form-label fw-semibold text-muted">Alamat Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $d['email']; ?>" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-outline-secondary px-4">Batal</a>
                            
                            <button type="submit" class="btn btn-success px-4">Update Data</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>