<?php

namespace App\Controllers;

use App\Models\UserModel;

class Signup extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->email = \Config\Services::email();
        $db      = \Config\Database::connect();
        $this->builder = $db->table('user');
    }

    public function index()
    {
        $data = [
            'title' => 'Register Page',
            'validation' => \Config\Services::validation()
        ];
        return view('signup', $data);
    }

    public function register()
    {
        $akun = $this->request->getVar('email');
        $this->builder->where('email', $akun);

        echo $num = $this->builder->countAllResults();

        if ($num == 1) {
            session()->setFlashdata('pesan', '<div class="alert alert-danger">Your Email already registered</div>');
            return redirect()->to('/login');
        } else {
            $leveluser = 'user';
            $belumaktif = 'belum aktif';
            
            $this->UserModel->save([
                'nama' => $this->request->getVar('nama'),
            
                'institusi' => $this->request->getVar('institusi'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'phone' => $this->request->getVar('phone'),
                'level' => $leveluser,
                'status' => $belumaktif

            ]);
            $this->sendEmail($akun);
            session()->setFlashdata('pesan', '<div class="alert alert-success">Register <b>Success</b>, Please check your email for Activation.. </div>');
            return redirect()->to('/login');
        }
    }

    public function sendEmail($akun)
    {

        $year = date("Y");
        $this->email->setFrom('injuratech@email.unikom.ac.id', 'ISCEER ' . $year);
        $this->email->setTo($akun);

        $this->email->setSubject('Activation Account ISCEER');
        $this->email->setMessage('<p> Your account almost ready to sign in. <br> <a href="http://localhost:8080/signup/aktivasi/' . $akun . '">Click Here to Activation </a> </p>');

        if (!$this->email->send()) {
            return false;
        } else {
            return true;
        }
    }

    public function aktivasi($akun)
    {
        $data = [
            'status' => 'aktif'
        ];
        $this->builder->where('email', $akun);
        $this->builder->update($data);
        session()->setFlashdata('pesan', '<div class="alert alert-success">Activation <b>Success</b>, Please Sign in.. </div>');
        return redirect()->to('/login');
    }
}
