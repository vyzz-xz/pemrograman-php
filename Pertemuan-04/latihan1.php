<?php
// Variable Scope / Lingkup Variabel
$x = 10; // Variabel global

function tampilX(){
    global $x; // Mengakses variabel global
    echo $x;
}

tampilX();

?>