<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('loginview');
    }

    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Validasi username dan password
        if ($username === 'admin' && $password === 'admin') {
            return redirect()->to('/adminview');
        } elseif ($username === 'customer' && $password === 'customer') {
            return redirect()->to('/customerview');
        } else {
            // Jika username atau password salah
            session()->setFlashdata('message', 'Username atau password salah');
            return redirect()->to('/loginview');
        }
    }

    public function logout()
    {
        // Hapus sesi pengguna dan arahkan ke halaman login
        session()->destroy();
        return redirect()->to('/loginview');
    }
}
