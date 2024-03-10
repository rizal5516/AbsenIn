<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PegawaiModel;

class Auth extends BaseController
{
    protected $AdminModel;
    protected $PegawaiModel;

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->PegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        if (session()->get('role') != null) {
            if (session()->get('role') == 1) {
                return redirect()->to('admin');
            }

            if (session()->get('role') == 2) {
                return redirect()->to('pegawai');
            }
        }

        return view('auth/login');
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Cari Data Admin Berdasarkan email
        $admin = $this->AdminModel->getAdminByEmail($email);
        // CEK APAKAH ADA ADMIN


        if ($admin != null) {
            // CEK APAKAH PASSWORD BENAR
            if ($admin->password != $password) {
                session()->setFlashdata('pesan', "
                    <script>
                        Swal.fire(
                            'Error!',
                            'Password Salah',
                            'error'
                        )
                    </script>
                ");
                return redirect()->to('auth')->withInput();
            }

            $data_admin = [
                'id_admin' => $admin->id_admin,
                'nama_admin' => $admin->nama_admin,
                'email' => $admin->email,
                'role' => $admin->role
            ];
            session()->set($data_admin);
            session()->setFlashdata('pesan', "
                <script>
                    Swal.fire(
                        'Berhasil!',
                        'Berhasil Login!',
                        'success'
                    )
                </script>
            ");

            return redirect()->to('admin');
        }

        $pegawai = $this->PegawaiModel->getByEmail($email);
        // CEK APAKAH ADA PEGAWAI
        if ($pegawai != null) {
            // CEK APAKAH PASSWORD BENAR
            if (!password_verify($password, $pegawai->password)) {
                session()->setFlashdata('pesan', "
                    <script>
                        Swal.fire(
                            'Error!',
                            'Password Salah',
                            'error'
                        )
                    </script>
                ");
                return redirect()->to('auth')->withInput();
            }
            

            $data_pegawai = [
                'id_pegawai' => $pegawai->id_pegawai,
                'nama_pegawai' => $pegawai->nama_pegawai,
                'email' => $pegawai->email,
                'role' => $pegawai->role
            ];
            session()->set($data_pegawai);
            session()->setFlashdata('pesan', "
                <script>
                    Swal.fire(
                        'Berhasil!',
                        'Berhasil Login!',
                        'success'
                    )
                </script>
            ");

            return redirect()->to('pegawai');
        }

        // JIKA AKUN TIDAK DITEMUKAN
        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Error!',
                    'Akun Tidak Ditemukan! Periksa Kembali Format Email',
                    'error'
                )
            </script>
        ");

        return redirect()->to('auth')->withInput();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth');
    }
}
