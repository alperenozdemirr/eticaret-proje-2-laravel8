@extends('backend.layout')
@section('title','Kategori Güncelle')
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-4">
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Kategori Güncelle</div>
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
                    <form action="{{route('bekci.categoryUpdate')}}" method="POST">
                        @CSRF
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <label>Kategori İsmi</label>
                            <input class="form-control" value="{{$category->name}}" name="name" type="text" placeholder="Kategori İsmi">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Bu kategoriyi hangi kategori altına ekliyorsun?<br>Hiçbiri Seçilmez ise default olarak ana kategori olacaktır!</label>
                            <select id="selectCategory" name="sub_category" class="form-control" multiple="">
                                <option value="">Ana Kategori</option>
                                @foreach($category_list as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Kategori Sırası(Girilmez ise Default olur)</label>
                            <input class="form-control" value="{{$category->category_order}}" name="category_order" type="number" placeholder="Sıra">
                        </div>

                        <div class="form-group">
                            <button typeof="submit" class="btn btn-success col-md-12" type="submit">Kategoriyi Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("selectCategory").value="{{$category->category_id}}";
    </script>
@endsection
@section('css') @endsection
@section('js') @endsection
