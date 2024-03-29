<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;
use App\Models\PengaturanModel;
use App\Models\AbsenModel;
use App\Models\AbsenDetailModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Admin extends BaseController
{
    protected $AdminModel;
    protected $JabatanModel;
    protected $PegawaiModel;
    protected $PengaturanModel;
    protected $AbsenModel;
    protected $AbsenDetailModel;

    public function __construct()
    {

        $this->AdminModel = new AdminModel();
        $this->JabatanModel = new JabatanModel();
        $this->PegawaiModel = new PegawaiModel();
        $this->PengaturanModel = new PengaturanModel();
        $this->AbsenModel = new AbsenModel();
        $this->AbsenDetailModel = new AbsenDetailModel();
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => 'show active',
            'tab_master' => '',
            'dashboard' => 'current-page',
            'pegawai' => '',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => '',
            'gaji' => ''
        ];

        $data['plugin'] = '
        <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4.css" />
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4-custom.css" />
            <link href="' . base_url('assets/template') . '/vendor/datatables/buttons.bs.css" rel="stylesheet" />
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.bootstrap.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/custom/custom-datatables.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/jszip.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/pdfmake.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/vfs_fonts.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/html5.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.print.min.js"></script>
            ';

        $data['admin'] = $this->AdminModel->asObject()->first();
        $data['pegawai'] = $this->PegawaiModel->asObject()->findAll();
        $data['jabatan'] = $this->JabatanModel->asObject()->findAll();
        $data['absensi'] = $this->AbsenModel->getByTanggal(date('d-M-Y', time()));
        $data['pengaturan'] = $this->PengaturanModel->asObject()->first();

        return view('admin/dashboard', $data);
    }
    public function profile()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => 'show active',
            'tab_master' => '',
            'dashboard' => 'current-page',
            'pegawai' => '',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => '',
            'gaji' => ''
        ];

        $data['plugin'] = '';

        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/profile', $data);
    }
    public function profile_()
    {
        $fileGambar = $this->request->getFile('gambar');

        // Cek Gambar, Apakah Tetap Gambar lama
        if ($fileGambar->getError() == 4) {
            $nama_gambar = $this->request->getVar('gambar_lama');
        } else {
            // Generate nama file Random
            $nama_gambar = $fileGambar->getRandomName();
            // Upload Gambar

            $fileGambar->move('assets/img/pegawai', $nama_gambar);
            if ($this->request->getVar('gambar_lama') != 'default.jpg') {
                unlink('assets/img/pegawai/' . $this->request->getVar('gambar_lama'));
            }
        }

        $this->AdminModel
            ->set('nama_admin', $this->request->getVar('nama'))
            ->set('gambar', $nama_gambar)
            ->where('id_admin', session()->get('id_admin'))
            ->update();

        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Profile Updated!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/profile');
    }
    public function password()
    {
        $admin = $this->AdminModel->asObject()->first();

        $current_password = $this->request->getVar('current_password');
        $new_password = $this->request->getVar('new_password');

        if ($current_password != $admin->password) {
            session()->setFlashdata('pesan', "
                <script>
                    Swal.fire(
                        'Error!',
                        'Current Password salah!',
                        'error'
                    )
                </script>
            ");

            return redirect()->to('admin/profile');
        }

        $this->AdminModel
            ->set('password', $new_password)
            ->where('id_admin', session()->get('id_admin'))
            ->update();

        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',jabatan
                    'Password Terupdate!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/profile');
    }

    // START::PEGAWAI
    public function pegawai()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => 'current-page',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => '',
            'gaji' => ''
        ];

        $data['plugin'] = '
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4.css" />
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4-custom.css" />
            <link href="' . base_url('assets/template') . '/vendor/datatables/buttons.bs.css" rel="stylesheet" />
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.bootstrap.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/custom/custom-datatables.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/jszip.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/pdfmake.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/vfs_fonts.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/html5.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.print.min.js"></script>	
        ';

        $data['pegawai'] = $this->PegawaiModel->getAll();
        $data['jabatan'] = $this->JabatanModel->asObject()->findAll();
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/pegawai/data-pegawai', $data);
    }
    public function tambah_pegawai()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => 'current-page',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => '',
            'gaji' => ''
        ];

        $data['plugin'] = '
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/bs-select/bs-select.css" />
            <script src="' . base_url('assets/template') . '/vendor/bs-select/bs-select.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/bs-select/bs-select-custom.js"></script>
        ';

        $data['jabatan'] = $this->JabatanModel->asObject()->findAll();
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/pegawai/tambah-pegawai', $data);
    }
    public function tambah_pegawai_()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();


        $fileGambar = $this->request->getFile('gambar');

        // Cek Gambar, Apakah Tetap Gambar lama
        if ($fileGambar->getError() == 4) {
            $nama_gambar = 'default.jpg';
        } else {
            // Generate nama file Random
            $nama_gambar = $fileGambar->getRandomName();
            // Upload Gambar
            $fileGambar->move('assets/img/pegawai', $nama_gambar);
        }

        $nip = $this->request->getVar('nip');
        $hashedNIP = password_hash($nip, PASSWORD_DEFAULT);

        $data_pegawai = [
            'nip' => $this->request->getVar('nip'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'jabatan' => $this->request->getVar('jabatan'),
            'email' => $this->request->getVar('email'),
            'gaji_pokok' => $this->request->getVar(('gaji_pokok')),
            'password' => $hashedNIP,
            'gambar' => $nama_gambar,
            'is_active' => 1,
            'lembur' => 0,
            'role' => 2
        ];

        $this->PegawaiModel->save($data_pegawai);
        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Data Berhasil Di Tambah!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/pegawai');
    }
    public function edit_pegawai()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        if ($this->request->isAJAX()) {
            $id_pegawai = $this->request->getVar('id_pegawai');
            $pegawai = $this->PegawaiModel->asObject()->find($id_pegawai);
            echo json_encode($pegawai);
        }
    }

    public function edit_pegawai_()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $fileGambar = $this->request->getFile('gambar');

        // Cek Gambar, Apakah Tetap Gambar lama
        if ($fileGambar->getError() == 4) {
            $nama_gambar = $this->request->getVar('gambar_lama');
        } else {
            // Generate nama file Random
            $nama_gambar = $fileGambar->getRandomName();
            // Upload Gambar
            $fileGambar->move('assets/img/pegawai', $nama_gambar);
            // hapus File Yang Lama
            if ($this->request->getVar('gambar_lama') != 'default.jpg') {
                unlink('assets/img/pegawai/' . $this->request->getVar('gambar_lama'));
            }
        }

        $password = $this->request->getVar('password');

        $this->PegawaiModel->save([
            'id_pegawai' => $this->request->getVar('id_pegawai'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'jabatan' => $this->request->getVar('jabatan'),
            'email' => $this->request->getVar('email'),
            'gaji_pokok' => $this->request->getVar('gaji_pokok'),
            'password' => $password,
            'gambar' => $nama_gambar,
            'lembur' => $this->request->getVar('lembur'),
            'is_active' => $this->request->getVar('is_active'),
        ]);

        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Data Berhasil Di Update!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/pegawai');
    }

    public function hapus_pegawai($id)
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $pegawai = $this->PegawaiModel->asObject()->find($id);

        if ($pegawai == null) {
            session()->setFlashdata('pesan', "
                <script>
                    Swal.fire(
                        'Error!',
                        'Data Pegawai Tidak ditemukan!',
                        'error'
                    )
                </script>
            ");

            return redirect()->to('admin/pegawai');
        }

        if ($pegawai->is_active == 1) {
            session()->setFlashdata('pesan', "
                <script>
                    Swal.fire(
                        'Error!',
                        'Data Pegawai Sedang Aktif, Ubah Keterangan Pegawai Terlebih Dahulu!',
                        'error'
                    )
                </script>
            ");

            return redirect()->to('admin/pegawai');
        }

        if ($pegawai->gambar != 'default.jpg') {
            unlink('assets/img/pegawai/' . $pegawai->gambar);
        }

        $this->PegawaiModel->delete($id);
        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Data Pegawai di hapus!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/pegawai');
    }
    // END::PEGAWAI

    // START::JABATAN
    public function jabatan()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => '',
            'jabatan' => 'current-page',
            'pengaturan_absen' => '',
            'absensi' => '',
            'gaji' => ''
        ];

        $data['plugin'] = '
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4.css" />
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4-custom.css" />
            <link href="' . base_url('assets/template') . '/vendor/datatables/buttons.bs.css" rel="stylesheet" />
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.bootstrap.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/custom/custom-datatables.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/jszip.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/pdfmake.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/vfs_fonts.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/html5.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.print.min.js"></script>	
        ';

        $data['jabatan'] = $this->JabatanModel->asObject()->findAll();
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/pegawai/data-jabatan', $data);
    }
    public function tambah_jabatan()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => '',
            'jabatan' => 'current-page',
            'pengaturan_absen' => '',
            'absensi' => '',
            'gaji' => ''
        ];

        $data['plugin'] = '
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/bs-select/bs-select.css" />
            <script src="' . base_url('assets/template') . '/vendor/bs-select/bs-select.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/bs-select/bs-select-custom.js"></script>
        ';

        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/pegawai/tambah-jabatan', $data);
    }
    public function tambah_jabatan_()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data_jabatan = [];
        $nama_jabatan = $this->request->getVar('nama_jabatan');
        $tunjangan = $this->request->getVar('tunjangan');
        $jam_masuk = $this->request->getVar('jam_masuk');
        $jam_keluar = $this->request->getVar('jam_keluar');

        foreach ($nama_jabatan as $nama) {
            array_push($data_jabatan, [
                'nama_jabatan' => $nama,
                'tunjangan' => $tunjangan,
                'jam_masuk' => $jam_masuk,
                'jam_keluar' => $jam_keluar
            ]);
        }

        $this->JabatanModel->insertBatch($data_jabatan);

        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Data Berhasil Di Tambah!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/jabatan');
    }
    public function hapus_jabatan($id)
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }

        if ($this->pakeJabatan($id)) {
            session()->setFlashdata('pesan', "
        <script>
            Swal.fire (
                'Gagal!',
                'Data Sedang Digunakan, Cek Kembali Pada Halaman Pegawai',
                'error'
                )
                </script>
        ");
            return redirect()->to('admin/jabatan');
        }

        $this->JabatanModel->delete($id);

        session()->setFlashdata('pesan', "
        <script>
            Swal.fire(
                'Berhasil!',
                'Data Berhasil Di Hapus!',
                'success'
            )
        </script>
    ");

        return redirect()->to('admin/jabatan');
    }

    private function pakeJabatan($id)
    {
        $jumlahPenggunaan = $this->PegawaiModel->where('jabatan', $id)->countAllResults();
        return $jumlahPenggunaan > 0;
    }
    public function edit_jabatan()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $this->JabatanModel->save([
            'id_jabatan' => $this->request->getVar('id_jabatan'),
            'nama_jabatan' => $this->request->getVar('nama_jabatan'),
            'tunjangan' => $this->request->getVar('tunjangan'),
            'jam_masuk' => $this->request->getVar('jam_masuk'),
            'jam_keluar' => $this->request->getVar('jam_keluar')
        ]);

        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Data Berhasil Di Update!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/jabatan');
    }
    // END::JABATAN

    // START::PENGATURAN ABSEN
    public function pengaturan_absen()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => '',
            'jabatan' => '',
            'pengaturan_absen' => 'current-page',
            'absensi' => '',
            'gaji' => ''
        ];

        $data['plugin'] = '';

        $data['jabatan'] = $this->JabatanModel->asObject()->findAll();
        $data['pengaturan'] = $this->PengaturanModel->asObject()->first();
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/absensi/setting-absensi', $data);
    }
    public function setting_absen_()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();
        $latitude_longitude = explode(',', $this->request->getVar('latitude_longitude'));

        $this->PengaturanModel->save([
            'id_pengaturan_absen' => $this->request->getVar('id_pengaturan_absen'),
            'latitude' => $latitude_longitude[0],
            'longitude' => trim($latitude_longitude[1], ' '),
            'batas_jarak' => $this->request->getVar('batas_jarak'),
            'upah' => $this->request->getVar('upah'),
            'denda' => $this->request->getVar('denda'),
            'bonus_siswa' => $this->request->getVar('bonus_siswa'),
            'bonus_absen' => $this->request->getVar('bonus_absen')
        ]);

        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Data Berhasil Di Update!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/pengaturan_absen');
    }
    public function hitung_jarak()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        function distance($lat1, $lon1, $lat2, $lon2, $unit)
        {
            if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                return 0;
            } else {
                $theta = $lon1 - $lon2;
                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $unit = strtoupper($unit);

                if ($unit == "K") {
                    return ($miles * 1.609344);
                } else if ($unit == "N") {
                    return ($miles * 0.8684);
                } else {
                    return $miles;
                }
            }
        }

        echo (ceil(distance(-6.299343650274825, 107.28533103878851, -6.205034529440262, 107.53736151406567, "K")) * 1000) . " Meter<br>";
    }
    // END::PENGATURAN ABSEN

    // START::ABSENSI
    public function absensi()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => '',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => 'current-page',
            'gaji' => ''
        ];

        $data['plugin'] = '
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4.css" />
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4-custom.css" />
            <link href="' . base_url('assets/template') . '/vendor/datatables/buttons.bs.css" rel="stylesheet" />
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.bootstrap.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/custom/custom-datatables.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/jszip.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/pdfmake.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/vfs_fonts.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/html5.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.print.min.js"></script>	
        ';

        $data['absensi'] = $this->AbsenModel->getByTanggal(date('d-M-Y', time()));
        $data['riwayat_absen'] = $this->AbsenModel
            ->orderBy('id_absensi', 'DESC')
            ->get()->getResultObject();
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/absensi/data-absensi', $data);
    }

    public function absen($kode_absen)
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => '',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => 'current-page',
            'gaji' => ''
        ];

        $data['plugin'] = '
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4.css" />
            <link rel="stylesheet" href="' . base_url('assets/template') . '/vendor/datatables/dataTables.bs4-custom.css" />
            <link href="' . base_url('assets/template') . '/vendor/datatables/buttons.bs.css" rel="stylesheet" />
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/dataTables.bootstrap.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/custom/custom-datatables.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/jszip.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/pdfmake.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/vfs_fonts.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/html5.min.js"></script>
            <script src="' . base_url('assets/template') . '/vendor/datatables/buttons.print.min.js"></script>	
        ';

        $data['absensi'] = $this->AbsenModel->getByKode($kode_absen);
        $data['detail_absensi'] = $this->AbsenDetailModel->getAllByKodeAbsen($kode_absen);
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/absensi/riwayat-absensi', $data);
    }
    public function absen_pegawai($kode_absen, $id_pegawai)
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => '',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => 'current-page',
            'gaji' => ''
        ];

        $data['plugin'] = '';

        $data['absensi'] = $this->AbsenModel->getByKode($kode_absen);
        $data['detail_absensi'] = $this->AbsenDetailModel->getByKodeAndIdPegawai($kode_absen, $id_pegawai);
        $data['pengaturan'] = $this->PengaturanModel->asObject()->first();
        $data['admin'] = $this->AdminModel->asObject()->first();
        $data['jabatan'] = $this->JabatanModel->asObject()->where('id_jabatan', $data['detail_absensi']->id_jabatan)->first();

        return view('admin/absensi/detail-absensi-pegawai', $data);
    }
    public function izin_pegawai($kode_absen, $id_pegawai)
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }
        // absen_hari_ini();

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => '',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => 'current-page',
            'gaji' => ''
        ];

        $data['plugin'] = '';

        $data['absensi'] = $this->AbsenModel->getByKode($kode_absen);
        $data['detail_absensi'] = $this->AbsenDetailModel->getByKodeAndIdPegawai($kode_absen, $id_pegawai);
        $data['pengaturan'] = $this->PengaturanModel->asObject()->first();
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/absensi/detail-izin-pegawai', $data);
    }
    public function download_izin($bukti_izin)
    {
        return $this->response->download('assets/img/pegawai/' . $bukti_izin, null);
    }
    public function izinkan($kode_absen, $id_pegawai)
    {
        $this->AbsenDetailModel
            ->set('status_izin', 1)
            ->where('kode_absensi', $kode_absen)
            ->where('pegawai', $id_pegawai)
            ->update();

        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Berhasil Diizinkan!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/izin_pegawai' . '/' . $kode_absen . '/' . $id_pegawai);
    }
    public function hapus_absen($kode_absen)
    {
        $this->AbsenModel
            ->where('kode_absensi', $kode_absen)
            ->delete();

        $this->AbsenDetailModel
            ->where('kode_absensi', $kode_absen)
            ->delete();

        session()->setFlashdata('pesan', "
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Data Berhasil Di Hapus!',
                    'success'
                )
            </script>
        ");

        return redirect()->to('admin/absensi');
    }
    // END::ABSENSI
}
