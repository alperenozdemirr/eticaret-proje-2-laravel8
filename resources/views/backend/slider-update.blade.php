@extends('backend.layout')
@section('title','Slider Güncelle')
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-4">
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Slider Güncelle</div>

                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body" style="">
                    <form   action="{{route('bekci.sliderUpdate')}}" enctype="multipart/form-data" method="POST">
                        @CSRF
                        <input type="hidden" name="id" value="{{$slider->id}}">
                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control" value="{{$slider->title}}" name="title" type="text" placeholder="Başlık">
                        </div>
                        <div class="form-group">
                            <label>Slider Detay<br>(sadece yazı giriniz! çok uzun girmemeye dikkat ediniz!)</label>
                            <textarea id="editor1" name="name">{{$slider->name}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Slider Bağlantı Linki(url)</label>
                            <input class="form-control" value="{{$slider->url}}" name="url" type="text" placeholder="Bağlantı Linki(url)">
                        </div>
                        <div class="form-group">
                            <label>Banner Sıra</label>
                            <input class="form-control" value="{{$slider->slider_order}}" name="slider_order" type="number" >
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Şuanki Resim<br>Yerine Eklemek İstediğiniz Resmi Seçiniz</label>
                            <span class="float-right"><img width="250" src="{{asset('public_directory')}}/image/sliders/{{$slider->image}}"/></span></div>
                </div>
                <hr>
                <div class="form-group">
                    <label>Banner Resmini Seçiniz(1 adet)</label>
                    <input class="form-control" name="image" type="file" accept=".jpg, .jpeg, .png, .image">
                </div>

                <div class="form-group">
                    <button typeof="submit" class="btn btn-success col-md-12" type="submit">Slider Güncelle</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
@section('css') @endsection
@section('js')

@endsection
