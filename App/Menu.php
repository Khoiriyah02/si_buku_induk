<?php

namespace App;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/Sitikhoiriyah_2021503062_UTS_SMT_5/index.php?target=";
        $data = [
            array('text' => 'Beranda', 'link' => $base . 'beranda'),
            array('text' => 'Buku Induk', 'link' => $base . 'bukuinduk'),
            array('text' => 'Katalog', 'link' => $base . 'katalog'),
            array('text' => 'Petugas', 'link' => $base . 'petugas')
        ];
        return $data;
    }
}
