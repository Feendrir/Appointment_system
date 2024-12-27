<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToJadwalPeriksa extends Migration
{
    public function up()
    {
        $this->forge->addColumn('jadwal_periksa', [
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default' => 'nonaktif',
                'null' => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('jadwal_periksa', 'status');
    }
}
