<?php

class Book
{
    private $code_book;
    private $name;
    private $qty;

    public function __construct($code_book, $name, $qty)
    {
        $this->name = $name; 
        $this->setCodeBook($code_book);
        $this->setQty($qty);
    }

    private function setCodeBook($code_book)
    {
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            echo "Error: Format Code Book '{$code_book}' tidak sesuai! Harus 2 Huruf Besar + 2 Angka.<br>";
            $this->code_book = null; 
        }
    }

    private function setQty($qty)
    {
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            echo "Error: QTY '{$qty}' tidak valid! Harus berupa angka integer positif.<br>";
            $this->qty = null;
        }
    }

    public function getCodeBook()
    {
        return $this->code_book;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function getName()
    {
        return $this->name;
    }
}