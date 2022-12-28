@extends('backend.layout')
@section('title','Ürün Resim işlemleri')
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-4">
        <div class="col-lg-9 col-md-8">
            <div class="ibox" id="mailbox-container">
                <div class="mailbox-header d-flex justify-content-between" style="border-bottom: 1px solid #e8e8e8;">
                    <div>
                        <h5 class="inbox-title">{{$product->name}}</h5>
                        <div class="m-t-5 font-13">
                            <span class="font-strong">{{$product->categories->name}}</span>
                            <a class="text-muted m-l-5" href="javascript:;"></a>
                        </div>
                        <div class="p-r-10 font-13">Stok Sayısı {{$product->stock}}</div>
                    </div>

                </div>

                <div class="mailbox-body">
                    <div class="d-flex justify-content-between m-b-10">
                        <span class="font-strong"><i class="fa fa-paperclip"></i>{{$images->count()}} Adet Resim</span>
                        <button class="btn btn-default btn-sm" data-action="reply" data-toggle="tooltip" data-original-title="Download all"><i class="fa fa-download"></i></button>
                    </div>
                    <div class="mail-attachments d-flex">
                        @foreach($images as $image)
                        <div style="width:300px;height: auto" class="card">
                            <div>
                                <img class="card-img-top file-image" src="{{asset('public_directory')}}/image/products/{{$image->image}}">
                            </div>
                            <div class="card-body"><form action="{{route('bekci.imageOrder')}}" method="POST">@CSRF
                                    <div class="form-group"> <input type="hidden" name="product" value="{{$product->id}}">
                                    <input type="hidden" name="image" value="{{$image->id}}">
                                <span> <input style="width:70px" name="order" value="{{$image->image_order}}" class="form-control input-sm float-left" type="number">
                                    <button type="submit" class="btn btn-success "><i class="fa fa-check"></i></button></span></div></form>
                                <span class="float-left">{{$image->image}}</span>
                                <a href="{{route('bekci.imageDelete',[$image->id,$product->id])}}" class="btn btn-danger btn float-right" href="javascript:;"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
            <div class="ibox ">
            <div class="col-md-12 " >
                <form action="{{route('bekci.productImagesPost')}}" method="POST" enctype="multipart/form-data">
                    @CSRF
                    <div class="form-group">
                        <input type="hidden" name="product" value="{{$product->id}}">
                        <label>Resimler Toplu Seçiniz</label>
                        <input class="form-control" name="images[]" type="file" accept=".jpg, .jpeg, .png, .image" multiple>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info col-md-12" type="submit">Resimleri Ekle</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

    </div>
@endsection
@section('css') @endsection
@section('js') @endsection
