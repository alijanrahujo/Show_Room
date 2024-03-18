<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/lightpick/lightpick.css') }}" rel="stylesheet" />

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @yield('style')
    @livewireStyles
</head>

<body>

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ route('dashboard') }}" class="logo">
                <span>
                    <img src="{{ asset('assets/images/honda-logo2.png') }}" style="width: 190px; height: auto;"
                        alt="logo-small" class="logo-sm">
                </span>
                <span>
                    <img src="{{ asset('assets/images/honda-logo2.png') }}" style="width: 190px; height: auto;"
                        alt="logo-large" class="logo-lg logo-light">
                    <!-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg"> -->
                </span>
            </a>
        </div>
        <!--end logo-->
        <!-- Navbar -->
        <nav class="navbar-custom">
            <ul class="list-unstyled topbar-nav float-right mb-0">
                <li class="hidden-sm">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                        href="javascript: void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        English <img src="{{ asset('assets/images/flags/us_flag.jpg') }}" class="ml-2" height="16"
                            alt="" /> <i class="mdi mdi-chevron-down"></i>
                    </a>
                    {{-- <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript: void(0);"><span> German </span><img
                                src="{{ asset('assets/images/flags/germany_flag.jpg') }}" alt=""
                                class="ml-2 float-right" height="14" /></a>
                        <a class="dropdown-item" href="javascript: void(0);"><span> Italian </span><img
                                src="{{ asset('assets/images/flags/italy_flag.jpg') }}" alt=""
                                class="ml-2 float-right" height="14" /></a>
                        <a class="dropdown-item" href="javascript: void(0);"><span> French </span><img
                                src="{{ asset('assets/images/flags/french_flag.jpg') }}" alt=""
                                class="ml-2 float-right" height="14" /></a>
                        <a class="dropdown-item" href="javascript: void(0);"><span> Spanish </span><img
                                src="{{ asset('assets/images/flags/spain_flag.jpg') }}" alt=""
                                class="ml-2 float-right" height="14" /></a>
                        <a class="dropdown-item" href="javascript: void(0);"><span> Russian </span><img
                                src="{{ asset('assets/images/flags/russia_flag.jpg') }}" alt=""
                                class="ml-2 float-right" height="14" /></a>
                    </div> --}}
                </li>

                {{-- <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti-bell noti-icon"></i>
                        <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg pt-0">

                        <h6
                            class="dropdown-item-text font-15 m-0 py-3 bg-primary text-white d-flex justify-content-between align-items-center">
                            Notifications <span class="badge badge-light badge-pill">2</span>
                        </h6>
                        <div class="slimscroll notification-list">
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">2 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-primary">
                                        <i class="la la-cart-arrow-down text-white"></i>
                                    </div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">10 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-success">
                                        <i class="la la-group text-white"></i>
                                    </div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">Meeting with designers</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a
                                            reader.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">40 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-pink">
                                        <i class="la la-list-alt text-white"></i>
                                    </div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">UX 3 Task complete.</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">1 hr ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-warning">
                                        <i class="la la-truck text-white"></i>
                                    </div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a
                                            reader.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">2 hrs ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-info">
                                        <i class="la la-check-circle text-white"></i>
                                    </div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">Payment Successfull</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li> --}}

                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/user-1.png') }}" alt="profile-user"
                            class="rounded-circle" />
                        <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->name }} <i
                                class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a> --}}
                        {{-- <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> My
                            Wallet</a>
                        <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i>
                            Settings</a>
                        <a class="dropdown-item" href="#"><i class="ti-lock text-muted mr-2"></i> Lock
                            screen</a> --}}
                        <div class="dropdown-divider mb-0"></div>

                        <!-- item-->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <i class="ti-power-off text-muted mr-2"></i> Logout
                            </a>
                        </form>
                    </div>
                </li>
            </ul><!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="nav-link button-menu-mobile waves-effect waves-light">
                        <i class="ti-menu nav-icon"></i>
                    </button>
                </li>
                {{-- <li class="hide-phone app-search">
                    <form role="search" class="">
                        <input type="text" id="AllCompo" placeholder="Search..." class="form-control">
                        <a href=""><i class="fas fa-search"></i></a>
                    </form>
                </li> --}}
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->

    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <ul class="metismenu left-sidenav-menu">
            <li class="{{ Route::currentRouteName() == 'dashboard' ? 'mm-active' : '' }}">
                <a href="{{ Route('dashboard') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            @can('customer-show')
                <li class="{{ Route::currentRouteName() == 'customers.index' ? 'mm-active' : '' }}">
                    <a href="{{ Route('customers.index') }}"><i class="fas fa-users"></i><span>Customer</span></a>
                </li>
            @endcan

            @can(['purchaseNew-show', 'saleNew-show'])
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Purchase/Sell</span>
                        <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('purchaseNew-show')
                            <li class="{{ Route::currentRouteName() == 'dealer-purchase.index' ? 'mm-active' : '' }}">
                                <a href="{{ route('dealer-purchase.index') }}">
                                    <i class="fas fa-wallet"></i><span>Purchase New</span></a>
                            </li>
                        @endcan
                        @can('saleNew-show')
                            <li class="{{ Route::currentRouteName() == 'sales.index' ? 'mm-active' : '' }}">
                                <a href="{{ route('sales.index') }}">
                                    <i class="fas fa-balance-scale-left"></i><span>Sale New</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can(['purchaseUsed-show', 'saleUsed-show'])
                <li>
                    <a href="javascript: void(0);"><i class="fas fa-bicycle" aria-hidden="true"></i>
                        <span>Used Bikes</span>
                        <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('purchaseUsed-show')
                            <li class="{{ Route::currentRouteName() == 'purchases.index' ? 'mm-active' : '' }}">
                                <a href="{{ route('purchases.index') }}">
                                    <i class="fas fa-balance-scale-right"></i><span>Purchase Use</span></a>
                            </li>
                        @endcan

                        @can('saleUsed-show')
                            <li class="{{ Route::currentRouteName() == 'sale-use.index' ? 'mm-active' : '' }}">
                                <a href="{{ route('sale-use.index') }}">
                                    <i class="fas fa-balance-scale-left"></i><span>Sale Use</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('registrations-show')
                <li class="{{ Route::currentRouteName() == 'registration.index' ? 'mm-active' : '' }}">
                    <a href="{{ Route('registration.index') }}"><i
                            class="fa fa-address-card"></i><span>Registations</span></a>
                </li>
            @endcan

            @can('expenses-show')
                <li class="{{ Route::currentRouteName() == 'dailyexp.index' ? 'mm-active' : '' }}">
                    <a href="{{ Route('dailyexp.index') }}"><i class="fas fa-money-bill"></i><span>Expenses</span></a>
                </li>
            @endcan
            @can('invoices-show')
                <li class="{{ Route::currentRouteName() == 'invoices.index' ? 'mm-active' : '' }}">
                    <a href="{{ Route('invoices.index') }}"><i class="fas fa-fill"></i><span>Invoices</span></a>
                </li>
            @endcan

            {{-- Report Section --}}
            <li>
                <a href="javascript: void(0);">
                    <i class="fas fa-book"></i>
                    <span>Reports</span>
                    <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">

                    <li class="{{ Route::currentRouteName() == 'reports.Expenses' ? 'mm-active' : '' }}">
                        <a href="{{ route('reports.Expenses') }}"><i class="fas fa-file"></i>
                            <span>Expenses Report</span></a>
                        </a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'reports.dailyexp' ? 'mm-active' : '' }}">
                        <a href="{{ route('reports.dailyexp') }}"><i class="fas fa-file"></i>
                            <span>Daily Exp Report</span></a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'reports.ledger' ? 'mm-active' : '' }}">
                        <a href="{{ route('reports.ledger') }}"><i class="fas fa-file"></i>
                            <span>Ledger Report</span></a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'reports.Customer' ? 'mm-active' : '' }}">
                        <a href="{{ route('reports.Customer') }}"><i class="fas fa-file"></i>
                            <span>Customer Report</span></a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'reports.letter' ? 'mm-active' : '' }}">
                        <a href="{{ route('reports.letter') }}"><i class="fas fa-file"></i>
                            <span>GL Report</span></a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'reports.PurchaseNew' ? 'mm-active' : '' }}">
                        <a href="{{ route('reports.PurchaseNew') }}"><i class="fas fa-file"></i>
                            <span>Purchase Report</span></a>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'reports.SaleNew' ? 'mm-active' : '' }}">
                        <a href="{{ route('reports.SaleNew') }}"><i class="fas fa-file"></i>
                            <span>Sale Report</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'reports.Chassis' ? 'mm-active' : '' }}">
                        <a href="{{ route('reports.Chassis') }}"><i class="fas fa-file"></i>
                            <span>Vehicle Report</span></a>
                    </li>

                </ul>
            </li>
            {{-- End --}}

            @can(['user-show', 'role-show', 'permission-show'])

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-user-tag"></i>
                        <span>Manage User</span>
                        <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('user-show')
                            <li class="{{ Route::currentRouteName() == 'users.index' ? 'mm-active' : '' }}">
                                <a href="{{ route('users.index') }}">
                                    <i class="fa fa-user"></i><span>User</span></a>
                            </li>
                        @endcan
                        @can('role-show')
                            <li class="{{ Route::currentRouteName() == 'roles.index' ? 'mm-active' : '' }}">
                                <a href="{{ route('roles.index') }}">
                                    <i class="fa fa-key"></i><span>Role</span></a>
                            </li>
                        @endcan
                        @can('permission-show')
                            <li class="{{ Route::currentRouteName() == 'permissions.index' ? 'mm-active' : '' }}">
                                <a href="{{ route('permissions.index') }}">
                                    <i class="fa fa-pen"></i><span>Permission</span></a>
                            </li>
                        </ul>
                    @endcan
                </li>

            @endcan
            @can(['vehicle-show', 'dealer-show'])
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                        <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('dealer-show')
                            <li class="{{ Route::currentRouteName() == 'dealers.index' ? 'mm-active' : '' }}">
                                <a href="{{ route('dealers.index') }}"><i class="fa fa-user"></i><span>Dealer</span></a>
                            </li>
                        @endcan
                        @can('vehicle-show')
                            <li class="{{ Route::currentRouteName() == 'vehicles.index' ? 'mm-active' : '' }}">
                                <a href="{{ route('vehicles.index') }}">
                                    <i class="fa fa-bicycle" aria-hidden="true"></i><span>Vehicle</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
    <!-- end left-sidenav-->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">

            @yield('content')

            <footer class="footer text-center text-sm-left">
                &copy; 2023 <span class="text-muted d-none d-sm-inline-block float-right"> Developed <i
                        class="mdi mdi-heart text-danger"></i> by OraSoft.pk</span>
            </footer><!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->




    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/roundedBar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightpick/lightpick.js') }}"></script>
    <script src="{{ asset('assets/pages/jquery.sales_dashboard.init.js') }}"></script>


    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('script')
    @livewireScripts
</body>

</html>
