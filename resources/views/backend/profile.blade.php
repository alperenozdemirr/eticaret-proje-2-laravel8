@extends('backend.layout')
@section('title','Ürün Güncelle')
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
    <div class="d-flex justify-content-center flex-nowrap mt-4">
        <div class="col-md-10">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Profil Resmini Değiştir</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item">option 1</a>
                                <a class="dropdown-item">option 2</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form action="{{route('bekci.imageChange')}}" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group mt-4">
                            <label>
                                Profil Resmini Seç
                            </label>
                            <input type="file" id="images" name="image" class="form-control col-md-12">
                        </div>
                            <button type="submit" class="btn btn-success col-md-12">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Şifreni Değiştir</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item">option 1</a>
                                <a class="dropdown-item">option 2</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form action="{{route('bekci.passwordChange')}}" method="POST">
                            @CSRF
                            <div class="form-group mt-4">
                                <label>Eski Şifre</label>
                                <input type="text" name="oldPassword" value="{{old('oldPassword')}}" class="form-control col-md-12">
                            </div>
                            <div class="form-group mt-4">
                                <label>Yeni Şifre</label>
                                <input type="text" name="newPassword" value="{{old('newPassword')}}" class="form-control col-md-12">
                            </div>
                            <div class="form-group mt-4">
                                <label>Tekrar Yeni Şifre</label>
                                <input type="text" name="confirmPassword" value="{{old('confirmPassword')}}" class="form-control col-md-12">
                            </div>
                            <button type="submit" class="btn btn-success col-md-12">Değiştir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')
    <script src="{{asset('public_directory')}}/script/preview.js"></script>
@endsection
