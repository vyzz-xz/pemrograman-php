<?php 
include 'koneksi.php';
include 'header.php'; 
?>

    <main class="container my-5">
        
        <div class="text-center mb-5">
            <h1 class="fw-bolder" style="letter-spacing: 1px;">KATALOG PRODUK</h1>
            <div style="width: 50px; height: 4px; background-color: var(--accent-purple); margin: 10px auto; border-radius: 2px;"></div>
            <p class="text-muted mt-3">Eksplorasi seluruh koleksi Kasetrusak. Temukan gaya autentikmu di sini.</p>
        </div>

        <div class="d-flex justify-content-center gap-3 mb-5 flex-wrap">
            <a href="katalog.php" class="btn <?php echo !isset($_GET['kategori']) ? 'btn-dark' : 'btn-outline-dark'; ?> rounded-pill px-4 fw-semibold">
                Semua
            </a>
            
            <?php
            $query_kategori = mysqli_query($conn, "SELECT * FROM kategori");
            while($kat = mysqli_fetch_array($query_kategori)) {
                $is_active = (isset($_GET['kategori']) && $_GET['kategori'] == $kat['id_kategori']) ? 'btn-dark' : 'btn-outline-dark';
            ?>
                <a href="katalog.php?kategori=<?php echo $kat['id_kategori']; ?>" class="btn <?php echo $is_active; ?> rounded-pill px-4 fw-semibold">
                    <?php echo $kat['nama_kategori']; ?>
                </a>
            <?php } ?>
        </div>

        <div class="row g-4">
            
            <?php
            if(isset($_GET['kategori'])) {
                $id_kat = $_GET['kategori'];
                $query_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_kategori = '$id_kat' ORDER BY id_produk DESC");
            } else {
                $query_produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
            }

            if(mysqli_num_rows($query_produk) > 0) {
                while($data = mysqli_fetch_array($query_produk)) {
            ?>
            
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card-produk-custom h-100">
                        <img src="assets/images/produk/<?php echo $data['gambar']; ?>" class="w-100" style="aspect-ratio: 1/1; object-fit: cover;" alt="<?php echo $data['nama_produk']; ?>">
                        <div class="p-3">
                            <h6 class="fw-bold text-truncate" title="<?php echo $data['nama_produk']; ?>">
                                <?php echo $data['nama_produk']; ?>
                            </h6>
                            <p class="fw-bold mb-3" style="color: var(--accent-purple);">
                                Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?>
                            </p>
                            <a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-dark w-100 fw-semibold">Beli Sekarang</a>
                        </div>
                    </div>
                </div>

            <?php 
                } 
            } else {
                echo '
                <div class="col-12 text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/7434/7434150.png" style="width: 100px; opacity: 0.3;" class="mb-3">
                    <h5 class="text-muted fw-bold">Belum ada produk di kategori ini.</h5>
                    <p class="text-muted">Nantikan drop terbaru dari kami!</p>
                </div>';
            }
            ?>

        </div>
    </main>

<?php include 'footer.php';?>
</body>
</html>