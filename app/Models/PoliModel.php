<?php

namespace App\Models;

use CodeIgniter\Model;

class PoliModel extends Model
{
    protected $table = 'poli';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_poli', 'keterangan'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    public function paginatePoli($perPage = 10)
    {
        return $this->paginate($perPage);
    }
}
