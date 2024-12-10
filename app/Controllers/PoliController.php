<?php

namespace App\Controllers;

use App\Models\PoliModel;

class PoliController extends BaseController
{
    protected $poliModel;

    public function __construct()
    {
        $this->poliModel = new PoliModel();
    }

    public function index()
    {
        $data = [
            'breadcrumb' => ['Kelola Poliklinik'],
            'breadcrumbLinks' => ['/poli'],
            'title' => 'Kelola Poliklinik',
            'poli' => $this->poliModel->paginatePoli(10),
            'pager' => $this->poliModel->pager,
        ];
        return view('admin/poli/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Poliklinik',
            'breadcrumb' => ['Kelola Poliklinik', 'Tambah Poliklinik'],
            'breadcrumbLinks' => ['/poli', '/poli/create'],
        ];
        return view('admin/poli/create', $data);
    }

    public function store()
    {
        $this->validate([
            'nama_poli' => 'required',
            'keterangan' => 'required',
        ]);

        $this->poliModel->save([
            'nama_poli' => $this->request->getPost('nama_poli'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/poli')->with('success', 'Poli berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Poli',
            'breadcrumb' => ['Kelola Poliklinik', 'Edit Poliklinik'],
            'poli' => $this->poliModel->find($id),
        ];
        return view('admin/poli/edit', $data);
    }

    public function update($id)
    {
        $this->poliModel->update($id, [
            'nama_poli' => $this->request->getPost('nama_poli'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/poli')->with('success', 'Poli berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->poliModel->delete($id);
        return redirect()->to('/poli')->with('success', 'Poli berhasil dihapus.');
    }
}
