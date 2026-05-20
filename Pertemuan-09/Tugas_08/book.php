<?php
// buat class bernama Book
class Book
{
    // buat nyimpen data private
    private $code_book; 
    private $name;
    private $qty;

    // otomatis jalan pas bikin object baru
    public function __construct($code_book, $name, $qty)
    {
        $this->name = $name; 
        $this->setCodeBook($code_book); 
        $this->setQty($qty); 
    }

    // buat validasi kode buku
    private function setCodeBook($code_book)
    {
        // cek format: 2 huruf besar + 2 angka
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book; 
        } else {
            // error kalau format salah
            echo "Error: Format Code Book '{$code_book}' tidak sesuai! Harus 2 Huruf Besar + 2 Angka.<br>";
            $this->code_book = null; 
        }
    }

    // buat validasi jumlah buku
    private function setQty($qty)
    {
        // cek harus angka positif
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty; 
        } else {
            // error kalau bukan angka positif
            echo "Error: QTY '{$qty}' tidak valid! Harus berupa angka integer positif.<br>";
            $this->qty = null;
        }
    }

    // buat ngambil kode buku
    public function getCodeBook()
    {
        return $this->code_book;
    }

    // buat ngambil jumlah buku
    public function getQty()
    {
        return $this->qty;
    }

    // buat ngambil nama buku
    public function getName()
    {
        return $this->name;
    }
}