@extends('frontend.layout')
@section('title','Sipariş bilgilerim')
@section('content')
    <div class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="#">Sepetim</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sipariş Bilgilerim</li>
                    <li class="breadcrumb-item active" aria-current="page">Ödeme İşlemi</li>
                </ol>
            </div><!-- End .container -->
        </nav>
        <div class="page-content">
            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                    <h5>ÖDEME İŞLEMİ</h5>
                    <hr>
                    <div class="form-group">
                        <label>Kart Numarası*</label>
                        <input disabled  type="text" value="12 34 56 78 90"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kart İsmi*</label>
                        <input disabled type="text" value="{{\Illuminate\Support\Facades\Auth::user()->name}}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>CV*</label>
                        <input disabled type="text" value="054"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Son Kullanma Tarihi*</label>
                        <input disabled type="text" value="12/25"  class="form-control">
                    </div>
                    <div class="form-group">
                        <a href="{{route('newOrder')}}" class="btn btn-dark col-md-12">Ödemeyi Onayla</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css') @endsection
@section('js')
@endsection
