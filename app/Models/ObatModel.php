<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_obat', 'kemasan', 'harga'];
    protected $useTimestamps = false; 

    protected $returnType = 'array';

    public function paginateObat($perPage = 10)
    {
      return $this->paginate($perPage);
    }
}
