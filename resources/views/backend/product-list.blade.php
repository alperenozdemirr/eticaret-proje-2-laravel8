@extends('backend.layout')
@section('title','Ürün Listesi')
@section('content')
    <div class="col-md-12 mt-lg-5">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Ürün Listesi </div><div id="example-table_filter" class="dataTables_filter"><form action="{{route('bekci.productSearch')}}" method="POST">@CSRF<label><input type="search" name="search" class="form-control form-control-sm" placeholder="Ürün Ara Ara" aria-controls="example-table"></label><button type="submit" class="btn  btn-primary btn-rounded">Ara</button></form></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#unique</th>
                        <th>Ürün Adı</th>
                        <th>Kapak Resmi</th>
                        <th>Kategorisi</th>
                        <th>Fiyat</th>
                        <th>Stok</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>

                            <td>
                                @foreach($product->image as $item)
                                @if($item)
                                    <img width="35" src="{{asset('public_directory')}}/image/products/{{$item->image}}">
                                @else
                                    <img width="35" src="{{asset('public_directory')}}/icon/null-image.png">
                                @endif
                                @endforeach
                            </td>
                            <td>{{$product->categories->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>
                                <a href="{{route('bekci.productImages',$product->id)}}"class="btn btn-xs btn-info" >Resim işlem</a>
                                <a href="{{route('bekci.productUpdatePage',$product->id)}}" class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></a>
                                <a href="{{route('bekci.productDelete',$product->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
@section('css') @endsection
@section('js') @endsection
