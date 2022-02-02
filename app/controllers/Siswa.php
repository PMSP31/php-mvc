<?php

class Siswa extends Controller
{
    public function index()
    {
        $data['judul'] = "Daftar Siswa";
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = "Detail Siswa";
        $data['siswa'] = $this->model('Siswa_model')->getSiswaById($id);
        $this->view('templates/header', $data);
        $this->view('siswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Siswa_model')->addSiswa($_POST) > 0) {
            Flasher::setFlash('BERHASIL!', 'Ditambahkan', 'success');
            header('Location:' . URL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('GAGAL!', 'Ditambahkan', 'danger');
            header('Location:' . URL . '/siswa');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Siswa_model')->deleteSiswa($id) > 0) {
            Flasher::setFlash('BERHASIL!', 'Dihapus', 'success');
            header('Location:' . URL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('GAGAL!', 'Dihapus', 'danger');
            header('Location:' . URL . '/siswa');
            exit;
        }
    }
}
