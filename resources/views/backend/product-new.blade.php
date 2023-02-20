@extends('backend.layout')
@section('title','Yeni Ürün Ekle')
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-4">
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Yeni Ürün Ekle</div>
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
                    <form   action="{{route('bekci.productAdd')}}" enctype="multipart/form-data" method="POST">
                        @CSRF
                        <div class="form-group">
                            <label>Ürün İsmi</label>
                            <input class="form-control" @if(session('error')) value="{{old('name')}}" @endif name="name" type="text" placeholder="Ürün İsmi">
                        </div>
                        <div class="form-group">
                            <label>Ürün Detay Bilgisi<br>(sadece yazı giriniz!)</label>
                            <textarea id="editor1" name="info"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Fiyat</label>
                            <input class="form-control" @if(session('error')) value="{{old('price')}}" @endif name="price" type="number" placeholder="Ürün Fiyatı">
                        </div>
                        <div class="form-group">
                            <label>Stok Sayısı</label>
                            <input class="form-control" @if(session('error')) value="{{old('stock')}}" @endif name="stock" type="text" placeholder="Stok Sayısı">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Bu Ürün hangi kategori altına ekliyorsun?</label>
                            <select name="category" class="form-control" multiple="">
                                <option value="">Ana Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Resimler Toplu Seçiniz</label>
                            <input class="form-control" name="images[]" type="file" accept=".jpg, .jpeg, .png, .image" multiple>
                        </div>

                        <div class="form-group">
                            <button typeof="submit" class="btn btn-success col-md-12" type="submit">Yeni Ürün Ekle</button>
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
