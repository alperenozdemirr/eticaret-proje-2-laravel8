@extends('frontend.layout')
@section('title','Sipariş bilgilerim')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="#">Sepetim</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sipariş Bilgilerim</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <form method="POST" action="{{route('checkout')}}">@CSRF
        <div class="page-content">
            <div class="checkout">
                <div class="container">

                    <form action="#">
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Sipariş Bİlgilerim</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Adınız Soyadınız *</label>
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control" required="">
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email</label>
                                <input type="text" disabled value="{{$user->email}}" class="form-control">

                                <label>Telefon Numarası *</label>
                                <input type="text" name="phone" value="{{$user->phone}}" class="form-control" required="">

                                <label>Adres *</label>
                                <textarea name="address" placeholder="Açık Adres Sokok,Apartman,daire,tarif..." class="form-control" rows="5">{{$user->address}}</textarea>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Posta Kodu</label>
                                        <input type="text" name="posta_code" value="{{$user->posta_code}}" class="form-control" required="">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Şehir *</label>
                                        <select id="selectCity" name="city" class="form-control" >
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Siparişiniz</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Ürün</th>
                                            <th>AdetToplam</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{substr($order->products->name,0,35)}}..</td>
                                            <td>{{$order->product_count}} X {{$order->products->price}}TL<br>={{$order->product_count*$order->products->price}}</td>
                                        </tr>
                                        @endforeach
                                        <tr class="summary-subtotal">
                                            <td>Ara Toplam:</td>
                                            <td>{{$total}}TL</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Gönderi:</td>
                                            <td>Ücretsiz Kargo</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Ödenecek Tutar:</td>
                                            <td>{{$total}}TL</td>
                                        </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        <p>Ödeme tipi seçmek zorunlu değildir!</p>
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1" class="collapsed">
                                                        EFT Havale
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-1" class="collapse" aria-labelledby="heading-1" data-parent="#accordion-payment" style="">
                                                <div class="card-body">
                                                    EFT ile havale ederek Kolayca ödeme yapabilirsiniz
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                        <div class="card">
                                            <div class="card-header" id="heading-2">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2" class="collapsed">
                                                        Kapıda Ödeme
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment" style="">
                                                <div class="card-body">
                                                    İsteğe bağlı kapıda ödemede yapabilirsiniz
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                        <div class="card">
                                            <div class="card-header" id="heading-5">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                        Kredi Kartı
                                                        <img src="{{'frontend'}}/assets/images/payments-summary.png" alt="payments cards">
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                                <div class="card-body"> Kredi kartı ile ödeme kart seçenekleri ekteki gibidir.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    </div><!-- End .accordion -->

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Sipariş'i Ver</span>
                                        <span class="btn-hover-text">Ödeme İşlemi</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
        </form>
    </main>
@endsection
@section('css') @endsection
@section('js')
    <script>
        document.getElementById("selectCity").value={{$user->city}};
    </script>
@endsection
