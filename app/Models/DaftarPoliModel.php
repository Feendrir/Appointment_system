<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarPoliModel extends Model
{
    protected $table = 'daftar_poli';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_pasien',
        'id_poli',
        'id_jadwal',
        'keluhan',
        'no_antrian',
        'created_at',
        'updated_at'
    ];
}
