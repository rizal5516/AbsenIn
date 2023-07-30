<?= $this->extend('layout/admin') ;?>
<?= $this->section('content') ;?>
<?= $this->include('layout/sidebar-admin') ;?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card py-4">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Setting Absen & Gaji</h4>
                            <p class="card-title mt-2 text-muted">Atur Jadwal Jam Masuk & Jam Keluar</p>
                            <p class="card-title text-muted">Atur Lokasi Kantor</p>
                            <p class="card-title text-muted">Atur Upah per Jam</p>
                            <p class="card-title text-muted">Atur Bonus Siswa dan Absen</p>
                            <p class="card-title text-muted">Atur Denda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <form action="<?= base_url('admin/setting_absen_'); ?>" method="POST">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Jam Masuk</label>
                                    <input class="form-control" type="hidden" name="id_pengaturan_absen"
                                        value="<?= $pengaturan->id_pengaturan_absen; ?>">
                                    <input class="form-control" type="time" name="jam_masuk"
                                        value="<?= $pengaturan->jam_masuk; ?>">
                                    <p class="text-muted font-size-12">Jam Masuk Kerja</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault02">Jam Keluar</label>
                                    <input class="form-control" type="time" name="jam_keluar"
                                        value="<?= $pengaturan->jam_keluar; ?>">
                                    <p class="text-muted font-size-12">Jam Pulang Kerja</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Garis Lintang Bujur</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" aria-describedby="inputGroupPrepend2"
                                            name="latitude_longitude"
                                            value="<?= $pengaturan->latitude; ?>, <?= $pengaturan->longitude; ?>">
                                    </div>
                                    <p class="text-muted font-size-12">Latitude Longitude / Garis Lintang - Bujur</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Batas Jarak</label>
                                    <input class="form-control" type="text" name="batas_jarak"
                                        value="<?= $pengaturan->batas_jarak; ?>">
                                    <p class="text-muted font-size-12">jarak tersimpan dalam satuan Meter</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Upah</label>
                                    <input type="number" class="form-control" name="upah"
                                        value="<?= $pengaturan->upah; ?>">
                                    <p class="text-muted font-size-12">Upah per Jam</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Denda</label>
                                    <input type="number" class="form-control" name="denda"
                                        value="<?= $pengaturan->denda; ?>">
                                    <p class="text-muted font-size-12">Denda Terlambat</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Bonus Siswa</label>
                                    <input type="number" class="form-control" name="bonus_siswa"
                                        value="<?= $pengaturan->bonus_siswa; ?>">
                                    <p class="text-muted font-size-12">Bonus per Siswa</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Bonus Absen</label>
                                    <input type="number" class="form-control" name="bonus_absen"
                                        value="<?= $pengaturan->bonus_absen; ?>">
                                    <p class="text-muted font-size-12">Bonus Tepat Waktu</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn user-bg-color text-white" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Lokasi</h4>
                        </div>
                    </div>
                    <div class="card" style="height: 400px;">
                        <div class="card-body">
                            <iframe style="width: 100%; height: 95%;" class="w-100"
                                src="https://www.google.com/maps?q=<?= $pengaturan->latitude; ?>,<?= $pengaturan->longitude; ?>&hl=es;z=14&output=embed"
                                frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Jadwal Absen</h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn user-bg-color stripes-btn text-white" style="width: 100%;">
                                Jam Masuk <?= $pengaturan->jam_masuk; ?></button>
                            <button type="button" class="btn user-bg-color stripes-btn mt-3 text-white"
                                style="width: 100%;"> Jam Keluar <?= $pengaturan->jam_keluar; ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ;?>