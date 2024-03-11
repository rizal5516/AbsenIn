<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenDetailModel extends Model
{
    protected $table            = 'detail_absensi';
    protected $primaryKey       = 'id_detail_absensi';
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_absensi', 'pegawai', 'jabatan', 'absen_masuk', 'status_masuk', 'latitude_masuk', 'longitude_masuk', 'absen_keluar', 'status_keluar', 'latitude_keluar', 'longitude_keluar', 'izin', 'status_izin', 'alasan', 'bukti_izin', 'bukti_masuk', 'bukti_keluar'];

    public function getAllByKodeAbsen($kode_absen)
    {
        return $this
            ->join('pegawai', 'pegawai.id_pegawai=detail_absensi.pegawai')
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->where('detail_absensi.kode_absensi', $kode_absen)
            ->get()->getResultObject();
    }

    public function riwayatAbsen($id_pegawai, $month = NULL, $year = NULL)
    {
        $riwayat = $this
            ->join('pegawai', 'pegawai.id_pegawai=detail_absensi.pegawai')
            ->join('absensi', 'absensi.kode_absensi=detail_absensi.kode_absensi')
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->where('detail_absensi.pegawai', $id_pegawai);
        if (!is_null($month) && !is_null($year))
            $riwayat = $riwayat->where('MONTH(FROM_UNIXTIME(`absen_masuk`))', $month)
                ->where('YEAR(FROM_UNIXTIME(`absen_masuk`))', $year);
        return $riwayat
            ->orderBy('detail_absensi.id_detail_absensi', 'ASC')
            ->get()->getResultObject();
    }

    public function riwayatBulan($id_pegawai, $month = NULL, $year = NULL)
    {
        $riwayats = $this
            ->join('pegawai', 'pegawai.id_pegawai=detail_absensi.pegawai')
            ->join('absensi', 'absensi.kode_absensi=detail_absensi.kode_absensi')
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->where('detail_absensi.pegawai', $id_pegawai);

        if (!is_null($month) && !is_null($year)) {
            $riwayats = $riwayats
                ->where('MONTH(FROM_UNIXTIME(`absen_masuk`))', $month)
                ->where('YEAR(FROM_UNIXTIME(`absen_masuk`))', $year);
        }

        $riwayats = $riwayats
            ->select('DISTINCT SUBSTRING(tgl_absen, 4, 3) as bulanSaja, SUBSTRING(tgl_absen, 8, 4) as tahunSaja')
            ->groupBy('pegawai.id_pegawai, bulanSaja, tahunSaja')
            ->select('COALESCE(COUNT(CASE WHEN detail_absensi.status_masuk = 0 THEN 1 END), 0) as onTimeIn')
            ->select('COALESCE(COUNT(CASE WHEN detail_absensi.status_masuk = 1 THEN 1 END), 0) as lateTimeIn')
            ->select('COALESCE(COUNT(CASE WHEN detail_absensi.status_keluar = 0 THEN 1 END), 0) as onTimeOut')
            ->select('COALESCE(SUM(CASE WHEN detail_absensi.absen_keluar != 0 AND detail_absensi.status_keluar IS NULL OR detail_absensi.status_keluar = 0 THEN detail_absensi.absen_keluar - detail_absensi.absen_masuk ELSE 0 END), 0) as totalJamKerja')
            ->get()
            ->getResultObject();

        return $riwayats;
    }

    public function getByKodeAndIdPegawai($kode_absen, $id_pegawai)
    {
        return $this
            ->join('pegawai', 'pegawai.id_pegawai=detail_absensi.pegawai')
            ->join('absensi', 'absensi.kode_absensi=detail_absensi.kode_absensi')
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->where('detail_absensi.kode_absensi', $kode_absen)
            ->where('detail_absensi.pegawai', $id_pegawai)
            ->get()->getRowObject();
    }

    public function getByArrayKodeAndIdPegawai($kode_absens, $id_pegawai)
    {
        return $this
            ->whereIn('kode_absensi', $kode_absens)
            ->where('pegawai', $id_pegawai)
            ->where('absen_masuk !=', null)
            ->join('pegawai', 'pegawai.id_pegawai=detail_absensi.pegawai')
            ->join('jabatan', 'jabatan.id_jabatan=pegawai.jabatan')
            ->get()->getResultObject();
    }
}
