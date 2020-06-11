<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SNEKTI | <?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Favicon-->
	<link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/images/faviconS.png" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets2/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets2/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Sweet Alert 2 -->
    <script src="<?= base_url(); ?>assets2/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- Main CSS -->
    <?php foreach($file_css as $css) : ?>
    <link rel="stylesheet" href="<?= base_url() . $css; ?>">
    <?php endforeach; ?>
    <style>
        .zoom:hover {
            transform: scale(1.8);
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                        <i class="fas fa-sign-out-alt"><span> Logout</span></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('admin'); ?>" class="brand-link">
                <img src="<?= base_url(); ?>assets/images/faviconS.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SNEKTI</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url();?>assets2/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->session->userdata('f_name') . " " . $this->session->userdata('l_name'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin'); ?>" class="nav-link <?= $title == 'Dashboard' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?= $title == 'Seminar Nasional' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $title == 'Seminar Nasional' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Seminar Nasional
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/semnas/peserta'); ?>" class="nav-link <?= $c_title == 'Data Peserta Seminar Nasional' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Peserta</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/semnas/pembayaran'); ?>" class="nav-link <?= $c_title == 'Data Pembayaran Seminar Nasional' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pembayaran</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?= $title == 'Call For Paper' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $title == 'Call For Paper' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>
                                    Call For Paper
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/callforpaper/peserta'); ?>" class="nav-link <?= $c_title == 'Data Tim Call For Paper' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Peserta</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?= $title == 'Pemakalah PkM' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $title == 'Pemakalah PkM' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>
                                    PkM
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/p2m/peserta'); ?>" class="nav-link <?= $c_title == 'Data Tim Call For Paper' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Peserta</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if($this->session->userdata('level') == 1) : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/users'); ?>" class="nav-link <?= $title == 'Manajemen User' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Manajamen User
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/materi'); ?>" class="nav-link <?= $title == 'Materi Pembicara' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-file-upload"></i>
                                <p>
                                    Upload Materi
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>