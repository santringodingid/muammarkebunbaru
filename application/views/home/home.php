<?php $this->load->view('partials/header'); ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content p-3">
        <div class="row">
            <div class="col-12 text-center text-success" id="demo">
                <div class="col-12 row mb-2 justify-content-center">
                    <h6 class="text-center">Road to MUAMMAR </h6>
                </div>
                <div class="col-12 row justify-content-center">
                    <div class="box-timer text-center mr-3">
                        <h2 class="mb-0 text-success" id="day">-</h2>
                        <span>Hari</span>
                    </div>
                    <div class="box-timer text-center mr-3">
                        <h2 class="mb-0 text-success" id="hour">-</h2>
                        <span>Jam</span>
                    </div>
                    <div class="box-timer text-center mr-3">
                        <h2 class="mb-0 text-success" id="minute">-</h2>
                        <span>Menit</span>
                    </div>
                    <div class="box-timer text-center">
                        <h2 class="mb-0 text-success" id="second">-</h2>
                        <span>Detik</span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div id="participants"></div>
        <div class="row">
            <?php if ($this->session->userdata('role') == 'MMU') { ?>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="callout callout-success">
                        <h6>
                            Nomor urut tampil MMU Anda adalah <b class="text-success"><?= $undian ?></b>
                        </h6>
                        <p>
                            Pada pelaksanaan, urut tampil disesuaikan dengan jumlah peserta.
                            <br>Anda bisa cek urut tampil <i>real</i> <a class="text-success" href="<?= base_url() ?>perfome">di sini</a>
                        </p>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="callout callout-warning">
                    <h6>Langkah Aman</h6>
                    <p>
                        Agar data lebih aman, ubah username dan password secara berkala
                        <a class="text-success" href="<?= base_url() ?>profile">di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('home/js-home'); ?>