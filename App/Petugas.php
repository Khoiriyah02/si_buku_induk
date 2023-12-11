<?php

namespace App;

use Config\Query_builder;

class Petugas
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('petugas')->get()->resultArray();
        $res = '<a href="?target=petugas&act=tambah_petugas" class="btn btn-outline-primary">Tambah Petugas</a>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Act</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                                <th scope="row">' . $no . '</th>
                                <td>' . $r['username'] . '</td>
                                <td>' . $r['password'] . '</td>
                                <td>
                                    <a href="?target=petugas&act=edit_petugas&id=' . $r['username'] . '" class="btn btn-outline-success">
                                        Edit
                                    </a>
                                    <a href="?target=petugas&act=delete_petugas&id=' . $r['username'] . '" class="btn btn-outline-danger">
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
        $res = '<form action="?target=petugas&act=simpan_petugas" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    <a href="?target=petugas" class="btn btn-outline-danger">Kembali</a>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = array(
            'username' => $username,
            'password' => $password
        );
        return $this->db->table('petugas')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('petugas')->where("username='$id'")->get()->rowArray();

        $res = '<form action="?target=petugas&act=update_petugas" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['username'] . '">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="' . $r['username'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="' . $r['password'] . '">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Ubah</button>
                    <a href="?target=petugas" class="btn btn-outline-danger">Kembali</a>
                </form>';
        return $res;
    }

    public function update()
    {
        $param = $_POST['param'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = array(
            'username' => $username,
            'password' => $password
        );

        return $this->db->table('petugas')->where("username='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('petugas')->where("username='$id'")->delete();
    }
}
