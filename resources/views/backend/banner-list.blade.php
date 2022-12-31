@extends('backend.layout')
@section('title','Banner Listesi')
@section('content')
    <div class="col-md-12 mt-lg-5">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Banner Listesi</div><div id="example-table_filter" class="dataTables_filter"><form action="{{route('bekci.productSearch')}}" method="POST">@CSRF<label><input type="search" name="search" class="form-control form-control-sm" placeholder="Ürün Ara Ara" aria-controls="example-table"></label><button type="submit" class="btn  btn-primary btn-rounded">Ara</button></form></div>
            </div>
            <div class="ibox-body">
                <div class="alert alert-warning alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Uyarı!</strong>Banner Sıra numarası en büyük sayılı 3 banner listelenir!</div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Banner Sıra</th>
                        <th>Başlık</th>
                        <th>Alt Yazı</th>
                        <th>Resim</th>
                        <th>Url</th>
                        <th>Durum</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banners as $banner)
                        <tr class="">
                            <td>{{$loop->iteration}}</td>
                            <td><div class="btn-group btn-group-sm">
                                    <a href="{{route('bekci.bannerUp',$banner->id)}}" class="btn btn-default"><i class="fa fa-chevron-up"></i></a>
                                    <button>{{$banner->banner_order}}</button>
                                    <a href="{{route('bekci.bannerDown',$banner->id)}}" class="btn btn-default"><i class="fa fa-chevron-down"></i></a>
                                </div></td>
                            <td>{{$banner->title}}</td>
                            <td><a href="{{route('bekci.bannerUpdatePage',$banner->id)}}" >Detaya Git..</a></td>
                            <td><img src="{{asset('public_directory')}}/image/banners/{{$banner->image}}"/> </td>
                            <td>{{$banner->url}}</td>
                            <td>@if($loop->iteration<=3) <button class="btn btn-success">Yayında</button> @else <button class="btn btn-warning">Beklemede</button> @endif</td>
                            <td>
                                <a href="{{route('bekci.bannerUpdatePage',$banner->id)}}" class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></a>
                                <a href="{{route('bekci.bannerDelete',$banner->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></a>
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
