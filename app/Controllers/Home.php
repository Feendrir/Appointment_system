<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\PasienModel;

class Home extends BaseController
{
    protected $dokterModel;
    protected $pasienModel;

    public function __construct()
    {
        $this->dokterModel = new DokterModel();
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function loginDoctor()
    {
        $username = $this->request->getPost('nama');
        $password = $this->request->getPost('alamat');
    
        // Cari data dokter berdasarkan nama dan alamat
        $dokter = $this->dokterModel->where('nama', $username)->where('alamat', $password)->first();
    
        if ($dokter) {
            // Set session dengan ID dokter
            session()->set([
                'isLoggedIn' => true,
                'userType' => 'dokter',
                'userId' => $dokter['id'], // Menyimpan ID dokter
                'userName' => $dokter['nama'],
            ]);
    
            // Redirect ke dashboard dokter
            echo "<script>alert('Login berhasil! Selamat datang, {$dokter['nama']}'); window.location.href='/dashboard-dokter';</script>";
        } else {
            echo "<script>alert('Login gagal! Periksa username dan alamat.'); window.location.href='/';</script>";
        }
    }
    

    public function dashboardDokter()
    {
        if (!session()->get('isLoggedIn') || session()->get('userType') !== 'dokter') {
            echo "<script>alert('Anda harus login sebagai dokter.'); window.location.href='/';</script>";
        }

        return view('pages/dashboard-dokter', ['title' => 'Dashboard Dokter', 'userName' => session()->get('userName')]);
    }
    public function loginPatient()
    {
        $username = $this->request->getPost('nama');
        $password = $this->request->getPost('alamat');
    
        $pasien = $this->pasienModel->where('nama', $username)->where('alamat', $password)->first();
    
        if ($pasien) {
            session()->set([
                'isLoggedIn' => true,
                'userType' => 'pasien',
                'userId' => $pasien['id'], // Pastikan ID pasien disimpan
                'userName' => $pasien['nama'],
            ]);
            echo "<script>alert('Login berhasil! Selamat datang, {$pasien['nama']}'); window.location.href='/dashboard-pasien';</script>";
        } else {
            echo "<script>alert('Login gagal! Periksa nama dan alamat.'); window.location.href='/';</script>";
        }
    }
      

    public function dashboardPasien()
    {
        //dd(session()->get());

        if (!session()->get('isLoggedIn') || session()->get('userType') !== 'pasien') {
            echo "<script>alert('Anda harus login sebagai pasien.'); window.location.href='/';</script>";
        }
    
        $idPasien = session()->get('userId');
        if (!$idPasien) {
            echo "<script>alert('Session tidak valid, silakan login ulang.'); window.location.href='/';</script>";
        }
    
        return view('pages/dashboard-pasien', [
            'title' => 'Dashboard Pasien',
            'userName' => session()->get('userName'),
        ]);
    }    

    public function registerPage()
    {
        return view('auth/register');
    }

    public function registerPatient()
    {
        $this->validate([
            'no_ktp' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'terms' => 'required',
        ], [
            'no_ktp.required' => 'Nomor KTP wajib diisi.',
            'no_ktp.numeric' => 'Nomor KTP harus berupa angka.',
            'nama.required' => 'Nama wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'no_hp.required' => 'Nomor telepon wajib diisi.',
            'no_hp.numeric' => 'Nomor telepon harus berupa angka.',
            'terms.required' => 'Anda harus menyetujui syarat dan ketentuan.',
        ]);

        $data = [
            'no_ktp' => $this->request->getPost('no_ktp'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'no_rm' => $this->generateNoRm(),
        ];

        $this->pasienModel->insert($data);
        session()->set([
            'isLoggedIn' => true,
            'userType' => 'pasien',
            'userName' => $data['nama'],
        ]);
        echo "<script>alert('Registrasi berhasil! Selamat datang, {$data['nama']}'); window.location.href='/dashboard-pasien';</script>";
    }

    private function generateNoRm()
    {
        $yearMonth = date('Ym');
        $lastRecord = $this->pasienModel->orderBy('id', 'DESC')->first();

        $lastSequence = isset($lastRecord['no_rm']) ? (int) substr($lastRecord['no_rm'], -3) : 0;
        $newSequence = str_pad($lastSequence + 1, 3, '0', STR_PAD_LEFT);

        return $yearMonth . '-' . $newSequence;
    }

    public function loginAdminPage()
    {
        return view('pages/loginadmin');
    }

    public function loginAdmin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === 'admin' && $password === 'admin123') {
            session()->set([
                'isLoggedIn' => true,
                'userType' => 'admin',
                'userName' => 'Administrator',
            ]);
            echo "<script>alert('Login berhasil! Selamat datang, Administrator.'); window.location.href='/dashboard';</script>";
        } else {
            echo "<script>alert('Login gagal! Periksa username dan password.'); window.location.href='/admin';</script>";
        }
    }

    public function dashboard()
    {
        if (!session()->get('isLoggedIn') || session()->get('userType') !== 'admin') {
            echo "<script>alert('Anda harus login sebagai admin.'); window.location.href='/admin';</script>";
        }

        return view('pages/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        echo "<script>alert('Anda telah berhasil logout.'); window.location.href='/';</script>";
    }
}
