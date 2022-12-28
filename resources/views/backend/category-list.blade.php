@extends('backend.layout')
@section('title','Kategori Listesi')
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-4">
        <div class="col-md-8">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Ana Kategoriler</div>
                </div>
                <div class="ibox-body">
                    <table class="table">
                        <thead class="thead-default">
                        <tr>
                            <th>#</th>
                            <th>Kategori İsmi</th>
                            <th>Ana Kategori</th>
                            <th>Kategori Sırası</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($main_category as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>Yok</td>
                            <td>{{$category->category_order}}</td>
                            <td><a href="{{route('bekci.categoryUpdatePage',$category->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil font-14"></i></a>
                                <a href="{{route('bekci.categoryDelete',$category->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash font-14"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Alt Kategoriler</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table">
                            <thead class="thead-default">
                            <tr>
                                <th>#</th>
                                <th>Kategori İsmi</th>
                                <th>Ana Kategorisi</th>
                                <th>Kategori Sırası</th>
                                <th>Düzenle</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_category as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->mainCategory->name}}</td>
                                    <td>@if($category->category_order==null)Default @else{{$category->category_order}}@endif</td>
                                    <td><a href="{{route('bekci.categoryUpdatePage',$category->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil font-14"></i></a>
                                        <a href="{{route('bekci.categoryDelete',$category->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash font-14"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css') @endsection
@section('js') @endsection
