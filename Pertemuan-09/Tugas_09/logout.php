<?php
session_start();

// Buat hapus session 'name' sebagai tanda logout
unset($_SESSION['name']);
// Buat nge-set pesan sukses di session dan redirect ke halaman login
$_SESSION['success'] = "Logout Successful";
header("Location:login.php");
?>