<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table            = 'jabatan';
    protected $primaryKey       = 'id_jabatan';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_jabatan', 'gaji_pokok', 'tunjangan', 'jam_masuk', 'jam_keluar',];

    public function findById($id){
        return $this
            ->where('id_jabatan', $id)
            ->get()->getRowObject();
    }
}
