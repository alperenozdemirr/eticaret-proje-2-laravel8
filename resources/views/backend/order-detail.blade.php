@extends('backend.layout')
@section('title','Sipariş Detay')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">#0{{$detail->id}} kodlu sipariş </div><div id="example-table_filter" class="dataTables_filter"><form action="{{route('bekci.productSearch')}}" method="POST">@CSRF<label><input type="search" name="search" class="form-control form-control-sm" placeholder="Ürün Ara Ara" aria-controls="example-table"></label><button type="submit" class="btn  btn-primary btn-rounded">Ara</button></form></div>
                </div>
                @if($detail->order_status==1)
                    <div class="alert alert-warning col-md-12"><h6 style="text-align: center">Tedarik Edilen Sipariş</h6></div>
                @elseif($detail->order_status==2)
                    <div class="alert alert-info col-md-12"><h6 style="text-align: center">Kargoki Sipariş</h6></div>
                @elseif($detail->order_status==3)
                    <div class="alert alert-success col-md-12"><h6 style="text-align: center">Teslim Edilen Sipariş</h6></div>
                @endif
                <div class="ibox-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ürün Adı</th>
                            <th>Kapak Resmi</th>
                            <th>Adet</th>
                            <th>Kategorisi</th>
                            <th>Toplam Fiyat</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->product->name}}</td>
                                <td>
                                        @if($order->images[0]->image)
                                            <img width="35" src="{{asset('public_directory')}}/image/products/{{$order->images[0]->image}}">
                                        @else
                                            <img width="35" src="{{asset('public_directory')}}/icon/null-image.png">
                                        @endif
                                </td>
                                <td>{{$order->product_count}} Adet</td>
                                <td>{{$order->product->categories->name}}</td>
                                <td>{{$order->product_price}}TL</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                                    <td>{{$user->cities->name}}</td>
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

                    <div class="col-xl-12">
                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="row text-center m-b-20">
                                </div>
                                <p class="text-center"><b>{{$user->name}}</b> Adlı kullanıcının Ödeme Bilgileri ve Sipariş Durumu bu panelden değişiklik sağlayabilirsin<br>
                                ! Dikkat Sipariş durumunu Kargoda Yapılırsa Mail Gidecektir !</p>
                                <div class="col-xl-12">
                                    <div class="ibox">
                                        <div class="ibox-head">
                                            <div class="ibox-title">Sipariş Durumunu Değiştir</div>
                                        </div>
                                        <form action="{{route('bekci.orderChangeStatus')}}" method="POST">
                                            @CSRF
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{$detail->id}}">
                                                <select id="selectStatus" name="status" class="form-control input-sm">
                                                    <option value="1">Tedarik Ediliyor</option>
                                                    <option value="2">Kargoda</option>
                                                    <option value="3">Teslim Edildi</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-warning btn-block">Değiştir</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Sipariş Faturası</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <td>Toplam Ürün</td>
                                        <td>{{$detail->product_total_count}} Ürün</td>
                                    </tr>
                                    <tr>
                                        <td>Kargo Ücreti</td>
                                        <td>Ücretsiz</td>
                                    </tr>
                                    <tr>
                                        <td>Ödenen Tutar</td>
                                        <td>{{$detail->total_price}}TL</td>
                                    </tr>
                                    <tr>
                                        <td>Sipariş Durumu</td>
                                        <td><b>@if($detail->order_status==1)Tedarik Ediliyor @elseif($detail->order_status==2) Kargoda @elseif($detail->order_status==3)Teslim Edildi @endif</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>

    <script>
        document.getElementById("selectStatus").value="{{$detail->order_status}}";
    </script>
@endsection
@section('css') @endsection
@section('js') @endsection
