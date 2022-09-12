<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>@yield('page_title')</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/admin/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="/assets/admin/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="/assets/admin/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    @yield('css')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="#">
                    <span class="brand">Teknik
                        <span class="ml-2 brand-tip">Servis</span>
                    </span>
                    <span class="brand-mini">TS</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="{{ asset('assets/admin/img/admin-avatar.png') }}" />
                            <span></span>{{ Auth::user()->name }} {{ Auth::user()->surname }}<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- <li class="dropdown-divider"></li> --}}
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i>Oturumu Kapat</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img class="rounded-circle" src="{{ asset('assets/admin/img/admin-avatar.png') }}" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">{{ Auth::user()->name }} {{ Auth::user()->surname }}</div><small>Yetkili</small>
                    </div>
                </div>
                <ul class="side-menu metismenu">
                    <li class="heading">MENU</li>
                    <li>
                        <a href="/admin"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">İstatistikler</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                            <span class="nav-label">Müşteri İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{ route('admin.customer.index') }}">Müşteri Listesi</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.customer.new') }}">Yeni Müşteri</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-desktop"></i>
                            <span class="nav-label">Cihaz İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{ route('admin.device.index') }}">Cihaz Listesi</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.device.select_customer') }}">Yeni Cihaz</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <div class="page-content fade-in-up">
                <!-- START PAGE CONTENT-->
                @yield('content')
                <!-- END PAGE CONTENT-->
            </div>
        </div>
        <!-- BEGIN PAGA BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
        <div class="preloader-backdrop">
            <div class="page-preloader">Yükleniyor</div>
        </div>
        <!-- END PAGA BACKDROPS-->
        <!-- CORE PLUGINS -->
        <script src="/assets/admin/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="/assets/admin/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
        <script src="/assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/assets/admin/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
        <script src="/assets/admin/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- PAGE LEVEL PLUGINS-->
        @yield('js')
        <!-- CORE SCRIPTS-->
        <script src="/assets/admin/js/app.min.js" type="text/javascript"></script>
</body>

</html>
