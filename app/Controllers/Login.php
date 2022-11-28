<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login Page'
        ];
        echo view('login',$data);
    }
}
