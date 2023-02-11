@extends('frontend.layout')
@section('title','Sipariş bilgilerim')
@section('content')
    <head>
                                    <style>
                                        #preview img{
                                            width:100%;
                                            height: auto;
                                            object-fit: contain;
                                        }
                                        .preview{
                                            width:200px;height: 200px;background-color:rgb(241,241,241);
                                            border:2px solid #b6effb;
                                        }
                                    </style>
    </head>
    <div class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="index.html">Hesabım</a></li>
                    <li class="breadcrumb-item"><a href="index.html">Profil Ayarlarım</a></li>
                </ol>
            </div><!-- End .container -->
        </nav>

            <div class="intro-section pt-3 pb-3 mb-2">
                <div class="container">

                    <div class="d-flex justify-content-center">

                        <div class="col-lg-8">
                            <div style="text-align: center;" class="alert alert-dark mb-2 col-md-12">
                                <h6 style="color: white" >Profil Resmini Değiştir</h6>
                            </div>
                            <div class="col-md-12">
                                <form action="{{route('imageChange')}}" method="POST" enctype="multipart/form-data">
                                    @CSRF
                                <div class="d-flex justify-content-center">
                                    <div class="preview" id="preview">
                                        @if(\Illuminate\Support\Facades\Auth::user()->image==null)
                                            <img src="{{asset('public_directory')}}/icon/user.png">
                                        @else
                                        <img src="{{asset('public_directory')}}/image/users/{{\Illuminate\Support\Facades\Auth::user()->image}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                           <input type="file" id="images" name="image" class="form-control col-md-12" placeholder="Resmi Seç">
                                </div>
                                <button type="submit" class="btn btn-success col-md-12">Güncelle</button>
                                </form>
                            </div>

                            <div style="text-align: center;" class="alert alert-dark mb-2 mt-4 col-md-12">
                                <h6 style="color: white" >Şifremi Değiştir</h6>
                            </div>
                            <div class="col-md-12">
                                <form action="{{route('passwordChange')}}" method="POST">
                                    @CSRF
                                <div class="form-group">
                                    <label >Eski Şifre</label>
                                    <input type="text" class="form-control col-md-12" name="oldPassword" placeholder="Eski Şifre">
                                </div>
                                <div class="form-group">
                                    <label >Yeni  Şifre</label>
                                    <input type="text" class="form-control col-md-12" name="newPassword" placeholder="Yeni  Şifre">
                                </div>
                                <div class="form-group">
                                    <label >Tekrar Yeni Şifre</label>
                                    <input type="text" class="form-control col-md-12" name="confirmPassword" placeholder="Tekrar Yeni Şifre">
                                </div>
                                <button type="submit" class="btn btn-success col-md-12">Güncelle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


<script src="{{asset('public_directory')}}/script/preview.js"></script>
@endsection
@section('css') @endsection
@section('js')

@endsection
