<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // Membuat Variable
    $nama_mahaiswa = "Muhamad Hafiz";
    $nilai_tugas = 85;
    $nilai_uts = 90;
    $nilai_uas = 95;
    
    // Operator Matematika
    $rata_rata = ($nilai_tugas + $nilai_uts + $nilai_uas) / 3;
    
    // Logic If-else
    $grade = "";
    
    if ($rata_rata >= 90) {
        $grade = "A";
    } elseif ($rata_rata >= 80) {
        $grade = "B";
    } elseif ($rata_rata >= 70) {
        $grade = "C";
    } elseif ($rata_rata >= 60) {
        $grade = "D";
    } else {
        $grade = "E";
    }

    // Output
    echo "<h2>Kalkulator Nilai Mahasiswa</h2>";
    echo "Nama Mahasiswa: " . $nama_mahaiswa . "<br>";

    echo "Nilai Tugas: " . $nilai_tugas . "<br>";
    echo "Nilai UTS: " . $nilai_uts . "<br>";
    echo "Nilai UAS: " . $nilai_uas . "<br>";

    echo "Nilai Akhir (Rata-rata): " . number_format($rata_rata, 2) . "<br>";
    echo "Grade yang didapat: " . $grade . "<br>";

?>
</body>
</html>