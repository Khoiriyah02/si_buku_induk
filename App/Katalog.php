<?php

namespace App;

use Config\Query_builder;

class Katalog
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('katalog')->get()->resultArray();
        $res = '<div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Act</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                                <th scope="row">' . $no . '</th>
                                <td>' . $r['judul'] . '</td>
                                <td><img src="' . $r['gambar'] . '" width="50"></td>
                                <td>' . $r['pengarang'] . '</td>
                                <td>' . $r['penerbit'] . '</td>
                                <td>' . $r['deskripsi'] . '</td>
                                <td>
                                    <a href="?target=katalog&act=edit_katalog&id=' . $r['judul'] . '" class="btn btn-outline-success">
                                        Edit
                                    </a>
                                    <a href="?target=katalog&act=delete_katalog&id=' . $r['judul'] . '" class="btn btn-outline-danger">
                                        Hapus
                                    </a>
                                </td>
                            </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function edit($id)
    {
        $r = $this->db->table('katalog')->where("judul='$id'")->get()->rowArray();

        $res = '<form action="?target=katalog&act=update_katalog" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['judul'] . '">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="' . $r['judul'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" value="' . $r['gambar'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" value="' . $r['pengarang'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="' . $r['penerbit'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="' . $r['deskripsi'] . '">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Ubah</button>
                    <a href="?target=katalog" class="btn btn-outline-danger">Kembali</a>
                </form>';
        return $res;
    }

    public function update()
    {
        $param = $_POST['param'];
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

        return $this->db->table('katalog')->where("judul='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('katalog')->where("judul='$id'")->delete();
    }
}
