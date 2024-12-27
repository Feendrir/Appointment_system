<?php

namespace App\Validation;

use App\Models\JadwalModel;

class CustomRules
{
    public function valid_time(string $str): bool
    {
        return preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $str) === 1;
    }

    public function valid_time_range(string $value, ?string $fields = null, ?array $data = null): bool
    {
        $data = $data ?? service('request')->getPost();

        if (!isset($data['jam_mulai'], $data['jam_selesai'])) {
            return false;
        }

        return strtotime($data['jam_selesai']) > strtotime($data['jam_mulai']);
    }

    public function no_time_overlap(string $value, ?string $fields = null, ?array $data = null): bool
    {
        $data = $data ?? service('request')->getPost();
    
        if (!isset($data['hari'], $data['jam_mulai'], $data['jam_selesai'])) {
            return false;
        }
    
        $dokterId = session()->get('userId');
        $jadwalModel = new \App\Models\JadwalModel();
    
        // Cari jadwal dokter di hari yang sama
        $existingSchedules = $jadwalModel
            ->where('id_dokter', $dokterId)
            ->where('hari', $data['hari'])
            ->where('id !=', $data['id'] ?? 0) // Abaikan jadwal yang sedang diedit
            ->findAll();
    
        foreach ($existingSchedules as $jadwal) {
            $start = strtotime($jadwal['jam_mulai']);
            $end = strtotime($jadwal['jam_selesai']);
            $inputStart = strtotime($data['jam_mulai']);
            $inputEnd = strtotime($data['jam_selesai']);
    
            if ($inputStart < $end && $inputEnd > $start) {
                return false; // Ada bentrok
            }
        }
    
        return true;
    }
    
    
}
