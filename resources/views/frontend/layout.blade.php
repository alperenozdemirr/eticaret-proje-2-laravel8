<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend')}}/assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend')}}/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend')}}/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="{{asset('frontend')}}/assets/images/icons/site.html">
    <link rel="mask-icon" href="a{{asset('frontend')}}/ssets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="{{asset('frontend')}}/assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('frontend')}}/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->

    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/skins/skin-demo-3.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/demos/demo-3.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/plugins/nouislider/nouislider.css">
    @yield('css')
</head>

<body>
<div class="page-wrapper">
    <header class="header header-intro-clearance header-3">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                </div><!-- End .header-left -->

                <div class="header-right">

                    <ul class="top-menu">
                        <li>
                            <a href="#">TR</a>
                            <ul>
                                <li>
                                    <div class="header-dropdown">
                                        <a href="#">TR</a>
                                        <div class="header-menu">
                                            <ul>
                                                <li><a href="#">Tr</a></li>
                                                <li><a href="#">French</a></li>
                                                <li><a href="#">Spanish</a></li>
                                            </ul>
                                        </div><!-- End .header-menu -->
                                    </div>
                                </li>
                                @auth
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">Hesabım</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></li>
                                                    <li><a href="{{route('profilePage')}}">Profil Ayarlarım</a></li>
                                                    <li><a href="{{route('accountPage')}}">Hesap Bilgilerim</a></li>
                                                    <li><a href="{{route('orderPage')}}">Siparişlerim</a></li>
                                                    <li><a href="{{route('user.logout')}}">Çıkış Yap</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                @elseguest
                                    <li><a href="{{route('user.loginPage')}}" >Giriş Yap | Üye Ol</a></li>
                                @endauth
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->

            </div><!-- End .container -->
        </div><!-- End .header-top -->

        <div class="header-middle">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only"></span>
                        <i class="icon-bars"></i>
                    </button>

                    <a href="{{route('index')}}" class="logo">
                        <img src="{{asset('frontend')}}/assets/images/demos/demo-3/logo.png" alt="Molla Logo" width="105" height="25">
                    </a>
                </div><!-- End .header-left -->

                <div class="header-center">
                    <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                        <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                        <form action="{{route('search')}}" method="GET">
                            <div class="header-search-wrapper search-wrapper-wide">
                                <label  class="sr-only">Search</label>
                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                <input type="search" class="form-control" name="search" id="q" placeholder="Ara ürün ismi.." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->
                </div>

                <div class="header-right">
                    @auth
                    <div class="wishlist">
                        <a href="{{route('profilePage')}}" title="Wishlist">
                            <div class="icon">
                                @if(\Illuminate\Support\Facades\Auth::user()->image==null)
                                    <img width="28px" src="{{asset('public_directory')}}/icon/user.png" class="rounded-circle" alt="profile photo">
                                @else
                                    <img width="28px" src="{{asset('public_directory')}}/image/users/{{\Illuminate\Support\Facades\Auth::user()->image}}" class="rounded-circle" alt="profile photo">
                                @endif
                            </div>
                            <p>Profil</p>
                        </a>
                    </div>
                    @endauth
                    <div class="dropdown cart-dropdown">
                        <a href="{{route('shoppingCart')}}" class="dropdown-toggle" >
                            <div class="icon">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">{{\App\Http\Controllers\Frontend\DefaultController::basketCount()}}</span>
                            </div>
                            <p>Sepetim</p>
                        </a>


                    </div><!-- End .cart-dropdown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->

        <div class="header-bottom sticky-header">
            <div class="container">
                <div class="header-left">
                    <div class="dropdown category-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                            Ana Kategoriler <i class="icon-angle-down"></i>
                        </a>

                        <div class="dropdown-menu">
                            <nav class="side-nav">
                                <ul class="menu-vertical sf-arrows">
                                    @foreach($data['categories'] as $category)
                                    <li><a href="#">{{$category->name}}</a></li>
                                    @endforeach
                                </ul><!-- End .menu-vertical -->
                            </nav><!-- End .side-nav -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .category-dropdown -->
                </div><!-- End .header-left -->

                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">

                            <li><a href="{{route('index')}}">Anasayfa</a></li>
                            <li><a href="{{route('shop')}}">Ürünler</a></li>
                            <li>
                                <a href="#" class="sf-with-ul">Tüm Kategoriler</a>

                                <ul>
                                    @foreach($data['categories'] as $category)
                                    <li>
                                        <a href="{{route('category.url',$category->id)}}" class="sf-with-ul">{{$category->name}}</a>
                                        <ul>
                                            @foreach($category->categories as $childCategory)
                                                @include("frontend.default.child_category",['child_category'=>$childCategory])
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>


                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-center -->

                <div class="header-right">
                    <i class="la la-lightbulb-o"></i><p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p>
                </div>
            </div><!-- End .container -->
        </div><!-- End .header-bottom -->
    </header><!-- End .header -->
    @if(session('null'))
    <div class="alert alert-warning col-lg-12" style="text-align: center">Bu istekte bir sonuç bulunamadı(0)!</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success col-lg-12" style="text-align: center">İşleminiz Başarı ile gerçekleşti</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger col-lg-12" style="text-align: center">İşleminizde bir problem oluştu!</div>
    @endif
    @if(session('alert'))
        <div class="alert alert-warning col-lg-12" style="text-align: center">İşleminizi kontrol ediniz eksik bilgi veya yanlışlık var!</div>
    @endif
    @if(session('notLogged'))
        <div class="alert alert-warning col-lg-12" style="text-align: center">İşlemi gerçekleştirebilmek için giriş yapmak gerekiyor!</div>
    @endif
    @if(session('authenticate'))
        <div class="alert alert-dark col-lg-12" style="text-align: center">Hoşgeldin {{session('authenticate')}}</div>
    @endif
        @yield('content')


    <footer class="footer">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="widget widget-about">
                            <img src="{{asset('frontend')}}/assets/images/demos/demo-3/logo-footer.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
                            <p>Electronik ürünler Telefon Tablet bilgisayar ürünlerine kadar taksitsiz geri iadeli ürün garantili Ve güvenli Hızlı Hizmet sunmaktayız.</p>

                            <div class="widget-call">
                                <i class="icon-phone"></i>
                                Got Question? Call us 24/7
                                <a href="tel:#">+0123 456 789</a>
                            </div><!-- End .widget-call -->
                        </div><!-- End .widget about-widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">Ana Kategoriler</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                @foreach($data['categories'] as $category)
                                    <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">Müşteri Servisi</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="#">Ödeme Metodları</a></li>
                                <li><a href="#">Nakliye</a></li>
                                <li><a href="#">Şartlar ve Koşullar</a></li>
                                <li><a href="#">Gizlilik Politikası</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">Hesabım</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="{{route('user.loginPage')}}">Giriş Yap</a></li>
                                <li><a href="{{route('user.registerPage')}}">Kayıt ol</a></li>
                                <li><a href="{{route('accountPage')}}">Hesap Bilgilerim</a></li>
                                <li><a href="{{route('orderPage')}}">Sipaişlerim</a></li>
                                <li><a href="{{route('shoppingCart')}}">Sepetim</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .footer-middle -->

        <div class="footer-bottom">
            <div class="container">
                <p class="footer-copyright">Copyright © 2023 ÖZDEMİR SOFTWARE</p><!-- End .footer-copyright -->
                <figure class="footer-payments">
                    <img src="{{asset('frontend')}}/assets/images/payments.png" alt="Payment methods" width="272" height="20">
                </figure><!-- End .footer-payments -->
            </div><!-- End .container -->
        </div><!-- End .footer-bottom -->
    </footer><!-- End .footer -->
</div><!-- End .page-wrapper -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="{{route('search')}}" method="GET" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="search" id="mobile-search" placeholder="Ara Ürün ismi.." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        @auth
                        <li><a href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></li>
                        @endauth
                        <li class="active">
                            <a href="{{route('index')}}">Anasayfa</a>
                        </li>
                            <li>
                                <a href="{{route('shop')}}">Ürünler</a>
                            </li>
                            <li><a href="" >Tüm Kategoriler</a>
                                <ul>
                                    @foreach($data['categories'] as $category)
                                        <li>
                                            <a href="{{route('category.url',$category->id)}}" class="sf-with-ul">{{$category->name}}</a>
                                            <ul>
                                                @foreach($category->categories as $childCategory)
                                                    @include("frontend.default.child_category",['child_category'=>$childCategory])
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('shoppingCart')}}">Sepetim({{\App\Http\Controllers\Frontend\DefaultController::basketCount()}})</a>
                            </li>
                            @auth
                                    <li><a href="{{route('accountPage')}}">Hesap Bilgilerim</a></li>
                                    <li><a href="{{route('orderPage')}}">Siparişlerim</a></li>
                                    <li><a href="{{route('user.logout')}}">Çıkış Yap</a></li>
                            @elseguest
                            <li><a href="{{route('user.loginPage')}}" >Giriş Yap | Üye Ol</a></li>
                                @endauth

                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->

        </div><!-- End .tab-content -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Sign in / Register Modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="singin-email">Username or email address *</label>
                                        <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password *</label>
                                        <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="#" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="register-email">Your email address *</label>
                                        <input type="email" class="form-control" id="register-email" name="register-email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control" id="register-password" name="register-password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login  btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->

<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row no-gutters bg-white newsletter-popup-content">
                <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                    <div class="banner-content text-center">
                        <img src="{{asset('frontend')}}/assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                        <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                        <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                        <form action="#">
                            <div class="input-group input-group-round">
                                <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><span>go</span></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                            <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                        </div><!-- End .custom-checkbox -->
                    </div>
                </div>
                <div class="col-xl-2-5col col-lg-5 ">
                    <img src="{{asset('frontend')}}/assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Plugins JS File -->
@yield('js')
<script src="{{asset('frontend')}}/assets/js/jquery.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/jquery.hoverIntent.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/jquery.waypoints.min.js"></script>
<script src="{{asset('frontend')}}/assets/ets/js/superfish.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/bootstrap-input-spinner.js"></script>
<script src="{{asset('frontend')}}/assets/js/jquery.plugin.min.js"></script>

<script src="{{asset('frontend')}}/assets/js/jquery.elevateZoom.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/jquery.countdown.min.js"></script>
<!-- Main JS File -->
<script src="{{asset('frontend')}}/assets/js/main.js"></script>
<script src="{{asset('frontend')}}/assets/js/demos/demo-3.js"></script>
</body>


<!-- molla/index-3.html  22 Nov 2019 09:55:58 GMT -->
</html>

