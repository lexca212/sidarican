<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-dark">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- /.navbar -->

            <!-- Left navbar links -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="<?= base_url('login/logout') ?>">
                       <i class="fa fa-power-off"></i>
                    </a>

                </li>
            </ul>

        </nav>
        <!-- <h4>
            <marquee behavior="" direction="left">Semangat Sayang</marquee>
        </h4> -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?= base_url('assets/template/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIDARMINI</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/template/') ?>dist/img/logos.png"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url('rubah/edit')?>" class="d-block"><?= $user ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('dashboard') ?>" class="nav-link inactive">
                                        <i class="nav-icon fa fa-home"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('perjalanan/data') ?>" class="nav-link inactive">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p>Perjalanan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pembelianbbm') ?>" class="nav-link inactive">
                                        <i class="fa fa-user nav-icon"></i>
                                        <p>Pembelian BBM</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('surat') ?>" class="nav-link inactive">
                                        <i class="fa fa-inbox nav-icon"></i>
                                        <p>Data Service Kendaraan</p>
                                    </a>
                                </li>
                                <hr>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-eye"></i>
                                        <p>
                                            Master Data
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= base_url('admin/masterbbm'); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>BBM Kendaraan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('cctv/pantauan')?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Pantauan CCTV</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?= base_url('mutasi') ?>" class="nav-link inactive">
                                        <i class="fa fa-book nav-icon"></i>
                                        <p>Mutasi</p>
                                    </a>
                                </li>
                                <?php if ($this->session->userdata('level') == 'koordinator'): ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url('admin/users') ?>" class="nav-link inactive">
                                            <i class="fa fa-user-secret nav-icon"></i>
                                            <p>Anggota</p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">title</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">