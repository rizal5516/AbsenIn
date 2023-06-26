<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function profile()
    {
        return view('admin/profile');
    }

    public function dataPegawai()
    {
        return view('admin/pegawai/data-pegawai');
    }

    public function tambahDataPegawai()
    {
        return view('admin/pegawai/tambah-pegawai');
    }

    public function dataJabatan()
    {
        return view('admin/pegawai/data-jabatan');
    }

    public function tambahDataJabatan()
    {
        return view('admin/pegawai/tambah-jabatan');
    }

    public function dataAbsensi()
    {
        return view('admin/absensi/data-absensi');
    }

    public function detailAbsensiHariIni()
    {
        return view('admin/absensi/detail-absensi');
    }

    public function riwayatAbsensi()
    {
        return view('admin/absensi/riwayat-absensi');
    }

    public function settingAbsensi()
    {
        return view('admin/absensi/setting-absensi');
    }

    public function dataPenggajian()
    {
        return view('admin/pegawai/data-penggajian');
    }

    public function riwayatPenggajian()
    {
        return view('admin/pegawai/riwayat-gaji');
    }


}
