<?php

namespace App\Controllers;

use App\Models\PasienModel;
use App\Models\PoliModel;
use App\Models\DokterModel;
use App\Models\DaftarPoliModel;
use App\Models\JadwalModel;
use App\Models\DetailPeriksaModel;
use App\Models\PeriksaModel;


class PasienController extends BaseController
{
    protected $pasienModel;
    protected $poliModel;
    protected $dokterModel;
    protected $daftarPoliModel;
    protected $jadwalModel;
    protected $detailPeriksaModel;
    protected $periksaModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->poliModel = new PoliModel();
        $this->dokterModel = new DokterModel();
        $this->daftarPoliModel = new DaftarPoliModel();
        $this->jadwalModel = new JadwalModel();
        $this->detailPeriksaModel = new DetailPeriksaModel();
        $this->periksaModel = new PeriksaModel();

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
            'nama' => $this->request->getPost('nama'),
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

      // Menampilkan daftar riwayat pendaftaran poli
      public function daftarPoli()
      {
          $idPasien = session()->get('userId'); // Ambil ID pasien dari sesi
      
          $daftarPoli = $this->daftarPoliModel
              ->select('daftar_poli.*, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, dokter.nama AS nama_dokter, poli.nama_poli')
              ->join('jadwal_periksa', 'jadwal_periksa.id = daftar_poli.id_jadwal', 'left')
              ->join('dokter', 'dokter.id = jadwal_periksa.id_dokter', 'left') // Ambil dokter dari jadwal_periksa
              ->join('poli', 'poli.id = daftar_poli.id_poli', 'left') // Ambil poli langsung
              ->where('daftar_poli.id_pasien', $idPasien)
              ->paginate(10);
      
          $data = [
              'title' => 'Daftar Poli',
              'breadcrumb' => ['Daftar Poli'],
              'breadcrumbLinks' => ['/pasien/daftar-poli'],
              'daftarPoli' => $daftarPoli,
              'pager' => $this->daftarPoliModel->pager,
          ];
      
          return view('pasien/daftar_poli/index', $data);
      }
      
    //   public function getJadwalByPoli($idPoli)
    //   {
    //       $jadwal = $this->jadwalModel
    //           ->select('jadwal_periksa.id, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, dokter.nama as nama_dokter')
    //           ->join('dokter', 'dokter.id = jadwal_periksa.id_dokter', 'left')
    //           ->where('dokter.id_poli', $idPoli) // Filter berdasarkan poli
    //           ->where('jadwal_periksa.status', 'aktif') // Hanya jadwal aktif
    //           ->findAll();
    //           dd($jadwal);

      
    //       if (!empty($jadwal)) {
    //           return $this->response->setJSON(['success' => true, 'jadwal' => $jadwal]);
    //       } else {
    //           return $this->response->setJSON(['success' => true, 'jadwal' => []]);
    //       }
    //   }
    public function getJadwalByPoli($idPoli)
    {
        $jadwal = $this->jadwalModel
            ->select('jadwal_periksa.id, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, dokter.nama as nama_dokter')
            ->join('dokter', 'dokter.id = jadwal_periksa.id_dokter', 'left')
            ->where('dokter.id_poli', $idPoli) // Filter berdasarkan poli
            ->where('jadwal_periksa.status', 'aktif') // Hanya jadwal aktif
            ->findAll();

        dd($jadwal); // Debug data jadwal
    }

      

    // Form tambah daftar poli
    public function createDaftarPoli()
    {
        // Ambil ID pasien dari session
        $idPasien = session()->get('userId');
    
        // Validasi apakah pasien sudah login
        if (!$idPasien) {
            return redirect()->to('/')->with('error', 'Session tidak valid, silakan login ulang.');
        }
    
        // Ambil data pasien berdasarkan ID
        $pasien = $this->pasienModel->select('id, no_rm, nama')->where('id', $idPasien)->first();
    
        // Validasi jika data pasien tidak ditemukan
        if (!$pasien) {
            return redirect()->to('/')->with('error', 'Data pasien tidak ditemukan.');
        }
    
        // Ambil semua data poli
        $poli = $this->poliModel->findAll();
    
        // Ambil jadwal dokter yang aktif (ini hanya data awal, akan disaring via AJAX di frontend)
        $jadwal = $this->jadwalModel
            ->select('jadwal_periksa.*, dokter.nama as nama_dokter')
            ->join('dokter', 'dokter.id = jadwal_periksa.id_dokter', 'left')
            ->where('jadwal_periksa.status', 'aktif') // Hanya jadwal aktif
            ->findAll();
    
        // Kirim data ke view
        $data = [
            'title' => 'Tambah Daftar Poli',
            'breadcrumb' => ['Daftar Poli', 'Tambah Daftar Poli'],
            'breadcrumbLinks' => ['/pasien/daftar-poli', '/pasien/daftar-poli/create'],
            'pasien' => $pasien,
            'poli' => $poli, // Semua poli
            'jadwal' => $jadwal, // Semua jadwal awal (bisa disaring via AJAX)
        ];
        //dd($pasien, $poli, $jadwal);

        return view('pasien/daftar_poli/create', $data);
    }
    
     
    public function storeDaftarPoli()
    {
        $idPasien = session()->get('userId');
    
        // Validasi input
        $this->validate([
            'id_poli' => 'required',
            'id_jadwal' => 'required',
            'keluhan' => 'required',
        ], [
            'id_poli.required' => 'Poli wajib dipilih.',
            'id_jadwal.required' => 'Jadwal wajib dipilih.',
            'keluhan.required' => 'Keluhan wajib diisi.',
        ]);
    
        // Ambil data jadwal
        $jadwal = $this->jadwalModel->find($this->request->getPost('id_jadwal'));
    
        if (!$jadwal) {
            return redirect()->back()->withInput()->with('error', 'Jadwal tidak ditemukan.');
        }
    
        try {
            // Generate nomor antrian baru
            $lastAntrian = $this->daftarPoliModel
                ->where('id_jadwal', $this->request->getPost('id_jadwal'))
                ->orderBy('no_antrian', 'DESC')
                ->first();
    
            $noAntrian = $lastAntrian ? $lastAntrian['no_antrian'] + 1 : 1;
    
            // Simpan data pendaftaran
            $this->daftarPoliModel->insert([
                'id_pasien' => $idPasien,
                'id_poli' => $this->request->getPost('id_poli'),
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'keluhan' => $this->request->getPost('keluhan'),
                'no_antrian' => $noAntrian,
            ]);
    
            return redirect()->to('/pasien/daftar-poli')->with('success', 'Pendaftaran berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat membuat pendaftaran.');
        }
    }    
  
      // Detail periksa
      public function detailPeriksa($idDaftarPoli)
      {
          $idPasien = session()->get('userId');
      
          // Ambil data pendaftaran poli
          $daftarPoli = $this->daftarPoliModel
              ->select('daftar_poli.*, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, poli.nama_poli, dokter.nama AS nama_dokter')
              ->join('jadwal_periksa', 'jadwal_periksa.id = daftar_poli.id_jadwal', 'left')
              ->join('dokter', 'dokter.id = jadwal_periksa.id_dokter', 'left')
              ->join('poli', 'poli.id = daftar_poli.id_poli', 'left')
              ->where('daftar_poli.id', $idDaftarPoli)
              ->where('daftar_poli.id_pasien', $idPasien)
              ->first();
      
          if (!$daftarPoli) {
              return redirect()->to('/pasien/daftar-poli')->with('error', 'Data tidak ditemukan.');
          }
      
          // Ambil data pemeriksaan
          $periksa = $this->periksaModel
              ->where('id_daftar_poli', $idDaftarPoli)
              ->first();
      
          $detailObat = [];
          if ($periksa) {
              $detailObat = $this->detailPeriksaModel->getDetailByPeriksa($periksa['id']);
          }
      
          $data = [
              'title' => 'Detail Periksa',
              'breadcrumb' => ['Daftar Poli', 'Detail Periksa'],
              'breadcrumbLinks' => ['/pasien/daftar-poli', '/pasien/daftar-poli/detail'],
              'daftarPoli' => $daftarPoli,
              'periksa' => $periksa,
              'detailObat' => $detailObat,
          ];
      
          return view('pasien/daftar_poli/detail', $data);
      }
      
      
      
}
