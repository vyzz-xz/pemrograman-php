<?php
// Mengecek apakah request datang dari tombol 'login'
if (isset($_POST['login'])) {
    include "koneksi.php";
    session_start();
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Buat nge-hash password
    $password = sha1($password);
    
    // Buat ngecek apakah email sama password cocok dengan data di database
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    $data = mysqli_fetch_array($query);
    
    // Kalo jumlah barisnya lebih dari 0, berarti email sama passwordnya cocok
    if (mysqli_num_rows($query) > 0) {
        // Buat nyimpen data user yang login ke session
        $_SESSION['name'] = $data['name'];
        $_SESSION['success'] = "Welcome " . $_SESSION['name'] . " to the Dashboard Page";
        
        // Buat redirect ke halaman dashboard
        header("Location:dashboard.php");
        // Buat hentiin eksekusi script setelah redirect
    } else {
        $_SESSION['danger'] = "Login failed, wrong email or password";
        header("Location:login.php");
    }
}
?>