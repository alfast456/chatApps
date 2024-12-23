<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        return view('login');  // Menampilkan form login
    }

    public function authenticate()
    {
        // log_message('debug', 'Form submitted!');

        // // Debugging dengan var_dump
        // var_dump($this->request->getPost());
        // exit;

        // // Atau menggunakan log_message
        // log_message('debug', print_r($this->request->getPost(), true));

        // Ambil input dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        dd($username, $password);

        // Validasi pengguna di database (contoh, pastikan Anda punya model atau tabel untuk pengguna)
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $username)->first();

        // Cek apakah username dan password valid
        if ($user && $password == $user['password']) {
            // Set session data
            session()->set('user_id', $user['id']);
            session()->set('username', $user['username']);

            // Redirect ke halaman chat atau halaman yang sesuai
            return redirect()->to('/chat');
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials');
        }
    }

    public function logout()
    {
        // Hapus session
        session()->remove('user_id');
        session()->remove('username');

        return redirect()->to('/login');
    }
}