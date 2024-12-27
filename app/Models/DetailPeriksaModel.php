<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPeriksaModel extends Model
{
    protected $table = 'detail_periksa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_periksa', 'id_obat'];

    // Fungsi untuk mendapatkan data obat berdasarkan id_periksa
    public function getDetailByPeriksa($idPeriksa)
    {
        return $this->select('detail_periksa.*, obat.nama_obat, obat.kemasan, obat.harga')
            ->join('obat', 'obat.id = detail_periksa.id_obat', 'left')
            ->where('detail_periksa.id_periksa', $idPeriksa)
            ->findAll();
    }
}

