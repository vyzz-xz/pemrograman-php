<?php
$bandaraAsal = ["Soekarno Hatta", "Husein Sastranegara", "Abdul Rachman Saleh", "Juanda"];
$bandaraTujuan = ["Ngurah Rai", "Hasanuddin", "Inanwatan", "Sultan Iskandar Muda"];

// Buat ngurutin nama bandara
sort($bandaraAsal);
sort($bandaraTujuan);

// Buat ngitung pajak berdasarkan bandara asal
function pajakAsal($bandara) {
    switch ($bandara) {
        case "Soekarno Hatta": return 65000;
        case "Husein Sastranegara": return 50000;
        case "Abdul Rachman Saleh": return 40000;
        case "Juanda": return 30000;
        default: return 0;
    }
}

// Buat ngitung pajak berdasarkan bandara tujuan
function pajakTujuan($bandara) {
    switch ($bandara) {
        case "Ngurah Rai": return 85000;
        case "Hasanuddin": return 70000;
        case "Inanwatan": return 90000;
        case "Sultan Iskandar Muda": return 60000;
        default: return 0;
    }
}

if (isset($_POST["kirim"])) {
    
    $noKeberangkatan = 1;
    $tanggalInput      = $_POST['tanggalInput'] ?? date("l jS \of F Y h:i:s A");
    $NamaMaskapai      = $_POST['inputNamaMaskapai'] ?? '-';
    $asalPenerbangan   = $_POST['inputAsalPenerbangan'] ?? 'Belum dipilih';
    $tujuanPenerbangan = $_POST['inputTujuanPenerbangan'] ?? 'Belum dipilih';
    
    $hargaTiket        = isset($_POST['inputHarga']) && $_POST['inputHarga'] !== '' ? (int)$_POST['inputHarga'] : 0;

    $pajakA = pajakAsal($asalPenerbangan);
    $pajakT = pajakTujuan($tujuanPenerbangan);
    
    $totalPajak      = $pajakA + $pajakT;
    $totalHargaTiket = $hargaTiket + $totalPajak;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;0,900;1,100&display=swap" rel="stylesheet">
    <title>Penghitung Harga Tiket</title>
</head>
<body>
    <div class="container">
        <section class="inputForm">
            <h3 class="title">INPUT FORM</h3>
            <div class="content">
                <form action="" method="post">
                    <input type="hidden" name="tanggalInput" value="<?=date("l jS \of F Y h:i:s A")?>">
                    <label for="inputNamaMaskapai">Nama Maskapai</label>
                    <br>
                    <input type="text" name="inputNamaMaskapai" id="inputNamaMaskapai" required>
                    <br>
                    <label for="inputAsalPenerbangan">Pilih Bandara Asal:</label>
                    <br>
                    <select name="inputAsalPenerbangan" id="inputAsalPenerbangan" required>
                        <option value="" disabled selected>Pilih Bandara</option>
                        <?php foreach ($bandaraAsal as $bA) {?>
                            <option value="<?php echo $bA?>"><?php echo $bA?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <label for="inputTujuanPenerbangan">Pilih Bandara Tujuan:</label>
                    <br>
                    <select name="inputTujuanPenerbangan" id="inputTujuanPenerbangan" required>
                        <option value="" disabled selected>Pilih Bandara</option>
                        <?php foreach ($bandaraTujuan as $bT) {?>
                            <option value="<?php echo $bT?>"><?php echo $bT?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <label for="inputHarga">Harga Tiket</label>
                    <br>
                    <input type="number" name="inputHarga" id="inputHarga" required>
                    <br>
                    <button type="submit" name="kirim">Hitung</button>  
                </form>
            </div>

            <footer>
                <p>&copy;2025 Brandon H.L.</p>
            </footer>

        </section>
        <?php if (isset($_POST["kirim"])) {?>
            <section class="information">
                <h3 class="title">INFORMASI</h3>
                <div class="content">
                    <label for="nomor">Nomor</label>
                    <br>
                    <input type="text" name="nomor" id="nomor" value="<?=$noKeberangkatan?>" disabled>
                    <br>
                    <label for="tanggal">Tanggal</label>
                    <br>
                    <input type="text" name="tanggal" id="tanggal" value="<?=$tanggalInput?>" disabled>
                    <br>
                    <label for="maskapai">Maskapai</label>
                    <br>
                    <input type="text" name="maskapai" id="maskapai" value="<?=$NamaMaskapai?>" disabled>
                    <br>
                    <label for="asal">Asal Penerbangan</label>
                    <br>
                    <input type="text" name="asal" id="asal" value="<?=$asalPenerbangan?>" disabled>
                    <br>
                    <label for="tujuan">Tujuan Penerbangan</label>
                    <br>
                    <input type="text" name="tujuan" id="tujuan" value="<?=$tujuanPenerbangan?>" disabled>
                    <br>
                    <label for="hargaTiketAwal">Harga Tiket</label>
                    <br>
                    <input type="text" name="hargaTiketAwal" id="hargaTiketAwal" value="Rp <?=number_format($hargaTiket, 0, ',', '.')?>" disabled>
                    <br>
                    <label for="pajak">Total Pajak</label>
                    <br>
                    <input type="text" name="pajak" id="pajak" value="Rp <?=number_format($totalPajak, 0, ',', '.')?>" disabled>
                    <br>
                    <label for="totalHargaTiket">Total Harga Tiket</label>
                    <br>
                    <input type="text" name="totalHargaTiket" id="totalHargaTiket" value="Rp <?=number_format($totalHargaTiket, 0, ',', '.')?>" disabled>
                    <br>
                </div>
            </section>
        <?php } ?>
        </div>
</body>
</html>