<?php

namespace App;

use Config\Query_builder;

class BukuInduk
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('bukuinduk')->get()->resultArray();
        $res = '<a href="?target=bukuinduk&act=tambah_bukuinduk" class="btn btn-outline-primary">Tambah Buku Induk</a>
                <a href="?target=bukuinduk&act=tambah_katalog" class="btn btn-outline-primary">Tambah Katalog</a>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">No. Induk</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col" >Asal</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Jumlah Judul</th>
                            <th scope="col">Jumlah Eksemplar</th>
                            <th scope="col">No. Klas</th>
                            <th scope="col">000</th>
                            <th scope="col">100</th>
                            <th scope="col">200</th>
                            <th scope="col">300</th>
                            <th scope="col">400</th>
                            <th scope="col">500</th>
                            <th scope="col">600</th>
                            <th scope="col">700</th>
                            <th scope="col">800</th>
                            <th scope="col">900</th>
                            <th scope="col">Fiksi</th>
                            <th scope="col">Ket.</th>
                            <th scope="col">Act</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                                <th scope="row">' . $no . '</th>
                                <td>' . $r['no_induk'] . '</td>
                                <td>' . $r['tanggal'] . '</td>
                                <td>' . $r['asal'] . '</td>
                                <td>' . $r['judul'] . '</td>
                                <td>' . $r['pengarang'] . '</td>
                                <td>' . $r['jml_judul'] . '</td>
                                <td>' . $r['jml_eks'] . '</td>
                                <td>' . $r['no_klas'] . '</td>
                                <td>' . $r['kry_umum'] . '</td>
                                <td>' . $r['filsafat'] . '</td>
                                <td>' . $r['agama'] . '</td>
                                <td>' . $r['ilmu_sosial'] . '</td>
                                <td>' . $r['bahasa'] . '</td>
                                <td>' . $r['ilmu_murni'] . '</td>
                                <td>' . $r['ilmu_terapan'] . '</td>
                                <td>' . $r['seni_olahraga'] . '</td>
                                <td>' . $r['kesusastraan'] . '</td>
                                <td>' . $r['sejarah_geografi'] . '</td>
                                <td>' . $r['fiksi'] . '</td>
                                <td>' . $r['ket'] . '</td>
                                <td>
                                    <a href="?target=bukuinduk&act=edit_bukuinduk&id=' . $r['no_induk'] . '" class="btn btn-outline-success">
                                        Edit
                                    </a>
                                    <a href="?target=bukuinduk&act=delete_bukuinduk&id=' . $r['no_induk'] . '" class="btn btn-outline-danger">
                                        Hapus
                                    </a>
                                </td>
                            </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<form action="?target=bukuinduk&act=simpan_bukuinduk" method="post">
                    <div class="mb-3">
                        <label for="no_induk" class="form-label">No. Induk</label>
                        <input type="text" class="form-control" id="no_induk" name="no_induk">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <div class="mb-3">
                        <label for="asal" class="form-label">Asal</label>
                        <input type="text" class="form-control" id="asal" name="asal">
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang">
                    </div>
                    <div class="mb-3">
                        <label for="jml_judul" class="form-label">Jumlah Judul</label>
                        <input type="text" class="form-control" id="jml_judul" name="jml_judul">
                    </div>
                    <div class="mb-3">
                        <label for="jlm_eks" class="form-label">Jumlah Eksemplar</label>
                        <input type="text" class="form-control" id="jml_eks" name="jml_eks">
                    </div>
                    <div class="mb-3">
                        <label for="no_klas" class="form-label">No. Klas</label>
                        <input type="text" class="form-control" id="no_klas" name="no_klas">
                    </div>
                    <div class="mb-3">
                        <label for="kry_umum" class="form-label">000</label>
                        <input type="text" class="form-control" id="kry_umum" name="kry_umum">
                    </div>
                    <div class="mb-3">
                        <label for="filsafat" class="form-label">100</label>
                        <input type="text" class="form-control" id="filsafat" name="filsafat">
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">200</label>
                        <input type="text" class="form-control" id="agama" name="agama">
                    </div>
                    <div class="mb-3">
                        <label for="ilmu_sosial" class="form-label">300</label>
                        <input type="text" class="form-control" id="ilmu_sosial" name="ilmu_sosial">
                    </div>
                    <div class="mb-3">
                        <label for="bahasa" class="form-label">400</label>
                        <input type="text" class="form-control" id="bahasa" name="bahasa">
                    </div>
                    <div class="mb-3">
                        <label for="ilmu_murni" class="form-label">500</label>
                        <input type="text" class="form-control" id="ilmu_murni" name="ilmu_murni">
                    </div>
                    <div class="mb-3">
                        <label for="ilmu_terapan" class="form_label">600</label>
                        <input type="text" class="form-control" id="ilmu_terapan" name="ilmu_terapan">
                    </div>
                    <div class="mb-3">
                        <label for="seni_olahraga" class="form-label">700</label>
                        <input type="text" class="form-control" id="seni_olahraga" name="seni_olahraga">
                    </div>
                    <div class="mb-3">
                        <label for="kesusastraan" class="form-label">800</label>
                        <input type="text" class="form-control" id="kesusastraan" name="kesusastraan">
                    </div>
                    <div class="mb-3">
                        <label for="sejarah_geografi" class="form-label">900</label>
                        <input type="text" class="form-control" id="sejarah_geografi" name="sejarah_geografi">
                    </div>
                    <div class="mb-3">
                        <label for="fiksi" class="form-label">Fiksi</label>
                        <div class="form-check-inline">
                            <input type="checkbox" class="form-check-input" name="fiksi" id="fiksi" value="F">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Ket</label>
                        <input type="text" class="form-control" id="ket" name="ket">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    <a href="?target=bukuinduk" class="btn btn-outline-danger">Kembali</a>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $no_induk = $_POST['no_induk'];
        $tanggal = $_POST['tanggal'];
        $asal = $_POST['asal'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $jml_judul = $_POST['jml_judul'];
        $jml_eks = $_POST['jml_eks'];
        $no_klas = $_POST['no_klas'];
        $kry_umum = $_POST['kry_umum'];
        $filsafat = $_POST['filsafat'];
        $agama = $_POST['agama'];
        $ilmu_sosial = $_POST['ilmu_sosial'];
        $bahasa = $_POST['bahasa'];
        $ilmu_murni = $_POST['ilmu_murni'];
        $ilmu_terapan = $_POST['ilmu_terapan'];
        $seni_olahraga = $_POST['seni_olahraga'];
        $kesusastraan = $_POST['kesusastraan'];
        $sejarah_geografi = $_POST['sejarah_geografi'];
        $fiksi = $_POST['fiksi'];
        $ket = $_POST['ket'];

        $data = array(
            'no_induk' => $no_induk,
            'tanggal' => $tanggal,
            'asal' => $asal,
            'judul' => $judul,
            'pengarang' => $pengarang,
            'jml_judul' => $jml_judul,
            'jml_eks' => $jml_eks,
            'no_klas' => $no_klas,
            'kry_umum' => $kry_umum,
            'filsafat' => $filsafat,
            'agama' => $agama,
            'no_induk' => $no_induk,
            'ilmu_sosial' => $ilmu_sosial,
            'bahasa' => $bahasa,
            'ilmu_murni' => $ilmu_murni,
            'ilmu_terapan' => $ilmu_terapan,
            'seni_olahraga' => $seni_olahraga,
            'kesusastraan' => $kesusastraan,
            'sejarah_geografi' => $sejarah_geografi,
            'fiksi' => $fiksi,
            'ket' => $ket,
        );
        return $this->db->table('bukuinduk')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('bukuinduk')->where("no_induk='$id'")->get()->rowArray();

        $res = '<form action="?target=bukuinduk&act=update_bukuinduk" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['no_induk'] . '">
                    <div class="mb-3">
                        <label for="no_induk" class="form-label">No Induk</label>
                        <input type="text" class="form-control" id="no_induk" name="no_induk" value="' . $r['no_induk'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="tanggal" class="form-control" id="tanggal" name="tanggal" value="' . $r['tanggal'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="asal" class="form-label">Asal</label>
                        <input type="text" class="form-control" id="asal" name="asal" value="' . $r['asal'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="' . $r['judul'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" value="' . $r['pengarang'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="jml_judul" class="form-label">Jumlah Judul</label>
                        <input type="text" class="form-control" id="jml_judul" name="jml_judul" value="' . $r['jml_judul'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="jlm_eks" class="form-label">Jumlah Eksemplar</label>
                        <input type="text" class="form-control" id="jml_eks" name="jml_eks" value="' . $r['jml_eks'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="no_klas" class="form-label">No. Klas</label>
                        <input type="text" class="form-control" id="no_klas" name="no_klas" value="' . $r['no_klas'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="kry_umum" class="form-label">000</label>
                        <input type="text" class="form-control" id="kry_umum" name="kry_umum" value="' . $r['kry_umum'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="filsafat" class="form-label">100</label>
                        <input type="text" class="form-control" id="filsafat" name="filsafat" value="' . $r['filsafat'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">200</label>
                        <input type="text" class="form-control" id="agama" name="agama" value="' . $r['agama'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="ilmu_sosial" class="form-label">300</label>
                        <input type="text" class="form-control" id="ilmu_sosial" name="ilmu_sosial" value="' . $r['ilmu_sosial'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="bahasa" class="form-label">400</label>
                        <input type="text" class="form-control" id="bahasa" name="bahasa" value="' . $r['bahasa'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="ilmu_murni" class="form-label">500</label>
                        <input type="text" class="form-control" id="ilmu_murni" name="ilmu_murni" value="' . $r['ilmu_murni'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="ilmu_terapan" class="form_label">600</label>
                        <input type="text" class="form-control" id="ilmu_terapan" name="ilmu_terapan" value="' . $r['ilmu_terapan'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="seni_olahraga" class="form-label">700</label>
                        <input type="text" class="form-control" id="seni_olahraga" name="seni_olahraga" value="' . $r['seni_olahraga'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="kesusastraan" class="form-label">800</label>
                        <input type="text" class="form-control" id="kesusastraan" name="kesusastraan" value="' . $r['kesusastraan'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="sejarah_geografi" class="form-label">900</label>
                        <input type="text" class="form-control" id="sejarah_geografi" name="sejarah_geografi">
                    </div>
                    <div class="mb-3">
                        <label for="fiksi" class="form-label">Fiksi</label>
                        <div class="form-check-inline">
                            <input type="checkbox" class="form-check-input" name="fiksi" id="fiksi" value="1" ' . $this->checkbox($r['fiksi'], 1) . '>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Ket</label>
                        <input type="text" class="form-control" id="ket" name="ket" value="' . $r['ket'] . '">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Ubah</button>
                    <a href="?target=bukuinduk" class="btn btn-outline-danger">Kembali</a>
                </form>';
        return $res;
    }

    public function checkbox($F)
    {
        if ($F) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $no_induk = $_POST['no_induk'];
        $tanggal = $_POST['tanggal'];
        $asal = $_POST['asal'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $jml_judul = $_POST['jml_judul'];
        $jml_eks = $_POST['jml_eks'];
        $no_klas = $_POST['no_klas'];
        $kry_umum = $_POST['kry_umum'];
        $filsafat = $_POST['filsafat'];
        $agama = $_POST['agama'];
        $ilmu_sosial = $_POST['ilmu_sosial'];
        $bahasa = $_POST['bahasa'];
        $ilmu_murni = $_POST['ilmu_murni'];
        $ilmu_terapan = $_POST['ilmu_terapan'];
        $seni_olahraga = $_POST['seni_olahraga'];
        $kesusastraan = $_POST['kesusastraan'];
        $sejarah_geografi = $_POST['sejarah_geografi'];
        $fiksi = $_POST['fiksi'];
        $ket = $_POST['ket'];

        $data = array(
            'no_induk' => $no_induk,
            'tanggal' => $tanggal,
            'asal' => $asal,
            'judul' => $judul,
            'pengarang' => $pengarang,
            'jml_judul' => $jml_judul,
            'jml_eks' => $jml_eks,
            'no_klas' => $no_klas,
            'kry_umum' => $kry_umum,
            'filsafat' => $filsafat,
            'agama' => $agama,
            'no_induk' => $no_induk,
            'ilmu_sosial' => $ilmu_sosial,
            'bahasa' => $bahasa,
            'ilmu_murni' => $ilmu_murni,
            'ilmu_terapan' => $ilmu_terapan,
            'seni_olahraga' => $seni_olahraga,
            'kesusastraan' => $kesusastraan,
            'sejarah_geografi' => $sejarah_geografi,
            'fiksi' => $fiksi,
            'ket' => $ket,
        );

        return $this->db->table('bukuinduk')->where("no_induk='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('bukuinduk')->where("no_induk='$id'")->delete();
    }

    public function tambah_katalog()
    {
        $data = $this->db->table('katalog')->get()->resultArray();
        $res = '<form action="?target=bukuinduk&act=simpan_katalog" method="post" >
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    <a href="?target=katalog" class="btn btn-outline-danger">Kembali</a>
                </form>';
        return $res;
    }

    public function simpan_katalog()
    {
        $judul = $_POST['judul'];
        $gambar = $_POST['gambar'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $deskripsi = $_POST['deskripsi'];

        $data = array(
            'judul' => $judul,
            'gambar' => $gambar,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
            'deskripsi' => $deskripsi

        );
        return $this->db->table('katalog')->insert($data);
    }
}
