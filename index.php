<?php

use App\BukuInduk;
use App\Katalog;
use App\Petugas;
use App\Menu;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$petugas = new Petugas($dataKoneksi);
$bukuinduk = new BukuInduk($dataKoneksi);
$katalog = new Katalog($dataKoneksi);

$target = @$_GET['target'];
$act = @$_GET['act'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Induk</title>
    <link rel="stylesheet" href="Assets/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <nav class=" navbar navbar-expand-lg  navbar bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h3>BUKU INDUK</h3>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <?php foreach ($menu->topMenu() as $key => $value) {
                    ?>
                        <div class="navbar-nav">
                            <a class="nav-link" aria-current="page" href="<?php echo $value['link']; ?>">
                                <?php echo $value['text']; ?>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h4><?php echo strtoupper($target); ?></h4>

            <?php
            if (!isset($target) or $target == "beranda") {
                echo "Hai, Selamat Datang di Beranda";
                //====start content Buku Induk====
            } elseif ($target == "bukuinduk") {
                if ($act == "tambah_bukuinduk") {
                    echo $bukuinduk->tambah();
                } elseif ($act == "simpan_bukuinduk") {
                    if ($bukuinduk->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=bukuinduk'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=bukuinduk'
                        </script>";
                    }
                } elseif ($act == "edit_bukuinduk") {
                    $id = $_GET['id'];
                    echo $bukuinduk->edit($id);
                } elseif ($act == "update_bukuinduk") {
                    if ($bukuinduk->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=bukuinduk'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=bukuinduk'
                        </script>";
                    }
                } elseif ($act == "delete_bukuinduk") {
                    $id = $_GET['id'];
                    if ($bukuinduk->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=bukuinduk'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=bukuinduk'
                        </script>";
                    }
                } elseif ($act == "tambah_katalog") {
                    echo $bukuinduk->tambah_katalog();
                } elseif ($act == "simpan_katalog") {
                    if ($bukuinduk->simpan_katalog()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=katalog'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=katalog'
                        </script>";
                    }
                } else {
                    echo $bukuinduk->index();
                }

                //====start content Katalog====
            } elseif ($target == "katalog") {
                if ($act == "edit_katalog") {
                    $id = $_GET['id'];
                    echo $katalog->edit($id);
                } elseif ($act == "update_katalog") {
                    if ($katalog->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=katalog'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=katalog'
                        </script>";
                    }
                } elseif ($act == "delete_katalog") {
                    $id = $_GET['id'];
                    if ($katalog->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=katalog'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=katalog'
                        </script>";
                    }
                } else {
                    echo $katalog->index();
                }
                //====start content Petugas====
            } elseif ($target == "petugas") {
                if ($act == "tambah_petugas") {
                    echo $petugas->tambah();
                } elseif ($act == "simpan_petugas") {
                    if ($petugas->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=petugas'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=petugas'
                        </script>";
                    }
                } elseif ($act == "edit_petugas") {
                    $id = $_GET['id'];
                    echo $petugas->edit($id);
                } elseif ($act == "update_petugas") {
                    if ($petugas->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=petugas'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=petugas'
                        </script>";
                    }
                } elseif ($act == "delete_petugas") {
                    $id = $_GET['id'];
                    if ($petugas->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=petugas'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=petugas'
                        </script>";
                    }
                } else {
                    echo $petugas->index();
                }
            } else {
                echo "Page 404 Not found";
            }
            ?>
        </div>
    </div>


    <script src="Assets/dist/js/bootstrap.min.js"></script>
</body>

</html>