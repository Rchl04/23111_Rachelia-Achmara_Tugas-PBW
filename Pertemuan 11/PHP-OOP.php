<?php

//Deklarasi Class & Property
class Book {
    private $code_book;
    private $name;
    private $qty;

    //Konstruktor
    public function __construct($code_book, $name, $qty){
        $this->setCodeBook($code_book);
        $this->name = $name;
        $this->setQty($qty);
    }

    //Setter untuk Kode Buku
    private function setCodeBook($code_book) {
        // Cek/Validasi format penulisan code_book: 2 huruf besar diikuti oleh 2 angka
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            echo "Error: Kode buku (code_book) harus mengikuti format 'BB00' (2 huruf besar diikuti 2 angka).\n";
        }
    }

    //Setter untuk Jumlah Buku
    private function setQty($qty) {
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            echo "Error: Jumlah buku (qty) harus berupa bilangan bulangan positif.\n";
        }
    }

    //Getter untuk mendapatkan Data Buku
    public function getCodeBook(){
        return $this->code_book;
    }

    public function getQty(){
        return $this->qty;
    }

    public function getName(){
        return $this->name;
    }
}

// Contoh
$book1 = new Book("AB12", "Pemrograman Berbasis Web", 3);
echo "Buku 1";
echo "\nKode Buku : " . $book1->getCodeBook() . "\n";
echo "Judul Buku : " . $book1->getName() . "\n";
echo "Jumlah : " . $book1->getQty() . "\n";

// Contoh jika format penulisan code_book tidak sesuai
echo "\nBuku 2\n";
$book2 = new Book("abcd", "Algoritma & Pemrograman", 5);

// Contoh jika jumlah nya bukan bilangan bulat positif
echo "\nBuku 3\n";
$book3 = new Book("CD34", "Data Mining", -5);
?>
