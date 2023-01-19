@extends('backend.layout')
@section('title','Tüm Siparişler')
@section('content')
    <div class="col-md-12 mt-lg-5">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Tüm Sipariş Listesi </div><div id="example-table_filter" class="dataTables_filter"><form action="{{route('bekci.orderSearch')}}" method="POST">@CSRF<label><input type="search" name="search" class="form-control form-control-sm" placeholder="Kullanıcı Ara" aria-controls="example-table"></label><button type="submit" class="btn  btn-primary btn-rounded">Ara</button></form></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ad Soyad</th>
                        <th>Toplam Ürün Adet</th>
                        <th>Ödenen Toplam Tutar</th>
                        <th>Zaman</th>
                        <th>Sipariş Durum</th>
                        <th>Detay&Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->users->name}}</td>
                        <td>
                            {{$order->product_total_count}} Adet
                        </td>
                        <td>
                            {{$order->total_price}}TL
                        </td>
                        <td>
                            {{substr($order->created_at,0,10)}}<br>
                            ({{$order->created_at->diffForHumans()}})
                        </td>
                        <td>
                            @if($order->order_status==1)
                            <button class="btn btn-warning btn-xs">Tedarik Ediliyor</button>
                            @elseif($order->order_status==2)
                                <button class="btn btn-info btn-xs">Kargoda</button>
                            @elseif($order->order_status==3)
                                <button class="btn btn-success btn-xs">Teslim Edildi</button>
                            @else
                                <button class="btn btn-danger btn-xs">İşleme Alınmadı</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('bekci.orderDetails',$order->id)}}" class="btn btn-outline-warning btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-search font-14"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($orders->count()==0)
                    <div class="alert alert-warning col-md-12"><h6 style="text-align: center">Bu Tipte Sipariş Hiç Sipariş Bulunmamaktadır(0)</h6></div>
                @endif
                <div class="d-flex justify-content-center flex-nowrap mt-4">
                    {{$orders->links()}}
                </div>
            </div>

        </div>
    </div>





@endsection
@section('css') @endsection
@section('js') @endsection
