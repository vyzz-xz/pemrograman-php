<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Kategori Usia</title>
</head>
<body>
    <?php
    $umur = 16;
    $kategori = "";

    if ($umur >= 6 && $umur <= 12) {
        $kategori = "Anak-anak";
    } else if ($umur >= 13 && $umur <= 17) {
        $kategori = "Remaja";
    } elseif ($umur >= 18 && $umur <= 59) {
        $kategori = "Dewasa";
    } elseif ($umur >= 60) {
        $kategori = "Lansia";
    } else {
        $kategori = "Umur tidak valid";
    }
    
    echo "<h1>Program Cek Kategori Usia</h1>";
    echo "Umur seseorang saat ini: <b>" . $umur . " tahun</b><br>";
    echo "Termasuk dalam kategori: <b>" . $kategori . "</b>";
?>
</body>
</html>