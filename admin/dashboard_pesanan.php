<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Halaman dashboard pesanan</title>
        <link href="dist/css/style.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="main-wrapper">
            <header class="topbar" data-navbarbg="skin5">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-header" data-logobg="skin5">
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                            <a class="navbar-brand" href="index.html">
                                <b class="logo-icon p-l-10">
                                    <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                               </b>
                                <span class="logo-text">
                                    <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                                </span>
                            </a>
                            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                        </a>    
                    </div>
                </nav>
            </header>
            <aside class="left-sidebar" data-sidebarbg="skin5">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav" class="p-t-30">
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard_user.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">User</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard_barang.php" aria-expanded="false"><i class="mdi mdi-briefcase"></i><span class="hide-menu">Barang</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard_pesanan.php" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Pesanan</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Akun</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Pesanan</h4>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem tenetur voluptatibus veritatis dolores reprehenderit modi, odit sed! Nihil delectus ut error vero. Corporis id quos repellat aliquam perferendis quasi vitae?</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer text-center">
                    All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
                </footer>
            </div>
        </div> 
        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="assets/extra-libs/sparkline/sparkline.js"></script>
        <script src="dist/js/waves.js"></script>
        <script src="dist/js/sidebarmenu.js"></script>
        <script src="dist/js/custom.min.js"></script>
        <script src="assets/libs/flot/excanvas.js"></script>
        <script src="assets/libs/flot/jquery.flot.js"></script>
        <script src="assets/libs/flot/jquery.flot.pie.js"></script>
        <script src="assets/libs/flot/jquery.flot.time.js"></script>
        <script src="assets/libs/flot/jquery.flot.stack.js"></script>
        <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
        <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="dist/js/pages/chart/chart-page-init.js"></script> 
    </body>
</html>