<?php

namespace App\Controllers;

use App\Models\ObatModel;

class ObatController extends BaseController
{
    protected $obatModel;

    public function __construct()
    {
        $this->obatModel = new ObatModel(); 
    }

    public function index()
    {
        $obatModel = new \App\Models\ObatModel();
        $data = [
            'breadcrumb' => ['Kelola Obat'],
            'breadcrumbLinks' => ['/obat'],
            'title' => 'Kelola Obat',
            'obat' => $obatModel->paginate(10), 
            'pager' => $obatModel->pager
        ];
    
        return view('admin/obat/index', $data);
    }

    public function create()
    {
        $data = [
            'breadcrumb' => ['Kelola Obat', 'Tambah Obat'],
            'breadcrumbLinks' => ['/obat', '/obat/create'],
            'title' => 'Tambah Obat'
        ];
        return view('admin/obat/create', $data);
    }

    public function store()
    {
        $this->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|decimal'
        ]);

        $this->obatModel->save([
            'nama_obat' => $this->request->getPost('nama_obat'),
            'kemasan' => $this->request->getPost('kemasan'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to('/obat')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Obat',
            'breadcrumb' => ['Kelola Obat', 'Edit Obat'],
            'obat' => $this->obatModel->find($id)
        ];

        return view('admin/obat/edit', $data);
    }

    public function update($id)
    {
        $this->obatModel->update($id, [
            'nama_obat' => $this->request->getPost('nama_obat'),
            'kemasan' => $this->request->getPost('kemasan'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to('/obat')->with('success', 'Data obat berhasil diubah.');
    }

    public function delete($id)
    {
        $this->obatModel->delete($id);
        return redirect()->to('/obat')->with('success', 'Data obat berhasil dihapus.');
    }
}
