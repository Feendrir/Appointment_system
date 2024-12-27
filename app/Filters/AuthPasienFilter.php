<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthPasienFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah user sudah login sebagai pasien
        if (!session()->get('isLoggedIn') || session()->get('userType') !== 'pasien') {
            // Redirect ke halaman login dengan pesan error
            return redirect()->to('/')->with('error', 'Anda harus login sebagai pasien untuk mengakses halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan yang diperlukan setelah filter
    }
}
