@extends('frontend.layout')
@section('title','Sipariş Detay')
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
                    <li class="breadcrumb-item"><a href="#">Sipariş Detay</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                @if($status==1)
                    <div class="alert alert-warning">
                        <h6 style="text-align: center;color: white">
                            Bu Sipariş Tedarik Ediliyor Tedarik Edildikten Sonra Kargoya Verilecektir Tedarik Süreci 1 ile 3 gün Arasındadır.
                        </h6></div>
                @elseif($status==2)
                    <div  class="alert alert-info"><h6 style="text-align: center;color: white">
                            Bu Sipariş Kargoda Kargo Şirketine Göre İletim Hızı Değişkenlik Gösterir Tahmini Süre 1 ile 4 Gündür</h6>
                    </div>
                @elseif($status==3)
                    <div class="alert alert-success"><h6 style="text-align: center;color: white">
                            Bu Sipariş Başarılı Bir Şekilde Teslim Edilmiştir</h6>
                    </div>
                @endif
                <table class="table table-wishlist table-mobile">
                    <thead>
                    <tr style="text-align: center">
                        <th>RESIM</th>
                        <th>ÜRÜN ADI</th>
                        <th>TOPLAM FİYAT</th>
                        <th>ADET</th>
                    </tr>
                    </thead>

                    <tbody style="text-align: center">
                    @foreach($orders as $order)
                        <tr>
                            <td class="price-col">
                                <img style="width:100px;height: auto" src="{{asset('public_directory')}}/image/products/{{$order->images[0]->image}}">
                            </td>
                            <td class="price-col">{{$order->product->name}}</td>
                            <td class="stock-col"><span class="in-stock">{{$order->product_price}}TL</span></td>
                            <td class="price-col">{{$order->product_count}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table><!-- End .table table-wishlist -->
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
