<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SessionCheckMiddleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa keberadaan sesi pengguna
        if (!session()->get('id')) {
            // Sesi tidak ada, arahkan pengguna ke halaman login
            return redirect()->to(base_url('admin/login'));
        }

        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu tindakan setelah permintaan
        return $response;
    }
}
