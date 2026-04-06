<?php   
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS Pemrograman Web - Muhamad Hafiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> 
    <div class="container mt-4 mb-5">
        <h2 class="text-center mb-4 fw-bold">Form Input Mahasiswa</h2>

        <div class="row justify-content-center mb-5">
            <div class="col-md-8"> <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white fw-semibold">
                        Form Input Data
                    </div>
                    <div class="card-body">
                        <form action="insert.php" method="POST">
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" name="id" id="id" class="form-control" placeholder="Masukan ID" required>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                            </div>
                        
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Masukkan jurusan" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
                        </form> </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10"> <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white fw-semibold">
                        Daftar Mahasiswa
                    </div>
                    <div class="card-body p-0"> <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center py-3">No</th>
                                        <th class="py-3">NIM</th>
                                        <th class="py-3">Nama</th>
                                        <th class="py-3">Jurusan</th>
                                        <th class="py-3">Alamat</th>
                                        <th class="text-center py-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;
                                    $data = mysqli_query($conn, "SELECT * FROM mahasiswa");
                                    while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $no++; ?></td>
                                        <td class="align-middle"><?= htmlspecialchars($d['nim']); ?></td>
                                        <td class="align-middle"><?= htmlspecialchars($d['nama']); ?></td>
                                        <td class="align-middle"><?= htmlspecialchars($d['jurusan']); ?></td>
                                        <td class="align-middle"><?= htmlspecialchars($d['alamat']); ?></td>
                                        <td class="text-center align-middle">
                                            <a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-success px-3 me-1">Edit</a>
                                        
                <button type="button" class="btn btn-sm btn-danger px-3" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $d['id']; ?>">Hapus</button>

                <div class="modal fade text-start" id="hapusModal<?= $d['id']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold text-danger" id="hapusModalLabel">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data mahasiswa bernama <b><?= htmlspecialchars($d['nama']); ?></b>?
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <a href="delete.php?id=<?= $d['id']; ?>" class="btn btn-danger px-4">Ya, Hapus!</a>
                            </div>
                        </div>
                    </div>
                </div>
                                            
                </td>
                </tr>
<?php } ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>