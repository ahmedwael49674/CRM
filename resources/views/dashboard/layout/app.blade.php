<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{config('app.direction')}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('dashboard_assets/assets/images/favicon.png') }}">
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{ url('dashboard_assets/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard_assets/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard_assets/assets/libs/morris.js/morris.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('dashboard_assets/dist/css/style.min.css') }}" rel="stylesheet">

    <link href="{{ url('dashboard_assets/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard_assets/assets/libs/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ url('dashboard_assets/assets/images/logo-icon.png') }}" alt="homepage"
                                class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{ url('dashboard_assets/assets/images/logo-light-icon.png') }}" alt="homepage"
                                class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ url('dashboard_assets/assets/images/logo-text.png') }}" alt="homepage"
                                class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{ url('dashboard_assets/assets/images/logo-light-text.png') }}"
                                class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="/lang/en/ltr">
                                <img src="{{ url('dashboard_assets/assets/images/EN.png') }}"
                                    style="max-width: 25px;" alt="homepage" />
                                EN</i>
                            </a>

                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="/lang/ar/rtl">
                                <img src="{{ url('dashboard_assets/assets/images/AR.png') }}"
                                    style="max-width: 25px;" alt="homepage" />
                                AR</i>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ url('dashboard_assets/default.png') }}" alt="user" class="rounded-circle"
                                    width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="{{ url('dashboard_assets/default.png') }}" alt="user"
                                            class="img-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ auth()->user()->name }}</h4>
                                        <p class=" m-b-0">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="logout()">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> {{__('common.logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('dashboard.layout.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            @yield('content')
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ url('dashboard_assets/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url('dashboard_assets/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ url('dashboard_assets/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ url('dashboard_assets/dist/js/app.min.js') }}"></script>
    <script src="{{ url('dashboard_assets/dist/js/app.init.js') }}"></script>
    <script src="{{ url('dashboard_assets/dist/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ url('dashboard_assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}">
    </script>
    <script src="{{ url('dashboard_assets/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ url('dashboard_assets/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ url('dashboard_assets/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('dashboard_assets/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->

    <script src="{{ url('dashboard_assets/assets/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('dashboard_assets/assets/libs/sweetalert2/sweet-alert.init.js') }}"></script>

    <script src="{{ url('dashboard_assets/assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ url('dashboard_assets/assets/extra-libs/toastr/toastr-init.js') }}"></script>

    @include('dashboard.layout.custom-js')

    @yield('js')

</body>

</html>