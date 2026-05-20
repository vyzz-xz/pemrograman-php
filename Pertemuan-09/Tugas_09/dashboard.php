<?php
session_start();

// Buat ngecek apakah user udah login atau belum
if (!isset($_SESSION['name'])) {
    // Buat nge-set pesan error di session dan redirect ke halaman login
    $_SESSION['danger'] = "You must login first to access the dashboard!";
    header("Location:login.php");
    exit(); // buat hentiin eksekusi script setelah redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard - My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success my-4"><?= $_SESSION['success'] ?></div>
                <?php unset($_SESSION['success']); } ?>
                
                <h3>Hello, <?= $_SESSION['name']; ?>!</h3>
            </div>
        </div>
    </div>
</body>
</html>