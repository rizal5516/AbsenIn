<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran Gaji</title>

    <style>
        .container {
            width: 600px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            width: 100px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .content {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        /* Setiap tr memiliki warna yang berbeda */
        tr:nth-child(even) {
            background-color: #f0f0f0;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="text-align:center">
            <h3> <?= $title_pdf; ?></h3>
        </div>
        <div class="content">
            <table>
                <tr>
                    <td scope="row">Nama :</td>
                    <td><?= $pegawai->nama_pegawai; ?></td>
                </tr>
                <tr>
                    <td scope="row">NIP :</td>
                    <td><?= $pegawai->nip; ?></td>
                </tr>
                <tr>
                    <td scope="row">Jabatan :</td>
                    <td><?= $pegawai->nama_jabatan; ?></td>
                </tr>
                <tr>
                    <td scope="row">Gaji Pokok :</td>
                    <td><?= "Rp. " . number_format($pegawai->gaji_pokok, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Tunjangan :</td>
                    <td><?= "Rp. " . number_format($jabatan->tunjangan, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Upah Per Jam :</td>
                    <td><?= "Rp. " . number_format($gaji->upah, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Denda Absen :</td>
                    <td><?= "Rp. " . number_format($gaji->denda, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Bnous Siswa :</td>
                    <td><?= "Rp. " . number_format($gaji->bonus_siswa, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Bonus Absen :</td>
                    <td><?= "Rp. " . number_format($gaji->bonus_absen, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Bulan :</td>
                    <td><?= date('F Y', strtotime("-1 months", strtotime($gaji->bulan))); ?></td>
                </tr>
                <tr>
                    <td scope="row">Jumlah Jam Kerja :</td>
                    <td><?= floor($gaji->jumlah_jam_kerja / 60); ?> Jam</td>
                </tr>
                <tr>
                    <td scope="row">Jumlah Denda :</td>
                    <td><?= $gaji->jumlah_denda; ?></td>
                </tr>
                <tr>
                    <td scope="row">Jumlah Bonus Siswa :</td>
                    <td><?= $gaji->jumlah_bonus_siswa; ?></td>
                </tr>
                <tr>
                    <td scope="row">Jumlah Bonus Absen :</td>
                    <td><?= $gaji->jumlah_bonus_absen; ?></td>
                </tr>
                <tr>
                    <td scope="row">Total Upah :</td>
                    <td><?= "Rp. " . number_format($gaji->total_upah, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Total Denda :</td>
                    <td><?= "Rp. " . number_format($gaji->total_denda, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Total Bonus Siswa :</td>
                    <td><?= "Rp. " . number_format($gaji->total_bonus_siswa, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Total Bonus Absen :</td>
                    <td><?= "Rp. " . number_format($gaji->total_bonus_absen, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td scope="row">Gaji Bersih :</td>
                    <td><?= "Rp. " . number_format($gaji->gaji_bersih, 0, ',', '.'); ?></td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Terima kasih atas kerja keras Anda.</p>
        </div>
    </div>
</body>

</html>