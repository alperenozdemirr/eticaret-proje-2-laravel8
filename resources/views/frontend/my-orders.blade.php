@extends('frontend.layout')
@section('title','Sipariş bilgilerim')
@section('content')
    <main class="main">
        <div class="page-header text-center" >
            <div class="container">
                <h3 class="page-title">Siparişlerim</h3>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="#">Siparişlerim</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div style="text-align: center;font-size:18px;font-weight: bold" class="alert alert-warning">Tedarik Edilen Siparişler</div>
                <table class="table table-wishlist table-mobile">
                    <thead>
                    <tr>
                        <th>TARIH</th>
                        <th>SİPARİŞ ÖZETİ</th>
                        <th>ALICI</th>
                        <th>TUTAR</th>
                        <th>DETAY</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($supply_orders as $order)
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <h3 class="product-title">
                                    <a href="#">{{$order->created_at->diffForHumans()}}</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col"><figure class="product-media">
                            </figure>{{$order->product_total_count}} Adet Ürün</td>
                        <td class="stock-col"><span class="in-stock">{{\Illuminate\Support\Facades\Auth::user()->name}}</span></td>
                        <td class="price-col">{{$order->total_price}} TL</td>
                        <td class="action-col">
                            <a href="{{route('orderDetails',$order->id)}}" class="btn btn-outline-warning">Detay</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table><!-- End .table table-wishlist -->
                @if($supply_orders->count()==0)
                    <div style="text-align: center" class="alert alert-secondary col-md-12"><h4>Bu Tipte Siparişiniz Bulunmamaktadır</h4></div>
                @endif
                <br>
                <div style="text-align: center;font-size:18px;font-weight: bold" class="alert alert-info">Kargodaki Siparişler</div>
                <table class="table table-wishlist table-mobile">
                    <thead>
                    <tr>
                        <th>TARIH</th>
                        <th>SİPARİŞ ÖZETİ</th>
                        <th>ALICI</th>
                        <th>TUTAR</th>
                        <th>DETAY</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($cargo_orders as $order)
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <h3 class="product-title">
                                        <a href="#">{{$order->created_at->diffForHumans()}}</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col"><figure class="product-media">
                                </figure>{{$order->product_total_count}} Adet Ürün</td>
                            <td class="stock-col"><span class="in-stock">{{\Illuminate\Support\Facades\Auth::user()->name}}</span></td>
                            <td class="price-col">{{$order->total_price}} TL</td>
                            <td class="action-col">
                                <button class="btn btn-outline-warning">Detay</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table><!-- End .table table-wishlist -->
                @if($cargo_orders->count()==0)
                    <div style="text-align: center" class="alert alert-secondary col-md-12"><h4>Bu Tipte Siparişiniz Bulunmamaktadır</h4></div>
                @endif
                <br>
                <div style="text-align: center;font-size:18px;font-weight: bold" class="alert alert-success">Teslim Edilen Siparişler</div>
                <table class="table table-wishlist table-mobile">
                    <thead>
                    <tr>
                        <th>TARIH</th>
                        <th>SİPARİŞ ÖZETİ</th>
                        <th>ALICI</th>
                        <th>TUTAR</th>
                        <th>DETAY</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($delivered_orders as $order)
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <h3 class="product-title">
                                        <a href="#">{{$order->created_at->diffForHumans()}}</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col"><figure class="product-media">
                                </figure>{{$order->product_total_count}} Adet Ürün</td>
                            <td class="stock-col"><span class="in-stock">{{\Illuminate\Support\Facades\Auth::user()->name}}</span></td>
                            <td class="price-col">{{$order->total_price}} TL</td>
                            <td class="action-col">
                                <a href="" class="btn btn-outline-warning">Detay</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table><!-- End .table table-wishlist -->
                @if($delivered_orders->count()==0)
                    <div style="text-align: center" class="alert alert-secondary col-md-12"><h4>Bu Tipte Siparişiniz Bulunmamaktadır</h4></div>
                @endif
                <div class="wishlist-share">
                    <div class="social-icons social-icons-sm mb-2">
                        <label class="social-label">Share on:</label>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .wishlist-share -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>
@endsection
@section('css') @endsection
@section('js')
@endsection
