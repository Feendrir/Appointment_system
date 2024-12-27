<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthDokterFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah user sudah login sebagai dokter
        if (!session()->get('isLoggedIn') || session()->get('userType') !== 'dokter') {
            // Redirect ke halaman login dengan pesan error
            return redirect()->to('/')->with('error', 'Anda harus login sebagai dokter untuk mengakses halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan yang diperlukan setelah filter
    }
}
