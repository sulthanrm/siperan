<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIPERAN</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/siperan">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIPERAN</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @can('akses_admin', \App\Models\User::class)
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/pengajuan">
                <span>Rekapan Data Penerima</span></a>
            </li>
            @endcan

            @can('akses_member', \App\Models\User::class)
            <li class="nav-item active">
                <a class="nav-link" href="/pengajuan/member">
                <span>Informasi Bantuan Anda</span></a>
            </li>
            @endcan

            <hr class="sidebar-divider">

            @can('akses_admin', \App\Models\User::class)
            <div class="sidebar-heading">
                Data Pengguna
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/sortbytanggal" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Urutkan penerima berdasarkan tanggal verifikasi</span>
                </a>
                <a class="nav-link collapsed" href="/siperan-delete" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Hapus semua data penerima</span>
                </a>
            </li>
            @endcan
            <!-- Divider -->

            <!-- Heading -->
            @can('akses_member', \App\Models\User::class)
            <div class="sidebar-heading">
                Fitur Pengguna
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/formuser" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Informasi Profil Penerima</span>
                </a>
            </li>
            @endcan

            <!-- Heading -->
            <div class="sidebar-heading">
                Aksi
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/logout" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Logout</span>
                </a>
            </li>
            <hr class="sidebar-divider">
        </ul>

        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

        <div class="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>

                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                @yield('profile')
            </ul>
        </nav>
    </div>

    @yield('content')

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
