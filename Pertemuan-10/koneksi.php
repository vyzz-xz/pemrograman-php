<?php
// File ini buat nyambungin PHP ke database pabrik
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_pabrik"; // nama database

$koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);