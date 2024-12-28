<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriksaModel extends Model
{
    protected $table = 'periksa';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_daftar_poli',
        'tanggal_periksa',
        'catatan',
        'biaya_periksa',
        'created_at',
        'updated_at',
    ];

    public function getRiwayatPasienByDokter($idDokter)
    {
        return $this->db->table('periksa')
            ->select('pasien.id as id_pasien, pasien.no_rm, pasien.no_ktp, pasien.nama, pasien.no_hp, pasien.alamat')
            ->join('daftar_poli', 'daftar_poli.id = periksa.id_daftar_poli', 'left')
            ->join('jadwal_periksa', 'jadwal_periksa.id = daftar_poli.id_jadwal', 'left') // Relasi ke jadwal_periksa
            ->join('pasien', 'pasien.id = daftar_poli.id_pasien', 'left')
            ->where('jadwal_periksa.id_dokter', $idDokter) // Ambil dokter dari jadwal_periksa
            ->groupBy('pasien.id') // Pastikan pasien tidak berulang
            ->get()->getResultArray();
    }    

    public function getDetailRiwayatPeriksa($idPasien, $idDokter)
    {
        return $this->db->table('periksa')
            ->select('periksa.tanggal_periksa, pasien.nama as nama_pasien, dokter.nama as nama_dokter, daftar_poli.keluhan, periksa.biaya_periksa')
            ->join('daftar_poli', 'daftar_poli.id = periksa.id_daftar_poli', 'left')
            ->join('jadwal_periksa', 'jadwal_periksa.id = daftar_poli.id_jadwal', 'left') // Relasi ke jadwal_periksa
            ->join('pasien', 'pasien.id = daftar_poli.id_pasien', 'left')
            ->join('dokter', 'dokter.id = jadwal_periksa.id_dokter', 'left') // Ambil dokter dari jadwal_periksa
            ->where('pasien.id', $idPasien)
            ->where('dokter.id', $idDokter)
            ->get()->getResultArray();
    }
    
}
