<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'alamat', 'no_ktp', 'no_hp', 'no_rm'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    public function paginatePasien($perPage = 10)
    {
        return $this->paginate($perPage);
    }

    public function generateNoRm()
    {
        $currentYearMonth = date('Ym');
        $totalThisMonth = $this->like('no_rm', $currentYearMonth . '-', 'after')->countAllResults();

        $nextNumber = $totalThisMonth + 1;
        return $currentYearMonth . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }
}
