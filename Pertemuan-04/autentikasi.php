<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Autentikasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Portal Login</h4>
                </div>
                <div class="card-body">
                    
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nama Pengguna (Username)</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi (Password)</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" name="submit_login" class="btn btn-primary w-100">Masuk</button>
                    </form>

                </div>
            </div>

            <?php
            // Memvalidasi apakah tombol submit telah ditekan oleh pengguna
            if (isset($_POST['submit_login'])) {
                
                // Mengakuisisi data dari input formulir
                $input_user = $_POST['username'];
                $input_pass = $_POST['password'];

                // Kredensial statis untuk keperluan simulasi
                $valid_user = "admin";
                $valid_pass = "admin123";

                echo "<div class='mt-4'>";
                // Mengimplementasikan struktur kontrol kondisional untuk validasi
                if ($input_user === $valid_user && $input_pass === $valid_pass) {
                    echo "<div class='alert alert-success'><strong>Otorisasi Berhasil!</strong> Selamat datang, " . htmlspecialchars($input_user) . ".</div>";
                } else {
                    echo "<div class='alert alert-danger'><strong>Akses Ditolak.</strong> Kredensial yang Anda masukkan tidak valid.</div>";
                }
                echo "</div>";
            }
            ?>
            </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>