<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('backend')}}/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="{{asset('public_directory')}}/alertify/css/alertify.min.css" rel="stylesheet">
    <link href="{{asset('public_directory')}}/alertify/css/default.min.css" rel="stylesheet">
    <link href="{{asset('public_directory')}}/alertify/css/semantic.min.css" rel="stylesheet">
    <!-- PLUGINS STYLES-->
    <link href="{{asset('backend')}}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset('public_directory')}}/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="{{asset('backend')}}/assets/css/main.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script src="{{asset('public_directory')}}/dropzone/dropzone.min.js"></script>
    <script src="{{asset('public_directory')}}/alertify/alertify.min.js"></script>

    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
<div class="page-wrapper">
    <!-- START HEADER-->
    <header class="header">
        <div class="page-brand">
            <a class="link" href="index.html">
                    <span class="brand">Özdemir
                        <span class="brand-tip">Software</span>
                    </span>
                <span class="brand-mini">Soft</span>
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
                        @if(\Illuminate\Support\Facades\Auth::user()->image==null)
                        <img src="{{asset('public_directory')}}/icon/user.png" />
                        @else
                            <img src="{{asset('public_directory')}}/image/users/{{\Illuminate\Support\Facades\Auth::user()->image}}" />
                        @endif
                        <span></span>Admin<i class="fa fa-angle-down m-l-5"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('bekci.profilePage')}}"><i class="fa fa-user"></i>Profile</a>
                        <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>
                        <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a>
                        <li class="dropdown-divider"></li>
                        <a class="dropdown-item" href="{{route('bekci.logout')}}"><i class="fa fa-power-off"></i>Logout</a>
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
                    @if(\Illuminate\Support\Facades\Auth::user()->image==null)
                        <img src="{{asset('public_directory')}}/icon/user.png" class="rounded-circle" width="45px" />
                    @else
                        <img src="{{asset('public_directory')}}/image/users/{{\Illuminate\Support\Facades\Auth::user()->image}}" class="rounded-circle" width="45px" />
                    @endif
                </div>
                <div class="admin-info">
                    <div class="font-strong">{{\Illuminate\Support\Facades\Auth::user()->name}}</div><small>Yönetici</small></div>
            </div>
            <ul class="side-menu metismenu">
                <li>
                    <a class="active" href="{{route('bekci.index')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li class="heading">Menü</li>
                <li>
                    <a href="{{route('bekci.userList')}}"><i class="sidebar-item-icon fa fa-user"></i>
                        <span class="nav-label">Kullanıcı İşlemleri</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Kategoriler</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('bekci.categoryList')}}">Kategori Listesi</a>
                        </li>
                        <li>
                            <a href="{{route('bekci.newCategoryPage')}}">Kategori Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Ürün İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('bekci.productList')}}">Ürün Listesi</a>
                        </li>
                        <li>
                            <a href="{{route('bekci.productAddPage')}}">Ürün Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Sipariş İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('bekci.orderList')}}">Tüm Siparişler</a>
                        </li>
                        <li>
                            <a href="{{route('bekci.orderSupply')}}">Tedarik Edilen Siparişler</a>
                        </li>
                        <li>
                            <a href="{{route('bekci.orderCargo')}}">Kargodaki Siparişler</a>
                        </li>
                        <li>
                            <a href="{{route('bekci.orderDelivered')}}">Teslim Edilen Siparişler</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Banner İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('bekci.bannerList')}}">Banner Listesi</a>
                        </li>
                        <li>
                            <a href="{{route('bekci.bannerAddPage')}}">Banner Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Slider İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('bekci.sliderList')}}">Slider Listesi</a>
                        </li>
                        <li>
                            <a href="{{route('bekci.sliderAddPage')}}">Slider Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Basic UI</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="cards.html">Card</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="icons.html"><i class="sidebar-item-icon fa fa-smile-o"></i>
                        <span class="nav-label">Icons</span>
                    </a>
                </li>
                <li class="heading">PAGES</li>

                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                        <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="javascript:;">Level 2</a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="javascript:;">Level 3</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Level 3</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END SIDEBAR-->
<div class="content-wrapper">
    @if(session('success'))
        <div class="alert alert-success col-lg-12" style="text-align: center">İşleminiz Başarı ile gerçekleşti</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger col-lg-12" style="text-align: center">İşleminizde bir problem oluştu!</div>
    @endif
    @if(session('alert'))
        <div class="alert alert-warning col-lg-12" style="text-align: center">İşleminizi kontrol ediniz eksik bilgi veya yanlışlık var!</div>
    @endif

    @yield('content')

    <footer class="page-footer">
        <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
        <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer>
</div>
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
@if(session('success'))<script>alertify.success("Başarılı");</script>@endif
@if(session('error'))<script>alertify.error("Başarısız");</script>@endif
@yield('js')
<script src="{{asset('backend')}}/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset('backend')}}/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{asset('backend')}}/assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{asset('backend')}}/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
</body>

</html>
