@extends('frontend.layout')
@section('title','Anasayfa')
@section('content')
    <main class="main">
        <div class="intro-section pt-3 pb-3 mb-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="intro-slider-container slider-container-ratio mb-2 mb-lg-0">
                            <div class="intro-slider owl-carousel owl-simple owl-dark owl-nav-inside" data-toggle="owl" data-owl-options='{
                                        "nav": false,
                                        "dots": true,
                                        "responsive": {
                                            "768": {
                                                "nav": true,
                                                "dots": false
                                            }
                                        }
                                    }'>
                                @foreach($sliders as $slider)
                                <div class="intro-slide">
                                    <figure class="slide-image">
                                        <picture>
                                            <source media="(max-width: 480px)" srcset="{{asset('public_directory')}}/image/sliders/{{$slider->image}}">
                                            <img src="{{asset('public_directory')}}/image/sliders/{{$slider->image}}" alt="Image Desc">
                                        </picture>
                                    </figure><!-- End .slide-image -->

                                    <div class="intro-content">
                                        <h3 class="intro-subtitle text-primary">{!!  $slider->title !!}</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">

                                            {!! $slider->name !!}
                                        </h1><!-- End .intro-title -->


                                        <a href="{{$slider->url}}" class="btn btn-primary btn-round">
                                            <span>İncele</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .intro-content -->
                                </div><!-- End .intro-slide -->
                                @endforeach
                            </div><!-- End .intro-slider owl-carousel owl-simple -->

                            <span class="slider-loader"></span><!-- End .slider-loader -->
                        </div><!-- End .intro-slider-container -->
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="intro-banners">
                            @foreach($banners as $banner)
                            <div class="banner mb-lg-1 mb-xl-2">
                                <a href="#">
                                    <img src="{{asset('public_directory')}}/image/banners/{{$banner->image}}" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">{{$banner->title}}</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title"><a href="#">{!! $banner->info !!}</a></h3><!-- End .banner-title -->
                                    <a href="{{$banner->url}}" class="banner-link">İncele<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                            @endforeach
                        </div><!-- End .intro-banners -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .intro-section -->

        <div class="container featured">
            <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="products-featured-link" data-toggle="tab" href="#products-featured-tab" role="tab" aria-controls="products-featured-tab" aria-selected="true">Yeni Ürünler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#products-sale-tab" role="tab" aria-controls="products-sale-tab" aria-selected="false">Tüm Ürünler</a>
                </li>

            </ul>

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "600": {
                                        "items":2
                                    },
                                    "992": {
                                        "items":3
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>
                        @foreach($products as $product)
                        <div class="product product-2">
                            <figure style="background-color: white" class="product-media ">
                                <div class="d-flex justify-content-center">
                                <a href="product.html">
                                    <img style="height:200px;width: auto;" src="{{asset('public_directory')}}/image/products/{{$product->images[0]->image}}" alt="Product image" class="product-image">
                                </a>
                                </div>


                                <div class="product-action product-action-dark">
                                    <a href="{{route('single.product',$product->id)}}" class="btn-product btn-quickview" title="Quick view"><span>Ürünü İncele</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="">{{$product->categories->name}}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{route('single.product',$product->id)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    {{$product->price}}TL
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->

                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->


            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        <div class="mb-7 mb-lg-11"></div><!-- End .mb-7 -->



        <div class="icon-boxes-container mt-2 mb-2 bg-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Ücretsiz Kargo</h3><!-- End .icon-box-title -->
                                <p>50 $ veya üzeri siparişler</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Ücretsiz iade</h3><!-- End .icon-box-title -->
                                <p>30 gün içinde</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">1 Üründe %20 İndirim Kazanın</h3><!-- End .icon-box-title -->
                                <p>kaydolduğunuzda</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Destekliyoruz</h3><!-- End .icon-box-title -->
                                <p>7/24 muhteşem hizmetler</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .icon-boxes-container -->

        <div class="container">
            <div class="cta cta-separator cta-border-image cta-half mb-0" style="background-image: url(assets/images/demos/demo-3/bg-2.jpg);">
                <div class="cta-border-wrapper bg-white">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cta-wrapper cta-text text-center">
                                <h3 class="cta-title">Sosyal Alışveriş</h3><!-- End .cta-title -->
                                <p class="cta-desc">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. </p><!-- End .cta-desc -->

                                <div class="social-icons social-icons-colored justify-content-center">
                                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .cta-wrapper -->
                        </div><!-- End .col-lg-6 -->

                        <div class="col-lg-6">
                            <div class="cta-wrapper text-center">
                                <h3 class="cta-title">En Son Fırsatları Alın</h3><!-- End .cta-title -->
                                <p class="cta-desc">ve <br>ilk alışveriş için 20 $ kupon kazanın</p><!-- End .cta-desc -->

                                <form action="#">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-rounded" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- .End .input-group -->
                                </form>
                            </div><!-- End .cta-wrapper -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .bg-white -->
            </div><!-- End .cta -->
        </div><!-- End .container -->
    </main><!-- End .main -->
@endsection
@section('css') @endsection
@section('js') @endsection
