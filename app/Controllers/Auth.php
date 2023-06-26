<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        return redirect()->to('admin');
    }

    public function logout()
    {
        return view('auth/login');
    }
}
