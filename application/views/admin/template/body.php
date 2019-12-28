<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/template/header'); ?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?= base_url()?>admin">
                            <img src="<?=base_url()?>assets_admin/images/icon/logo-min.png" alt="CoolAdmin"/>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="<?= base_url()?>admin">
                                <li class="<?= $aktif=='admin' ? 'active' : ''  ?>">
                                <i class="fas fa-tachometer-alt"></i><B>BERANDA</B></a>
                        </li>
                         <li class="<?= $aktif=='kategori' ? 'active' : ''  ?>">
                            <a href="<?=base_url()?>kategori">
                                <i class="far fa-check-square"></i>Kelola Kategori Berita</a>
                        </li>
                        <li class="<?= $aktif=='berita' ? 'active' : ''  ?>">
                            <a href="<?=base_url()?>berita">
                                <i class="far fa-check-square"></i>Kelola Berita</a>
                        </li>
                        <li class="<?= $aktif=='admin_dosen' ? 'active' : ''  ?>">
                            <a href="<?= base_url()?>admin_dosen">
                                <i class="fas fa-dollar-sign"></i>Kelola Akun Dosen</a>
                        </li>
                        <li class="<?= $aktif=='admin_materi' ? 'active' : ''  ?>">
                            <a href="<?= base_url()?>admin_materi">
                                <i class="fas fa-save"></i>Kelola Materi</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?= base_url()?>admin">
                    <img src="<?=base_url()?>assets_admin/images/icon/logo-min.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="<?= base_url()?>admin">
                                <li class="<?= $aktif=='admin' ? 'active' : ''  ?>">
                                <i class="fas fa-tachometer-alt"></i><B>BERANDA</B></a>
                        </li>
                         <li class="<?= $aktif=='kategori' ? 'active' : ''  ?>">
                            <a href="<?=base_url()?>kategori">
                                <i class="fas fa-file"></i>Kelola Kategori Berita</a>
                        </li>
                        <li class="<?= $aktif=='berita' ? 'active' : ''  ?>">
                            <a href="<?=base_url()?>berita">
                                <i class="fas fa-folder"></i>Kelola Berita</a>
                        </li>
                        <li class="<?= $aktif=='admin_dosen' ? 'active' : ''  ?>">
                            <a href="<?=base_url()?>admin_dosen">
                                <i class="fas fa-user"></i>Kelola Akun Dosen</a>
                        </li>
                        <li class="<?= $aktif=='admin_materi' ? 'active' : ''  ?>">
                            <a href="<?=base_url()?>admin_materi">
                                <i class="fas fa-folder-open"></i>Kelola Materi</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                       
                            <div class="header-button">
                               <!--  <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Cetak Laporan</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a target="_blank" href="#">
                                                        <i class="zmdi zmdi-print"></i>Pengeluaran</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a target="_blank" href="#">
                                                        <i class="zmdi zmdi-print"></i>Sapi Perah</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a target="_blank" href="#">
                                                        <i class="zmdi zmdi-print"></i>Pegawai</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a target="_blank" href="#">
                                                    <i class="zmdi zmdi-print"></i>Susu</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a target="_blank" href="#">
                                                        <i class="zmdi zmdi-print"></i>Agen</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-print"></i>Distribusi</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><i class="fas fa-user-circle fa-fw"></i>Administrator</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?= base_url()?>admin">
                                                        <i class="zmdi zmdi-account"></i>Pengaturan Akun</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url() ?>login/logout_a">
                                                    <i class="zmdi zmdi-power"></i>Keluar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                 <?php $this->load->view($content); ?>
            </div>                           
    <?php $this->load->view('admin/template/footer'); ?>
</body>
</html>
<!-- end document-->
