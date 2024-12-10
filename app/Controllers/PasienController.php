<?php

namespace App\Controllers;

use App\Models\PasienModel;

class PasienController extends BaseController
{
    protected $pasienModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        $data = [
            'breadcrumb' => ['Pasien'],
            'breadcrumbLinks' => ['/pasien'],
            'title' => 'Pasien',
            'pasien' => $this->pasienModel->paginatePasien(10),
            'pager' => $this->pasienModel->pager,
        ];
        return view('admin/pasien/index', $data);
    }

    public function create()
    {
        $data = [
            'breadcrumb' => ['Pasien', 'Tambah Pasien'],
            'breadcrumbLinks' => ['/pasien', '/pasien/create'], // Opsional
            'title' => 'Tambah Pasien'
        ];
        return view('admin/pasien/create', $data);
    }

    public function store()
    {
        $yearMonth = date('Ym');

        $pasienModel = new PasienModel();
        $lastPasien = $pasienModel->where('no_rm LIKE', $yearMonth . '%')
            ->orderBy('no_rm', 'desc') 
            ->first();

        if ($lastPasien) {
            $lastNoRm = substr($lastPasien['no_rm'], -3);
            $nextNoRm = str_pad($lastNoRm + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNoRm = '001';
        }

        $noRm = $yearMonth . '-' . $nextNoRm;

        $data = [
            'nama_pasien' => $this->request->getPost('nama_pasien'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_rm' => $noRm
        ];

        if ($pasienModel->save($data)) {
            return redirect()->to('/pasien')->with('success', 'Pasien berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan pasien');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pasien',
            'breadcrumb' => ['Pasien', 'Edit Pasien'],
            'pasien' => $this->pasienModel->find($id),
        ];
        return view('admin/pasien/edit', $data);
    }

    public function update($id)
    {
        $this->pasienModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_hp' => $this->request->getPost('no_hp'),
        ]);

        return redirect()->to('/pasien')->with('success', 'Pasien berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->pasienModel->delete($id);
        return redirect()->to('/pasien')->with('success', 'Pasien berhasil dihapus.');
    }
}
