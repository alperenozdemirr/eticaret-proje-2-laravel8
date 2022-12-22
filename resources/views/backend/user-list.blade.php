@extends('backend.layout')
@section('title','Kullanıcı Listesi')
@section('content')
    <div class="col-md-12 mt-lg-5">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Kullanıcı Listesi </div><div id="example-table_filter" class="dataTables_filter"><form action="{{route('bekci.userSearch')}}" method="POST">@CSRF<label><input type="search" name="search" class="form-control form-control-sm" placeholder="Kullanıcı Ara" aria-controls="example-table"></label><button type="submit" class="btn  btn-primary btn-rounded">Ara</button></form></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Tip</th>
                        <th>Durum</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->type==1)<button class="btn btn-info"><i class="fa fa-user"></i>Kullanıcı</button>@elseif($user->type==5)<button class="btn btn-warning"><i class="fa fa-user"></i>Yönetici</button>@endif
                        </td>
                        <td>
                            @if($user->status==1)<button class="btn btn-xs btn-success btn-circle"></button>@else<button class="btn btn-xs btn-danger btn-circle"></button>@endif</td>
                        <td>
                            <a href="{{route('bekci.userDetail',$user->id)}}" class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></a>
                            <a href="{{route('bekci.userDelete',$user->id)}}" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></a>
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
