<?php
// Buat ngecek apakah request datang dari tombol 'register'
if (isset($_POST['register'])) {
    include "koneksi.php";
    session_start();
    
    $name = $_POST['name']; // Nama user
    $email = $_POST['email']; // Email user
    $password = $_POST['password']; // Password user
    $confirm_password = $_POST['confirm_password']; // Konfirmasi password user
    
    // Buat nge-hash password
    $password = sha1($password);
    $confirm_password = sha1($confirm_password);
    
    // Buat ngecek apakah email udah dipake atau belum
    $query = mysqli_query($koneksi, "SELECT email from user WHERE email='$email'");
    
    // Validasi: Kalo jumlah barisnya lebih dari 0, berarti email udh dipake
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['danger'] = "E-mail already used";
        header("Location:register.php");
    } else {
        // Buat ngecek apakah password sama konfirmasi password cocok
        if ($password === $confirm_password) {
            // Buat masukin data user baru ke database
            $create = mysqli_query($koneksi, "INSERT INTO user VALUES(null,'$name','$email','$password')");
            
            $_SESSION['name'] = $name;
            $_SESSION['success'] = "Congratulations " . $_SESSION['name'] . ", your registration was successful. Please login to enter";
            header("Location:login.php");
        // Kalo password sama konfirmasi passwordnya gak cocok, tampilin pesan error
        } else {
            $_SESSION['danger'] = "Password doesn't match";
            header("Location:register.php");
        }
    }
}
?>