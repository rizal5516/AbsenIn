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
                        <form>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Jam Masuk</label>
                                    <input type="time" class="form-control" id="validationDefault01" required>
                                    <p class="text-muted font-size-12">Jam Masuk Kerja</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault02">Jam Keluar</label>
                                    <input type="time" class="form-control" id="validationDefault02" required>
                                    <p class="text-muted font-size-12">Jam Pulang Kerja</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefaultUsername">Garis Lintang Bujur</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="validationDefaultUsername"
                                            aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                    <p class="text-muted font-size-12">Latitude Longitude / Garis Lintang - Bujur</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Batas Jarak</label>
                                    <input type="number" class="form-control" id="validationDefault03" required>
                                    <p class="text-muted font-size-12">jarak tersimpan dalam satuan Meter</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Upah</label>
                                    <input type="number" class="form-control" id="validationDefault03" required>
                                    <p class="text-muted font-size-12">Upah per Jam</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Denda</label>
                                    <input type="number" class="form-control" id="validationDefault03" required>
                                    <p class="text-muted font-size-12">Denda Terlambat</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Bonus Siswa</label>
                                    <input type="number" class="form-control" id="validationDefault03" required>
                                    <p class="text-muted font-size-12">Bonus per Siswa</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Bonus Absen</label>
                                    <input type="number" class="form-control" id="validationDefault03" required>
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
                            <iframe style="width: 100%; height: 95%;" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d170410.
                            75606658432!2d16.97583486545303!3d48.13592437338002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1
                            !3m3!1m2!1s0x476c89360aca6197%3A0x631f9b82fd884368!2sBratislava%2C%20Slovakia!5e0!3m2!1sen!2sbg!4v1602852055483
                            !5m2!1sen!2sbg" frameborder="0"></iframe>
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
                                Jam Masuk 07:00</button>
                            <button type="button" class="btn user-bg-color stripes-btn mt-3 text-white"
                                style="width: 100%;"> Jam Keluar 12:00</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ;?>