<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }
    public function login()
    {
        //ambil data dari form
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        //ambil data user di database yang usernamenya sama 
        $user = $this->userModel->where('email', $data['email'])->first();

        //cek apakah username ditemukan
        if ($user) {
            //cek password
            //jika salah arahkan lagi ke halaman login
            if ($user['password'] != ($data['password'])) {
                session()->setFlashdata('pesan', '<div class="alert alert-danger">Wrong Password. Try again</div>');
                return redirect()->to('/login');
            } else if ($user['status'] == 'belum_aktif') {
                session()->setFlashdata('pesan', '<div class="alert alert-danger">Check your Email to Activate your account.. </div>');
                return redirect()->to('/login');
            } else if ($user['level'] == 'user') {
                //jika benar, dan levelnya user arahkan user masuk ke halaman USER
                $sessLogin = [
                    'logged_in' => true,
                    'email' => $user['email'],
                    'level' => $user['level'],
                    'nama' => $user['nama'],
                    'id_user' =>$user['id_user']

                ];
                $this->session->set($sessLogin);
                return redirect()->to('/user');
            } else if ($user['level'] == 'admin') {
                //jika benar, dan levelnya user arahkan user masuk ke halaman USER
                $sessLogin = [
                    'logged_in' => true,
                    'email' => $user['email'],
                    'level' => $user['level'],
                    'nama' => $user['nama'],
                    'id_user' =>$user['id_user']
                ];
                $this->session->set($sessLogin);
                return redirect()->to('/admin');
            } else if ($user['level'] == 'reviewer') {
                //jika benar, dan levelnya user arahkan user masuk ke halaman USER
                $sessLogin = [
                    'logged_in' => true,
                    'email' => $user['email'],
                    'level' => $user['level'],
                    'nama' => $user['nama'],
                    'id_user' =>$user['id_user']
                ];
                $this->session->set($sessLogin);
                return redirect()->to('/reviewer');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('pesan', '<div class="alert alert-danger">Wrong Email. Try again</div>');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        session()->setFlashdata('pesan', '<div class="alert alert-success">Logout Success</div>');
        return redirect()->to('/login');
    }

    
}
