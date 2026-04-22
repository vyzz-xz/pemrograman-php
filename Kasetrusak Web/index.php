<?php 
include 'koneksi.php';
include 'header.php'; 
?>

    <main class="mb-5"> 
        <div class="container-fluid px-4 px-lg-5 mb-5 mt-3">
            <section class="hero-section">
                <div class="hero-text ms-lg-5">
                    <h1>LOCAL PRIDE,<br>GLOBAL VIBE.</h1>
                    <p>Eksplorasi koleksi terbaru dari Kasetrusak. Kualitas premium dengan identitas lokal Karawang yang autentik.</p>
                    <a href="katalog.php" class="btn btn-dark btn-lg px-5 py-3 fw-bold rounded-pill">Shop Now</a>
                </div>
                <div class="hero-image d-none d-md-block me-lg-5">
                    <img src="assets/images/produk/t-shirt.jpg" alt="Model" style="max-height: 400px; border-radius: 15px; transform: rotate(5deg); box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                </div>
            </section>
        </div>

        <div class="container mb-5">
            <div class="text-center mb-5 mt-5">
            <h2 class="fw-bolder" style="letter-spacing: 1px;">LATEST DROPS</h2>
            <div style="width: 50px; height: 4px; background-color: var(--accent-purple); margin: 10px auto; border-radius: 2px;"></div>
        </div>
        
        <div class="row g-4 mb-5">
            
            <?php
            $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 4");
            
            while($data = mysqli_fetch_array($query)) {
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
            ?>

        </div>
        
            
            <div class="row g-4">
                
                <?php
                ?>

            </div>
        </div> 
    </main>

<?php include 'footer.php'; ?>
</body>
</html>