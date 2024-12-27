<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\PoliModel;
use App\Models\JadwalModel;
use App\Models\DaftarPoliModel;
use App\Models\PeriksaModel;
use App\Models\ObatModel;
use App\Models\DetailPeriksaModel;

class DokterController extends BaseController
{
    protected $dokterModel;
    protected $poliModel;
    protected $jadwalModel;
    protected $daftarPoliModel;
    protected $periksaModel;
    protected $obatModel;
    protected $detailPeriksaModel;

    // Mapping hari Bahasa Inggris ke Bahasa Indonesia
    private $hariInggrisKeIndonesia = [
        'Monday'    => 'Senin',
        'Tuesday'   => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday'  => 'Kamis',
        'Friday'    => 'Jumat',
        'Saturday'  => 'Sabtu',
        'Sunday'    => 'Minggu'
    ];

    public function __construct()
    {
        $this->dokterModel = new DokterModel();
        $this->poliModel = new PoliModel();
        $this->jadwalModel = new JadwalModel();
        $this->daftarPoliModel = new DaftarPoliModel();
        $this->periksaModel = new PeriksaModel();
        $this->obatModel = new ObatModel();
        $this->detailPeriksaModel = new DetailPeriksaModel();
        
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
    public function setting()
    {
        // Periksa apakah user sudah login sebagai dokter
        if (!session()->get('isLoggedIn') || session()->get('userType') !== 'dokter') {
            return redirect()->to('/')->with('error', 'Anda harus login sebagai dokter untuk mengakses halaman ini.');
        }
    
        $dokterId = session()->get('userId'); // Ambil ID dokter dari sesi
    
        // Ambil data dokter dengan join ke tabel poli
        $dokter = $this->dokterModel
            ->select('dokter.*, poli.nama_poli') // Ambil data dokter dan nama poli
            ->join('poli', 'dokter.id_poli = poli.id', 'left') // Left join untuk mencegah error jika poli tidak ditemukan
            ->where('dokter.id', $dokterId)
            ->first(); // Ambil satu hasil
    
        if (!$dokter) {
            return redirect()->to('/dashboard-dokter')->with('error', 'Data dokter tidak ditemukan.');
        }
    
        // Kirim data ke view
        $data = [
            'title' => 'Pengaturan Dokter',
            'breadcrumb' => ['Setting'],
            'dokter' => $dokter,
        ];
    
        return view('dokter/setting', $data);
    }    

    public function profile()
    {
        // Ambil ID dokter dari sesi
        $dokterId = session()->get('userId');
    
        // Ambil data dokter dengan join ke tabel poli
        $dokter = $this->dokterModel
            ->select('dokter.*, poli.nama_poli') // Pastikan nama_poli diambil
            ->join('poli', 'dokter.id_poli = poli.id', 'left') // Left join untuk mencegah error jika poli tidak ditemukan
            ->where('dokter.id', $dokterId)
            ->first(); // Ambil hanya satu hasil
    
        if (!$dokter) {
            return redirect()->to('/dokter/setting')->with('error', 'Data dokter tidak ditemukan.');
        }
    
        return view('dokter/profile', ['dokter' => $dokter]);
    }    
    

    public function editProfile()
    {
        $dokterId = session()->get('userId');
    
        $dokter = $this->dokterModel->find($dokterId);
    
        if (!$dokter) {
            return redirect()->to('/dokter/setting')->with('error', 'Data dokter tidak ditemukan.');
        }
    
        $poli = $this->poliModel->findAll();
    
        $data = [
            'title' => 'Edit Profile',
            'breadcrumb' => ['Setting', 'Edit Profile'],
            'breadcrumbLinks' => ['/dokter/setting', '/dokter/edit'],
            'dokter' => $dokter,
            'poli' => $poli,
        ];
    
        return view('dokter/edit', $data);
    }    
      
    
    public function updateProfile()
    {
        if (!session()->get('isLoggedIn') || session()->get('userType') !== 'dokter') {
            return redirect()->to('/')->with('error', 'Anda harus login sebagai dokter untuk mengakses halaman ini.');
        }
    
        $dokterId = session()->get('userId');
    
        $this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'id_poli' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'no_hp.required' => 'Nomor telepon wajib diisi.',
            'no_hp.numeric' => 'Nomor telepon harus berupa angka.',
            'id_poli.required' => 'Poli wajib dipilih.',
        ]);
    
        $this->dokterModel->update($dokterId, [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'id_poli' => $this->request->getPost('id_poli'),
        ]);
    
        echo "<script>alert('Profil berhasil diperbarui!'); window.location.href='/dokter/setting';</script>";
    }

    // Tampilkan Jadwal Dokter
    public function jadwal()
    {
        $dokterId = session()->get('userId'); // ID Dokter
        $today = $this->hariInggrisKeIndonesia[date('l')]; // Konversi nama hari ke Bahasa Indonesia

        $jadwal = $this->jadwalModel
            ->where('id_dokter', $dokterId)
            ->orderBy("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')") // Urutkan hari
            ->paginate(10);

        $data = [
            'title' => 'Jadwal Dokter',
            'breadcrumb' => ['Jadwal'],
            'breadcrumbLinks' => ['/dokter/jadwal'],
            'jadwal' => $jadwal,
            'pager' => $this->jadwalModel->pager,
            'today' => $today, // Kirim hari ini ke view
        ];

        return view('dokter/jadwal/index', $data);
    }

    // Tambah Jadwal Dokter
    public function createJadwal()
    {
        $data = [
            'title' => 'Tambah Jadwal',
            'breadcrumb' => ['Jadwal', 'Tambah Jadwal'],
            'breadcrumbLinks' => ['/dokter/jadwal', '/dokter/jadwal/create'],
        ];

        return view('dokter/jadwal/create', $data);
    }

    public function storeJadwal()
    {
        $dokterId = session()->get('userId');
        $hariIni = $this->hariInggrisKeIndonesia[date('l')]; // Konversi nama hari ke Bahasa Indonesia

        // Validasi input
        $this->validate([
            'hari' => 'required',
            'jam_mulai' => 'required|valid_time',
            'jam_selesai' => 'required|valid_time|valid_time_range|no_time_overlap',
            'status' => 'required|in_list[aktif,nonaktif]',
        ], [
            'hari.required' => 'Hari wajib diisi.',
            'jam_mulai.required' => 'Jam mulai wajib diisi.',
            'jam_mulai.valid_time' => 'Format jam mulai harus HH:mm.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
            'jam_selesai.valid_time' => 'Format jam selesai harus HH:mm.',
            'jam_selesai.valid_time_range' => 'Jam selesai harus lebih besar dari jam mulai.',
            'jam_selesai.no_time_overlap' => 'Jadwal bertabrakan dengan jadwal lain.',
            'status.required' => 'Status wajib dipilih.',
            'status.in_list' => 'Status tidak valid.',
        ]);

        // Jika hari yang dipilih adalah hari ini, status harus nonaktif
        if ($this->request->getPost('status') === 'aktif' &&
            strtolower($this->request->getPost('hari')) === strtolower($hariIni)) {
            return redirect()->back()->withInput()->with('error', 'Jadwal aktif tidak dapat dibuat untuk hari H.');
        }

        // Jika status aktif, nonaktifkan jadwal lain
        if ($this->request->getPost('status') === 'aktif') {
            $this->jadwalModel->where('id_dokter', $dokterId)->update(null, ['status' => 'nonaktif']);
        }

        // Simpan jadwal baru
        $this->jadwalModel->insert([
            'id_dokter' => $dokterId,
            'hari' => $this->request->getPost('hari'),
            'jam_mulai' => $this->request->getPost('jam_mulai'),
            'jam_selesai' => $this->request->getPost('jam_selesai'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/dokter/jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Edit Jadwal Dokter
    public function editJadwal($id)
    {
        $jadwal = $this->jadwalModel->find($id);

        if (!$jadwal) {
            return redirect()->to('/dokter/jadwal')->with('error', 'Jadwal tidak ditemukan.');
        }

        $today = $this->hariInggrisKeIndonesia[date('l')]; // Konversi nama hari ke Bahasa Indonesia

        // Jika hari ini adalah hari H dan jadwal aktif, tampilkan pesan error
        if (strtolower($jadwal['hari']) === strtolower($today) && $jadwal['status'] === 'aktif') {
            return redirect()->to('/dokter/jadwal')->with('error', 'Jadwal tidak dapat diubah karena hari ini adalah hari H.');
        }

        $data = [
            'title' => 'Edit Jadwal',
            'breadcrumb' => ['Jadwal', 'Edit Jadwal'],
            'breadcrumbLinks' => ['/dokter/jadwal', '/dokter/jadwal/edit'],
            'jadwal' => $jadwal,
            'today' => $today, // Hari ini untuk view
        ];

        return view('dokter/jadwal/edit', $data);
    }

    public function updateJadwal($id)
    {
        $dokterId = session()->get('userId');
        $jadwal = $this->jadwalModel->find($id);

        if (!$jadwal || $jadwal['id_dokter'] != $dokterId) {
            return redirect()->to('/dokter/jadwal')->with('error', 'Data jadwal tidak ditemukan.');
        }

        $hariIni = $this->hariInggrisKeIndonesia[date('l')]; // Konversi nama hari ke Bahasa Indonesia

        // Jika hari ini adalah hari H dan jadwal aktif
        if (strtolower($jadwal['hari']) === strtolower($hariIni) && $jadwal['status'] === 'aktif') {
            return redirect()->to('/dokter/jadwal')->with('error', 'Jadwal tidak dapat diubah karena hari ini adalah hari H.');
        }

        // Validasi input
        $this->validate([
            'hari' => 'required',
            'jam_mulai' => 'required|valid_time',
            'jam_selesai' => 'required|valid_time|valid_time_range|no_time_overlap',
            'status' => 'required|in_list[aktif,nonaktif]',
        ], [
            'hari.required' => 'Hari wajib diisi.',
            'jam_mulai.required' => 'Jam mulai wajib diisi.',
            'jam_mulai.valid_time' => 'Format jam mulai harus HH:mm.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
            'jam_selesai.valid_time' => 'Format jam selesai harus HH:mm.',
            'jam_selesai.valid_time_range' => 'Jam selesai harus lebih besar dari jam mulai.',
            'jam_selesai.no_time_overlap' => 'Jadwal bertabrakan dengan jadwal lainnya.',
            'status.required' => 'Status wajib dipilih.',
            'status.in_list' => 'Status tidak valid.',
        ]);

        // Jika status aktif, nonaktifkan jadwal lain
        if ($this->request->getPost('status') === 'aktif') {
            $this->jadwalModel->where('id_dokter', $dokterId)->update(null, ['status' => 'nonaktif']);
        }

        // Update jadwal
        $this->jadwalModel->update($id, [
            'hari' => $this->request->getPost('hari'),
            'jam_mulai' => $this->request->getPost('jam_mulai'),
            'jam_selesai' => $this->request->getPost('jam_selesai'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/dokter/jadwal')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // Jadwal tidak dapat dihapus
    public function deleteJadwal($id)
    {
        return redirect()->to('/dokter/jadwal')->with('error', 'Jadwal tidak dapat dihapus karena berhubungan dengan riwayat periksa pasien.');
    }

    // Daftar pasien yang akan diperiksa
    public function daftarPasien()
    {
        $idDokter = session()->get('userId'); // Ambil ID dokter dari sesi

        $daftarPasien = $this->daftarPoliModel
            ->select('daftar_poli.*, pasien.nama AS nama_pasien, poli.nama_poli')
            ->join('pasien', 'pasien.id = daftar_poli.id_pasien', 'left')
            ->join('poli', 'poli.id = daftar_poli.id_poli', 'left')
            ->join('jadwal_periksa', 'jadwal_periksa.id = daftar_poli.id_jadwal', 'left')
            ->where('jadwal_periksa.id_dokter', $idDokter)
            ->whereNotIn('daftar_poli.id', function ($builder) {
                return $builder->select('id_daftar_poli')->from('periksa');
            })
            ->findAll();

        $data = [
            'title' => 'Daftar Pasien',
            'breadcrumb' => ['Periksa', 'Daftar Pasien'],
            'breadcrumbLinks' => ['/dokter/periksa'],
            'daftarPasien' => $daftarPasien,
        ];

        return view('dokter/periksa/index', $data);
    }

    // Detail pasien yang akan diperiksa
    // public function detailPasien($id)
    // {
    //     $pasien = $this->daftarPoliModel
    //         ->select('daftar_poli.*, pasien.nama AS nama_pasien, poli.nama_poli')
    //         ->join('pasien', 'pasien.id = daftar_poli.id_pasien', 'left')
    //         ->join('poli', 'poli.id = daftar_poli.id_poli', 'left')
    //         ->where('daftar_poli.id', $id)
    //         ->first();
    
    //     if (!$pasien) {
    //         return redirect()->to('/dokter/periksa')->with('error', 'Data pasien tidak ditemukan.');
    //     }
    
    //     $obat = $this->obatModel->findAll();
    
    //     $data = [
    //         'title' => 'Detail Pemeriksaan',
    //         'breadcrumb' => ['Periksa Pasien', 'Detail Pemeriksaan'],
    //         'breadcrumbLinks' => ['/dokter/periksa', '/dokter/periksa/detail'],
    //         'pasien' => $pasien,
    //         'obat' => $obat,
    //     ];
    
    //     return view('dokter/periksa/detail', $data);
    // }
    
    // public function storePeriksa()
    // {
    //     $idDaftarPoli = $this->request->getPost('id_daftar_poli');
    //     $catatan = $this->request->getPost('catatan');
    //     $biayaPeriksa = 150000; // Biaya periksa standar
    //     $obatIds = $this->request->getPost('obat') ?? []; // Array ID obat
    
    //     // Validasi input
    //     if (empty($catatan)) {
    //         return redirect()->back()->withInput()->with('error', 'Catatan pemeriksaan wajib diisi.');
    //     }
    
    //     // Hitung total harga obat
    //     $totalHargaObat = 0;
    //     if (!empty($obatIds)) {
    //         $obat = $this->obatModel->whereIn('id', $obatIds)->findAll();
    //         foreach ($obat as $item) {
    //             $totalHargaObat += $item['harga'];
    //         }
    //     }
    
    //     // Total biaya = biaya periksa + total harga obat
    //     $totalBiaya = $biayaPeriksa + $totalHargaObat;
    
    //     try {
    //         // Simpan data pemeriksaan
    //         $this->periksaModel->insert([
    //             'id_daftar_poli' => $idDaftarPoli,
    //             'tanggal_periksa' => date('Y-m-d'),
    //             'catatan' => $catatan,
    //             'biaya_periksa' => $totalBiaya,
    //         ]);
    
    //         return redirect()->to('/dokter/periksa')->with('success', 'Pemeriksaan berhasil disimpan.');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan pemeriksaan.');
    //     }
    // }
    public function detailPasien($id)
    {
        $pasien = $this->daftarPoliModel
            ->select('daftar_poli.*, pasien.nama AS nama_pasien, poli.nama_poli')
            ->join('pasien', 'pasien.id = daftar_poli.id_pasien', 'left')
            ->join('poli', 'poli.id = daftar_poli.id_poli', 'left')
            ->where('daftar_poli.id', $id)
            ->first();

        if (!$pasien) {
            return redirect()->to('/dokter/periksa')->with('error', 'Data pasien tidak ditemukan.');
        }

        $obat = $this->obatModel->findAll();

        $data = [
            'title' => 'Detail Pemeriksaan',
            'pasien' => $pasien,
            'obat' => $obat,
        ];

        return view('dokter/periksa/detail', $data);
    }

    public function storePeriksa()
    {
        $idDaftarPoli = $this->request->getPost('id_daftar_poli');
        $catatan = $this->request->getPost('catatan');
        $biayaPeriksa = 150000; // Biaya periksa standar
        $obatIds = $this->request->getPost('obat') ?? []; // Array ID obat

        // Validasi input
        if (empty($catatan)) {
            return redirect()->back()->withInput()->with('error', 'Catatan pemeriksaan wajib diisi.');
        }

        // Hitung total harga obat
        $totalHargaObat = 0;
        if (!empty($obatIds)) {
            $obat = $this->obatModel->whereIn('id', $obatIds)->findAll();
            foreach ($obat as $item) {
                $totalHargaObat += $item['harga'];
            }
        }

        // Total biaya = biaya periksa + total harga obat
        $totalBiaya = $biayaPeriksa + $totalHargaObat;

        try {
            // Simpan data pemeriksaan
            $idPeriksa = $this->periksaModel->insert([
                'id_daftar_poli' => $idDaftarPoli,
                'tanggal_periksa' => date('Y-m-d'),
                'catatan' => $catatan,
                'biaya_periksa' => $totalBiaya,
            ], true); // True untuk mengembalikan ID yang baru disimpan

            // Simpan data ke tabel detail_periksa
            foreach ($obatIds as $obatId) {
                $this->detailPeriksaModel->insert([
                    'id_periksa' => $idPeriksa,
                    'id_obat' => $obatId,
                ]);
            }

            return redirect()->to('/dokter/periksa')->with('success', 'Pemeriksaan berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan pemeriksaan.');
        }
    }

    public function riwayatPasien()
    {
        $idDokter = session()->get('userId'); // ID dokter dari sesi

        $riwayatPasien = $this->periksaModel->getRiwayatPasienByDokter($idDokter);

        $data = [
            'title' => 'Riwayat Pasien',
            'breadcrumb' => ['Riwayat Pasien'],
            'breadcrumbLinks' => ['/dokter/riwayat-pasien'],
            'riwayatPasien' => $riwayatPasien,
        ];

        return view('dokter/riwayat_pasien/index', $data);
    }

    public function detailPeriksaPasien($idPasien)
    {
        $idDokter = session()->get('userId'); // ID dokter dari sesi

        $detailPeriksa = $this->periksaModel->getDetailRiwayatPeriksa($idPasien, $idDokter);

        if (empty($detailPeriksa)) {
            return redirect()->to('/dokter/riwayat-pasien')->with('error', 'Riwayat periksa tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Riwayat Periksa',
            'breadcrumb' => ['Riwayat Pasien', 'Detail'],
            'breadcrumbLinks' => ['/dokter/riwayat-pasien', '/dokter/riwayat-pasien/detail'],
            'detailPeriksa' => $detailPeriksa,
        ];

        return view('dokter/riwayat_pasien/detail', $data);
    }


}
