<?= $this->extend('layout/pegawai'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-pegawai'); ?>
<?= session()->getFlashdata('pesan'); ?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <?php if ($absensi->absen_masuk == null) : ?>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Absen Masuk</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <?= session()->getFlashdata('jarak'); ?>
                            <center>
                                <div id="my_camera"></div>
                            </center>
                            <button type="button" class="user-bg-color btn btn-secondary mt-2" onclick="take_picture();">Ambil
                                Gambar</button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Hasil Gambar</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form class="myForm text-center" action="<?= base_url('pegawai/absen_masuk'); ?>" method="POST" enctype="multipart/form-data">
                                <center>
                                    <p>Jarak Sekarang <br><strong><span id="jarak-sekarang"></span></strong> Meter Dari
                                        Kantor
                                    </p>
                                    <input type="hidden" name="latitude">
                                    <input type="hidden" name="longitude">
                                    <input type="hidden" name="image_tag" class="image-tag">
                                    <input type="hidden" name="kode_absensi" value="<?= $absensi->kode_absensi; ?>">
                                    <div id="result"></div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($absensi->absen_masuk != null) : ?>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Absen Pulang</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <?php if (strtotime(date('H:i', time())) >= strtotime($jabatan->jam_keluar)) : ?>
                                <?= session()->getFlashdata('jarak'); ?>
                                <center>
                                    <div id="my_camera"></div>
                                </center>
                                <button type="button" class="user-bg-color btn btn-secondary mt-2" onclick="take_picture();">Ambil Gambar</button>
                            <?php else : ?>
                                <div class="alert text-white bg-danger">Belum saatnya absen pulang</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Hasil Gambar</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form class="myForm text-center" action="<?= base_url('pegawai/absen_pulang'); ?>" method="POST" enctype="multipart/form-data">
                                <center>
                                    <p>Jarak Sekarang <br><strong><span id="jarak-sekarang"></span></strong> Meter Dari
                                        Kantor
                                    </p>
                                    <input type="hidden" name="latitude">
                                    <input type="hidden" name="longitude">
                                    <input type="hidden" name="image_tag" class="image-tag">
                                    <input type="hidden" name="kode_absensi" value="<?= $absensi->kode_absensi; ?>">
                                    <div id="result"></div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function distance(lat1, lon1, lat2, lon2, unit) {
        if ((lat1 == lat2) && (lon1 == lon2)) {
            return 0;
        } else {
            var radlat1 = Math.PI * lat1 / 180;
            var radlat2 = Math.PI * lat2 / 180;
            var theta = lon1 - lon2;
            var radtheta = Math.PI * theta / 180;
            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
            if (dist > 1) {
                dist = 1;
            }
            dist = Math.acos(dist);
            dist = dist * 180 / Math.PI;
            dist = dist * 60 * 1.1515;
            if (unit == "K") {
                dist = dist * 1.609344
            }
            if (unit == "N") {
                dist = dist * 0.8684
            }
            return dist;
        }
    }
    <?php if ($absensi->absen_masuk == null) : ?>
        Webcam.set({
            width: 220,
            height: 300,
            flip_horiz: true,
            image_format: 'png',
            png_quality: 100
        });
        Webcam.attach('#my_camera');

        function take_picture() {
            Webcam.snap(function(data_url) {
                $('.image-tag').val(data_url);

                var tag_img = '<img src="' + data_url + '"/><br><button type="submit" class="user-bg-color btn btn-secondary stripes-btn mt-2">Kirim Absen</button>';
                $('#result').html(tag_img);
            });

        }

        setInterval(() => {
            getLocation();
        }, 1000);

        setInterval(() => {
            var lat_2 = $('input[name=latitude]').val();
            var long_2 = $('input[name=longitude]').val();
            var hasil_jarak_km = distance(<?= $pengaturan->latitude ?>, <?= $pengaturan->longitude ?>, lat_2, long_2, 'K');
            var hasil_jarak_meter = hasil_jarak_km * 1000;
            var hasil_jarak_meter_bulat = Math.round(hasil_jarak_meter);
            $('#jarak-sekarang').html(hasil_jarak_meter_bulat);
        }, 1000);

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
        }

        function showPosition(position) {
            document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    // alert("You Must Allow The Request For Geolocation To Fill Out The Form");
                    Swal.fire(
                        'Error!',
                        'Kamu harus mengizinkan Akses Lokasi!',
                        'error'
                    )
                    break;
            }
        }
    <?php endif; ?>

    <?php if ($absensi->absen_masuk != null) : ?>
        <?php if (strtotime(date('H:i', time())) >= strtotime($jabatan->jam_keluar)) : ?>
            Webcam.set({
                width: 220,
                height: 300,
                flip_horiz: true,
                image_format: 'png',
                png_quality: 100
            });
            Webcam.attach('#my_camera');

            function take_picture() {
                Webcam.snap(function(data_url) {
                    $('.image-tag').val(data_url);

                    var tag_img = '<img src="' + data_url + '"/><br><button type="submit" class="user-bg-color btn btn-secondary stripes-btn mt-2">Kirim Absen</button>';
                    $('#result').html(tag_img);
                });

            }

            setInterval(() => {
                getLocation();
            }, 1000);

            setInterval(() => {
                var lat_2 = $('input[name=latitude]').val();
                var long_2 = $('input[name=longitude]').val();
                var hasil_jarak_km = distance(<?= $pengaturan->latitude ?>, <?= $pengaturan->longitude ?>, lat_2, long_2, 'K');
                var hasil_jarak_meter = hasil_jarak_km * 1000;
                var hasil_jarak_meter_bulat = Math.round(hasil_jarak_meter);
                $('#jarak-sekarang').html(hasil_jarak_meter_bulat);
            }, 1000);

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                }
            }

            function showPosition(position) {
                document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude;
                document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
            }

            function showError(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        // alert("You Must Allow The Request For Geolocation To Fill Out The Form");
                        Swal.fire(
                            'Error!',
                            'Kamu harus mengizinkan Akses Lokasi!',
                            'error'
                        )
                        break;
                }
            }
        <?php endif; ?>
    <?php endif; ?>
</script>

<?= $this->endSection(); ?>