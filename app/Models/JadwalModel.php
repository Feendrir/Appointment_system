<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal_periksa'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key tabel

    // Kolom yang diizinkan untuk input
    protected $allowedFields = [
        'id_dokter', 
        'hari', 
        'jam_mulai', 
        'jam_selesai', 
        'status'
    ];

    // Tipe data kolom
    protected $useTimestamps = true; // Mengaktifkan timestamps otomatis
    protected $createdField = 'created_at'; // Kolom untuk menyimpan waktu pembuatan
    protected $updatedField = 'updated_at'; // Kolom untuk menyimpan waktu pembaruan
    
    /**
     * Fungsi untuk mendapatkan jadwal dokter dengan pengecekan status.
     * 
     * @param int $dokterId
     * @return array
     */
    public function getJadwalDokter($dokterId, $perPage = 10)
    {
        return $this->where('id_dokter', $dokterId)
                    ->orderBy("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
                    ->paginate($perPage);
    }    

    /**
     * Fungsi untuk memeriksa apakah ada jadwal bertabrakan.
     * 
     * @param int $dokterId
     * @param string $hari
     * @param string $jam_mulai
     * @param string $jam_selesai
     * @param int|null $ignoreId
     * @return bool
     */
    public function isTimeOverlap($dokterId, $hari, $jam_mulai, $jam_selesai, $ignoreId = null)
    {
        $builder = $this->where('id_dokter', $dokterId)
                        ->where('hari', $hari)
                        ->groupStart()
                        ->where("'$jam_mulai' BETWEEN jam_mulai AND jam_selesai")
                        ->orWhere("'$jam_selesai' BETWEEN jam_mulai AND jam_selesai")
                        ->orWhere("jam_mulai BETWEEN '$jam_mulai' AND '$jam_selesai'")
                        ->orWhere("jam_selesai BETWEEN '$jam_mulai' AND '$jam_selesai'")
                        ->groupEnd();

        if ($ignoreId !== null) {
            $builder->where('id !=', $ignoreId);
        }

        return $builder->countAllResults() > 0;
    }
}
