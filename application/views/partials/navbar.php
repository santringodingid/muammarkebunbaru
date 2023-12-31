<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link"><b>Tahun Periode : 1444-1445 H</b></a>

        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link"><b><?= dateHijriFormat(getHijri()) ?> H</b></a>

        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <b class="text-dark align-middle"><?= $this->session->userdata('name') ?></b>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?= $this->session->userdata('role') ?></span>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>profile" class="dropdown-item">
                    <i class="fas fa-user-circle mr-2"></i> Lihat Akun
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>auth/logout" class="dropdown-item tombollogout">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <div class="dropdown-divider"></div>
            </div>
        </li>
    </ul>
</nav>