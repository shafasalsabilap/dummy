<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function loginProcess()
    {
        $session = session();

        // Validasi form input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username' => ['required' => 'Username wajib diisi.'],
            'password' => ['required' => 'Password wajib diisi.']
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/login')->withInput()->with('errors', $validation->getErrors());
        }

        $model = new UserModel();
        $username = (string) $this->request->getVar('username');
        $password = (string) $this->request->getVar('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'username' => $user['username'],
                'logged_in' => true
            ]);
            return redirect()->to('/');
        } else {
            return redirect()->to('/login')->with('error', 'Username atau Password salah.');
        }

    }

    public function register()
    {
        return view('register');
    }

    public function registerProcess()
    {
        $session = session();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ], [
            'username' => [
                'required' => 'Username wajib diisi.',
                'is_unique' => 'Username sudah digunakan.'
            ],
            'password' => [
                'required' => 'Password wajib diisi.',
                'min_length' => 'Password minimal 6 karakter.'
            ],
            'confirm_password' => [
                'required' => 'Konfirmasi Password wajib diisi.',
                'matches' => 'Konfirmasi Password tidak cocok.'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/register')->withInput()->with('errors', $validation->getErrors());
        }

        $model = new UserModel();
        $username = (string) $this->request->getVar('username');
        $password = (string) $this->request->getVar('password');

        $model->save([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout()
    {
        session()->destroy(); // Hapus semua data session
        return redirect()->to('/login'); // Redirect ke halaman login
    }
}
