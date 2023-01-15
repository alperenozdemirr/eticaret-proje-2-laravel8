@extends('frontend.layout')
@section('title',$product->name)
@section('content')
    <form action="{{route('basketAdd')}}" method="POST">
        @CSRF
    <main class="main">
        <div class="page-content">
            <div class="product-details-top">
                <div class="bg-light pb-5 mb-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                        <div class="container d-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="#">Ürünler</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                            </ol>

                            <nav class="product-pager ml-auto" aria-label="Product">
                                <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                                    <i class="icon-angle-left"></i>
                                    <span>Prev</span>
                                </a>

                                <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                                    <span>Next</span>
                                    <i class="icon-angle-right"></i>
                                </a>
                            </nav><!-- End .pager-nav -->
                        </div><!-- End .container -->
                    </nav><!-- End .breadcrumb-nav -->
                    <div class="container">
                        <div class="product-gallery-carousel owl-carousel owl-full owl-nav-dark owl-loaded owl-drag">
                            <!-- End .product-gallery-image -->

                            <!-- End .product-gallery-image -->

                            <!-- End .product-gallery-image -->

                            <!-- End .product-gallery-image -->
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1422px;">
                                    @foreach($product->images as $image)
                                    <div class="owl-item active" style="width: 355.333px;"><figure class="product-gallery-image">
                                            <img style="height:300px;width: auto;" src="{{asset('public_directory')}}/image/products/{{$image->image}}" data-zoom-image="{{asset('public_directory')}}/image/products/{{$image->image}}" alt="product image">
                                        </figure></div>
                                    @endforeach
                                    </div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div><div class="owl-dots disabled"></div></div><!-- End .owl-carousel -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light pb-5 -->

                <div class="product-details product-details-centered product-details-separator">
                    <div class="container">
                        @if($product->stock==0)
                        <div class="alert alert-dark"><h6 style="color: white">Melesef ürün tükendi!</h6></div>@endif
                            @if($product->stock<6 && $product->stock!=0)
                                <div class="alert alert-danger"><h6 style="color: white">Acele Et Ürün Tükeniyor!</h6></div>@endif
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( {{$product->images->count()}} Resim )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    {{$product->price}}TL
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>{!! substr($product->info,0,300) !!} <a href="#return-info">Devamını Gör..</a></p>
                                </div><!-- End .product-content -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details-action">
                                    <div class="details-action-col">
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" name="count" class="form-control" value="1" min="1" max="{{$product->stock}}" step="1" data-decimals="0" required="" style="display: none;"><div class="input-group  input-spinner"></div>
                                        </div><!-- End .product-details-quantity -->
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button type="submit" @if($product->stock==0) disabled style="background-color: brown;" @endif class="btn-product btn-cart"><span>@if($product->stock==0) Tükendi @else Sepete Ekle @endif</span></button>
                                    </div><!-- End .details-action-col -->
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer details-footer-col">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">{{$product->categories->name}}</a>
                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .product-details -->
            </div><!-- End .product-details-top -->

            <div id="return-info" class="container">
                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Ürün Özellikleri</h3>
                                <p>{!! $product->info !!}</p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->
            </div><!-- End .container -->

            <div class="container">
                <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag" data-toggle="owl" data-owl-options="{
                            &quot;nav&quot;: false,
                            &quot;dots&quot;: true,
                            &quot;margin&quot;: 20,
                            &quot;loop&quot;: false,
                            &quot;responsive&quot;: {
                                &quot;0&quot;: {
                                    &quot;items&quot;:1
                                },
                                &quot;480&quot;: {
                                    &quot;items&quot;:2
                                },
                                &quot;768&quot;: {
                                    &quot;items&quot;:3
                                },
                                &quot;992&quot;: {
                                    &quot;items&quot;:4
                                },
                                &quot;1200&quot;: {
                                    &quot;items&quot;:4,
                                    &quot;nav&quot;: true,
                                    &quot;dots&quot;: false
                                }
                            }
                        }">
                    <!-- End .product -->

                    <!-- End .product -->

                    <!-- End .product -->

                    <!-- End .product -->

                    <!-- End .product -->
                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1358px;">
                            @foreach($views as $item)
                            <div class="owl-item active" style="width: 251.5px; margin-right: 20px;"><div class="product product-7 text-center">
                                    <figure style="background-color: white;" class="product-media">
                                        <div class="d-flex justify-content-center">
                                        <a href="product.html">
                                            <img style="width:auto;height: 200px" src="{{asset('public_directory')}}/image/products/{{$item->images[0]->image}}" alt="Product image" class="product-image">
                                        </a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{$item->categories->name}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">{{$item->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{$item->price}}TL
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( {{$item->images->count()}} Resim )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div></div>
                            @endforeach
                            </div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>
    </form>


@endsection
@section('css')

@endsection
@section('js')

@endsection
