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
                    <a class="nav-link"  href="{{route('shop')}}" >Tüm Ürünler</a>
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
                                <p>1500 TL veya üzeri siparişler</p>
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

    </main><!-- End .main -->
@endsection
@section('css') @endsection
@section('js') @endsection
