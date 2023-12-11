<?php

namespace App;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/uts_oop/index.php?target=";
        $data = [
            array('text' => 'Beranda', 'link' => $base . 'beranda'),
            array('text' => 'Buku Induk', 'link' => $base . 'bukuinduk'),
            array('text' => 'Katalog', 'link' => $base . 'katalog'),
            array('text' => 'Petugas', 'link' => $base . 'petugas')
        ];
        return $data;
    }
}
