<?php
// Memanggil file Book.php agar class-nya bisa digunakan di sini
require_once 'book.php';

echo "<h3>Testing 1: Input Benar</h3>";
$book1 = new Book("BK12", "Pemrograman PHP", 10);
echo "Code Book: " . $book1->getCodeBook() . "<br>";
echo "Nama Buku: " . $book1->getName() . "<br>";
echo "Quantity: " . $book1->getQty() . "<br><br>";

echo "<h3>Testing 2: Input Salah (Format Code Book Salah)</h3>";
$book2 = new Book("bk123", "Belajar OOP", 5); 
echo "Code Book: " . $book2->getCodeBook() . "<br><br>";

echo "<h3>Testing 3: Input Salah (QTY Negatif/Nol)</h3>";
$book3 = new Book("CS99", "Struktur Data", 0); 
echo "Quantity: " . $book3->getQty() . "<br><br>";