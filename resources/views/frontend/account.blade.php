@extends('frontend.layout')
@section('title','Sipariş bilgilerim')
@section('content')
<div class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">anasayfa</a></li>
                <li class="breadcrumb-item"><a href="index.html">Hesap bilgilerim</a></li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <form method="POST" action="{{route('account')}}">@CSRF
        <div class="page-content">
            <div class="checkout">
                <div class="container">

                    <form action="#">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="checkout-title">Hesap Bİlgilerim</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if($user->image==null)
                                            <img width="100" src="{{asset('public_directory')}}/icon/user.png" class="rounded">
                                        @else
                                        <img width="100" src="{{asset('public_directory')}}/image/users/{{$user->image}}" class="rounded" alt="Profil Fotoraf">
                                        @endif
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
                                    <button type="submit" class="btn btn-dark col-md-12 mt-3">Güncelle</button>
                                </div><!-- End .row -->
                            </div><!-- End .col-lg-12 -->

                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </form>
</div>
@endsection
@section('css') @endsection
@section('js')
    <script>
        document.getElementById("selectCity").value={{$user->city}};
    </script>
@endsection
