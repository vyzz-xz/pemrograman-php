<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    switch ($pilihan) {
        case '1':
            echo "Anda memiliki menu: Nasi Goreng";
            break;
        case '2':
            echo "Anda memiliki menu: Mie Ayam";
            break;
        case '3':
            echo "Anda memiliki menu: Sate Ayam";
            break;
        case '4':
            echo "Anda memiliki menu: Nasi Uduk";
            break;
        default:
            echo "Menu yang anda pilih tidak tersedia";
    }
    ?>
</body>
</html>