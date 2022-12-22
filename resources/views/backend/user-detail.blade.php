@extends('backend.layout')
@section('title','Kullanıcı Detay')
@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-body text-center">
                <div class="m-t-20">
                    @if($user->image==null)
                    <img class="img-circle" src="{{asset('public_directory')}}/icon/user.png">
                        @else
                        <img class="img-circle" src="{{asset('public_directory')}}/image/user/{{$user->image}}">
                    @endif
                </div>
                <h5 class="font-strong m-b-10 m-t-10">{{$user->name}}</h5>
                <div class="m-b-20 text-muted"><b>@if($user->type==1)KULLANICI @elseif($user->type==5)YÖNETİCİ @endif</b></div>

            </div>
        </div>


    </div>
    <div class="row">
    <div class="col-md-6">
        <div class="ibox">
            <div class="ibox-body">
                <div class="row text-center m-b-20">
                </div>
                <p class="text-center"><b>{{$user->name}}</b> Adlı kullanıcının tüm bilgileri listelenmiştir</p>
                <div class="col-xl-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Kullanıcı Bilgileri</div>
                        </div>
                        <div class="ibox-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Ad Soyad</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Ad Soyad</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Telefon</td>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Kullanıcı Tipi</td>
                                    <td><b>@if($user->type==1)KULLANICI @elseif($user->type==5)YÖNETİCİ @endif</b></td>
                                </tr>
                                <tr>
                                    <td>Adres</td>
                                    <td>{{$user->address}}</td>
                                </tr>
                                <tr>
                                    <td>Posta Kodu</td>
                                    <td>{{$user->posta_code}}</td>
                                </tr>
                                <tr>
                                    <td>Şehir</td>
                                    <td>{{$user->city}}</td>
                                </tr>
                                <tr>
                                    <td>Kullanıcı Durum</td>
                                    <td><b>@if($user->status==1)Aktif Kullanıcı @else Erişim Engelli @endif</b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="ibox">
            <div class="ibox-body">
                <div class="row text-center m-b-20">
                </div>
                <p class="text-center"><b>{{$user->name}}</b> Adlı kullanıcının Kullanıcı tipini ve Durumunu bu panelden değişiklik sağlayabilirsin</p>
                <div class="col-xl-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Kullanıcı Tipini Değiştir</div>
                        </div>
                        <form action="{{route('bekci.changeType')}}" method="POST">
                            @CSRF
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <select id="selectType" name="type" class="form-control input-sm">
                                <option value="1">Kullanıcı</option>
                                <option value="5">Yönetici</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Değiştir</button>
                        </form>
                        <hr>
                        <div class="ibox-head">
                            <div class="ibox-title">Kullanıcı Durumunu Değiştir</div>
                        </div>
                        <form action="{{route('bekci.changeStatus')}}" method="POST">
                            @CSRF
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <select id="selectStatus" name="status" class="form-control input-sm">
                                <option value="1">Aktif</option>
                                <option value="0">Erişim Engeli</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Değiştir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        document.getElementById("selectType").value="{{$user->type}}";

        document.getElementById("selectStatus").value="{{$user->status}}";
    </script>
@endsection
@section('css') @endsection
@section('js') @endsection
