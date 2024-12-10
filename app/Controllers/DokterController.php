<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\PoliModel;

class DokterController extends BaseController
{
    protected $dokterModel;
    protected $poliModel;

    public function __construct()
    {
        $this->dokterModel = new DokterModel();
        $this->poliModel = new PoliModel();
    }

    public function index()
    {
        $data = [
            'breadcrumb' => ['Dokter'],
            'breadcrumbLinks' => ['/dokter'],
            'title' => 'Kelola Dokter',
            'dokter' => $this->dokterModel->paginateDokter(10),
            'pager' => $this->dokterModel->pager,
        ];
        return view('admin/dokter/index', $data);
    }

    public function create()
    {
        $data = [
            'breadcrumb' => ['Dokter', 'Tambah Dokter'],
            'breadcrumbLinks' => ['/dokter', '/dokter/create'],
            'title' => 'Tambah Dokter',
            'poli' => $this->poliModel->findAll(),
        ];
        return view('admin/dokter/create', $data);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_poli' => 'required',
        ]);

        $this->dokterModel->save([
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'id_poli' => $this->request->getPost('id_poli'),
        ]);

        return redirect()->to('/dokter')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Dokter',
            'breadcrumb' => ['Dokter', 'Edit Dokter'],
            'dokter' => $this->dokterModel->find($id),
            'poli' => $this->poliModel->findAll(),
        ];
        return view('admin/dokter/edit', $data);
    }

    public function update($id)
    {
        $this->dokterModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'id_poli' => $this->request->getPost('id_poli'),
        ]);

        return redirect()->to('/dokter')->with('success', 'Dokter berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->dokterModel->delete($id);
        return redirect()->to('/dokter')->with('success', 'Dokter berhasil dihapus.');
    }
}
