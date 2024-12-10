<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'alamat', 'no_hp', 'id_poli'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    public function getAllWithPoli()
    {
        return $this->select('dokter.*, poli.nama_poli')
                    ->join('poli', 'poli.id = dokter.id_poli', 'left')
                    ->findAll();
    }

    public function paginateDokter($perPage = 10)
    {
        return $this->select('dokter.*, poli.nama_poli')
                    ->join('poli', 'poli.id = dokter.id_poli', 'left')
                    ->paginate($perPage);
    }
}
