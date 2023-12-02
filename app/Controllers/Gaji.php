<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;
use App\Models\PengaturanModel;
use App\Models\AbsenModel;
use App\Models\AbsenDetailModel;
use App\Models\GajiModel;
use App\Libraries\Pdfgenerator;

class Gaji extends BaseController
{
    protected $AdminModel;
    protected $JabatanModel;
    protected $PegawaiModel;
    protected $PengaturanModel;
    protected $AbsenModel;
    protected $AbsenDetailModel;
    protected $GajiModel;

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->JabatanModel = new JabatanModel();
        $this->PegawaiModel = new PegawaiModel();
        $this->PengaturanModel = new PengaturanModel();
        $this->AbsenModel = new AbsenModel();
        $this->AbsenDetailModel = new AbsenDetailModel();
        $this->GajiModel = new GajiModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function dataPenggajian()
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
            'absensi' => '',
            'gaji' => 'current-page'
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

        $data['pegawai'] = $this->PegawaiModel->getActivePegawai();
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/gaji/data-penggajian', $data);
    }

    public function riwayatPenggajian($id_pegawai)
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
            'absensi' => '',
            'gaji' => 'current-page'
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

        $data['gaji'] = $this->GajiModel->findByPegawaiId($id_pegawai);
        $data['pegawai'] = $this->PegawaiModel->getById($id_pegawai);
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/gaji/riwayat-gaji', $data);
    }

    

    public function calculate_salary_()
    {
        $id_pegawai = $this->request->getVar('id_pegawai');
        $jumlahJamKerja = 0;
        $jumlahDenda = 0;
        $jumlahBonusSiswa = $this->request->getVar('jumlah_siswa');
        $jumlahBonusAbsen = 0;

        $month = date("M-Y", strtotime("-1 months"));
        $absens = $this->AbsenModel->getByMonth($month);
        var_dump($month);
        $kodeAbsens = array();
        foreach ($absens as $absen) {
            array_push($kodeAbsens, $absen->kode_absensi);
        }

        $detailAbsens = $this->AbsenDetailModel->getByArrayKodeAndIdPegawai($kodeAbsens, $id_pegawai);

        foreach ($detailAbsens as $detail) {
            if ($detail->status_masuk == 1) {
                $jumlahDenda++;
            } else {
                $jumlahBonusAbsen++;
            }

            $absenMasuk = strtotime(date('H:i', $detail->absen_masuk));
            $absenKeluar = strtotime(date('H:i', $detail->absen_keluar));
            $diff = floor(abs($absenMasuk - $absenKeluar) / 3600);
            $jumlahJamKerja += $diff;
        }

        $pengaturan = $this->PengaturanModel->asObject()->first();
        $totalUpah = $jumlahJamKerja * $pengaturan->upah;
        $totalDenda = $jumlahDenda * $pengaturan->denda;
        $totalBonusSiswa = $jumlahBonusSiswa * $pengaturan->bonus_siswa;
        $totalBonusAbsen = $jumlahBonusAbsen * $pengaturan->bonus_absen;
        $gajiBersih = $totalUpah + $totalBonusSiswa + $totalBonusAbsen - $totalDenda;
        $gaji = [
            'pegawai_id' => $id_pegawai,
            'upah' => $pengaturan->upah,
            'denda' => $pengaturan->denda,
            'bonus_siswa' => $pengaturan->bonus_siswa,
            'bonus_absen' => $pengaturan->bonus_absen,
            'bulan' => date('Y-m-d', strtotime("-1 months")),
            'jumlah_jam_kerja' => $jumlahJamKerja,
            'jumlah_denda' => $jumlahDenda,
            'jumlah_bonus_siswa' => $jumlahBonusSiswa,
            'jumlah_bonus_absen' => $jumlahBonusAbsen,
            'total_upah' => $totalUpah,
            'total_denda' => $totalDenda,
            'total_bonus_siswa' => $totalBonusSiswa,
            'total_bonus_absen' => $totalBonusAbsen,
            'gaji_bersih' => $gajiBersih
        ];

        $salaryThisMonth = $this->GajiModel->findThisMonth($id_pegawai);
        if ($salaryThisMonth == null) {
            $this->GajiModel->save($gaji);
        } else {
            $this->GajiModel->save([
                'id' => $salaryThisMonth->id,
                'pegawai_id' => $id_pegawai,
                'upah' => $pengaturan->upah,
                'denda' => $pengaturan->denda,
                'bonus_siswa' => $pengaturan->bonus_siswa,
                'bonus_absen' => $pengaturan->bonus_absen,
                'bulan' => date('Y-m-d') ,
                'jumlah_jam_kerja' => $jumlahJamKerja,
                'jumlah_denda' => $jumlahDenda,
                'jumlah_bonus_siswa' => $jumlahBonusSiswa,
                'jumlah_bonus_absen' => $jumlahBonusAbsen,
                'total_upah' => $totalUpah,
                'total_denda' => $totalDenda,
                'total_bonus_siswa' => $totalBonusSiswa,
                'total_bonus_absen' => $totalBonusAbsen,
                'gaji_bersih' => $gajiBersih
            ]);
        }

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => '',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => '',
            'gaji' => 'current-page'
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
        $data['judul_halaman'] = 'Dashboard Admin';
        $data['judul_sidebar'] = 'Upah Pegawai';
        $data['admin'] = $this->AdminModel->asObject()->first();
        $data['pegawai'] = $this->PegawaiModel->getById($id_pegawai);
        $data['gaji'] = $gaji;

        return view('admin/gaji/upah-pegawai', $data);
    }

    public function print($id)
    {
        $Pdfgenerator = new Pdfgenerator();

        $gaji = $this->GajiModel->findById($id);
        $pegawai = $this->PegawaiModel->getById($gaji->pegawai_id);

        $data['title_pdf'] = 'Laporan Gaji ' . $pegawai->nama_pegawai . ' Bulan ' . date('F Y', strtotime($gaji->bulan));
        $data['gaji'] = $gaji;
        $data['pegawai'] = $pegawai;

        $file_pdf = 'laporan_gaji_' . $pegawai->nama_pegawai . '_' . date('F Y', strtotime($gaji->bulan));
        $paper = 'A4';
        $orientation = "portrait";

        $html = view('admin/gaji/laporan-gaji', $data);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function detailKehadiran ($id_pegawai)
    {
            if (session()->get('role') != 1) {
                return redirect()->to('auth');
            }
    
            $data['menu'] = [
                'tab_home' => '',
                'tab_master' => 'show active',
                'dashboard' => '',
                'pegawai' => '',
                'jabatan' => '',
                'pengaturan_absen' => '',
                'absensi' => '',
                'gaji' => 'current-page'
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
    
            $data['detail_absensi'] = $this->AbsenDetailModel->riwayatAbsen($id_pegawai);
            $data['pegawai'] = $this->PegawaiModel->getById($id_pegawai);
            $data['admin'] = $this->AdminModel->asObject()->first();
    
            return view('admin/gaji/detail-kehadiran', $data);
    }

    public function cekDetail ($id_pegawai)
    {
        if (session()->get('role') != 1) {
            return redirect()->to('auth');
        }

        $data['menu'] = [
            'tab_home' => '',
            'tab_master' => 'show active',
            'dashboard' => '',
            'pegawai' => '',
            'jabatan' => '',
            'pengaturan_absen' => '',
            'absensi' => '',
            'gaji' => 'current-page'
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

        $data['gaji'] = $this->GajiModel->findByPegawaiId($id_pegawai);
        $data['pegawai'] = $this->PegawaiModel->getById($id_pegawai);
        $data['admin'] = $this->AdminModel->asObject()->first();

        return view('admin/gaji/cek-detail', $data);
}

}
