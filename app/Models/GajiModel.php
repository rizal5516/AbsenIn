<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $table            = 'gaji';
    protected $primaryKey       = 'id';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pegawai_id',
        'upah',
        'denda',
        'bonus_siswa',
        'bonus_absen',
        'bulan',
        'jumlah_jam_kerja',
        'jumlah_denda',
        'jumlah_bonus_siswa',
        'jumlah_bonus_absen',
        'total_upah',
        'total_denda',
        'total_bonus_siswa',
        'total_bonus_absen',
        'gaji_bersih'
    ];

    public function findByPegawaiId($pegawaiId)
    {
        $date = date('Y-m-01');
        return $this
            ->where('pegawai_id', $pegawaiId)
            ->where('bulan <', $date)
            ->get()->getResultObject();
    }

    public function findThisMonth($pegawaiId)
    {
        $date = date('Y-m-01');
        return $this
            ->where('pegawai_id', $pegawaiId)
            ->where('bulan >=', $date)
            ->get()->getRowObject();
    }

    public function findById($id)
    {
        return $this
            ->where('id', $id)
            ->get()->getRowObject();
    }
}
