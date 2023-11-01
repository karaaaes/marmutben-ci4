<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MAdminlogin;

class AdminLogin extends BaseController
{
    public function index(){

        return view('admin/login/login');
    }

    public function login()
    {
        $modelLogin = new MAdminlogin();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $modelLogin->getAccLogin($username, $password);

        if (!empty($user)) {
            // Login berhasil, atur sesi atau tindakan lain yang diperlukan
            $session = session();
            $session->set('id', $user[0]['id']); // Misalnya, simpan ID pengguna dalam sesi
            $session->set('username', $user[0]['type']); // Simpan informasi lain dalam sesi

            $session->setFlashdata('success_message', 'Selamat datang ' . $user[0]['type']);
            return redirect()->to(base_url() . '/admin/');
        } else {
            // Login gagal, arahkan kembali ke halaman login
            return redirect()->to(base_url().'admin/login')->with('error_message', 'Username atau password salah');
        }
    }

    public function logout()
    {
        // Hapus sesi atau lakukan tindakan logout lainnya
        $session = session();
        $session->destroy();
        return redirect()->to(base_url().'admin/login');
    }
}
