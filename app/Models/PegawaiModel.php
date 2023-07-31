<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $protectFields    = true;
    protected $allowedFields    = ['nip', 'nama_pegawai', 'jenis_kelamin', 'jabatan', 'email', 'password', 'gambar', 'is_active', 'role'];

    public function getAll()
    {
        return $this
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->get()->getResultObject();
    }

    public function getByNip($nip)
    {
        return $this
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->where('pegawai.nip', $nip)
            ->get()->getRowObject();
    }

    public function getById($id)
    {
        return $this
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->where('pegawai.id_pegawai', $id)
            ->get()->getRowObject();
    }

    public function getActivePegawai()
    {
        return $this
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->where('pegawai.is_active', '1')
            ->get()->getResultObject();
    }

    public function getByEmail($email)
    {
        return $this
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->where('pegawai.email', $email)
            ->get()->getRowObject();
    }

}
