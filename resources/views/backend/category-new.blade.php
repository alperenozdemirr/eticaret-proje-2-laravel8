@extends('backend.layout')
@section('title','Yeni Kategori Ekle')
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-4">
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Yeni Kategori Ekle</div>
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
                    <form action="{{route('bekci.newCategory')}}" method="POST">
                        @CSRF
                        <div class="form-group">
                            <label>Kategori İsmi</label>
                            <input class="form-control" value="{{old('name')}}" name="name" type="text" placeholder="Kategori İsmi">
                        </div>
                        <hr>
                            <div class="form-group">
                                <label>Bu kategoriyi hangi kategori altına ekliyorsun?<br>Hiçbiri Seçilmez ise default olarak ana kategori olacaktır!</label>
                                <select name="sub_category" class="form-control" multiple="">
                                    <option value="">Ana Kategori</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <hr>
                        <div class="form-group">
                            <label>Kategori Sırası(Girilmez ise Default olur)</label>
                            <input class="form-control" name="category_order" type="number" placeholder="Sıra">
                        </div>

                        <div class="form-group">
                            <button typeof="submit" class="btn btn-success col-md-12" type="submit">Yeni Kategori Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css') @endsection
@section('js') @endsection
