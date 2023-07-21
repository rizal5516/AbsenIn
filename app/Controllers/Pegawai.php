<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    public function index()
    {
        return view('pegawai/dashboard');
    }

    public function profile()
    {
        return view('pegawai/profile');
    }

    public function dataAbsensi()
    {
        return view('pegawai/data-absen');
    }

    public function detailAbsensi()
    {
        return view('pegawai/detail-absen');
    }

}
