@extends('frontend.layout')
@section('title','Sepetim('.$baskets->count().')')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sepetim</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                <tr>
                                    <th>Ürün</th>
                                    <th>Fiyat</th>
                                    <th>Adet</th>
                                    <th>Toplam Fiyat</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($baskets as $basket)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{asset('public_directory')}}/image/products/{{$basket->images[0]->image}}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{$basket->products->name}}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{$basket->products->price}}TL</td>
                                    <td class="quantity-col">
                                        <div  class="cart-product-quantity">
                                            <nav  aria-label="Page navigation example">
                                                <ul style="border:1px solid darkgrey" class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{route('basketCountDown',$basket->id)}}" aria-label="Previous">
                                                            <span style="color:black" aria-hidden="true">«</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link">{{$basket->product_count}}</a></li>

                                                    <li class="page-item">
                                                        <a class="page-link" href="{{route('basketCountUp',$basket->id)}}" aria-label="Next">
                                                            <span style="color:black" aria-hidden="true">»</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">{{$basket->products->price * $basket->product_count}}TL</td>
                                    <td class="remove-col"><a href="{{route('basketDelete',$basket->id)}}" class="btn-remove"><i class="icon-close"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->
                            @if($baskets->count()==0)
                                <div style="text-align: center" class="alert alert-info">Sepetinizde Ürün Bulunmamaktadır <a style="color:white;" href="{{route('shop')}}"><u>Ürünleri İncele</u></a></div>
                            @endif

                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Sepet Tutarı</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Ara Toplam:</td>
                                        <td>{{$total}}Tl</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Sipariş Özeti:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            Tutar
                                        </td>
                                        <td>{{$total}}TL</td>
                                    </tr><!-- End .summary-shipping-row -->
                                    <tr class="summary-shipping-row">
                                        <td>
                                            Kargo Fiyatı
                                        </td>
                                        <td>0 TL</td>
                                    </tr><!-- End .summary-shipping-row -->
                                    <tr class="summary-shipping-row">
                                        <td>
                                            Toplam Tutar
                                        </td>
                                        <td>{{$total}}TL</td>
                                    </tr><!-- End .summary-shipping-row -->
                                    <tr class="summary-total">
                                        <td>Ödenecek Tutar:</td>
                                        <td>{{$total}}TL</td>
                                    </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{route('checkoutPage')}}" class="btn btn-outline-primary-2 btn-order btn-block">Siparişi Tamamla</a>
                            </div><!-- End .summary -->

                            <a href="{{route('shop')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>Alışverişe Devam Et</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main>


@endsection
@section('css') @endsection
@section('js') @endsection
