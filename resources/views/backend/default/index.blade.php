@extends('backend.layout')
@section('title','Bekci Anasayfa')
@section('content')

        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-success color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$totalOrder}}</h2>
                            <div class="m-b-5">Yeni Gelen Siparişler</div><i class="ti-bar-chart widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>Onaylanmayı Bekliyor..</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-info color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$basketCount}}</h2>
                            <div class="m-b-5">Dolu Sepet</div><i class="ti-shopping-cart widget-stat-icon"></i>
                            <div><small>Tüm</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-warning color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$totalPrice}} TL</h2>
                            <div class="m-b-5">Toplam Kazanç</div><i class="fa fa-money widget-stat-icon"></i>
                            <div><i class="fa fa-money"></i> <small>Son 30 gün</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-danger color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$totalUser}}</h2>
                            <div class="m-b-5">Toplam Kullanıcılar</div><i class="ti-user widget-stat-icon"></i>
                            <div><small>Toplam</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-purple color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$totalProduct}}</h2>
                            <div class="m-b-5">Toplam Ürün</div><i class="ti-bar-chart widget-stat-icon"></i>
                            <div><small>Adet</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-teal color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$totalCategory}}</h2>
                            <div class="m-b-5">Toplam Kategori</div><i class="ti-bar-chart widget-stat-icon"></i>
                            <div><small>Adet</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-pink color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$totalBanner}}</h2>
                            <div class="m-b-5">Toplam Banner</div><i class="ti-bar-chart widget-stat-icon"></i>
                            <div><small>Adet</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-yellow color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$totalSlider}}</h2>
                            <div class="m-b-5">Toplam Slider</div><i class="ti-bar-chart widget-stat-icon"></i>
                            <div><small>Adet</small></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END PAGE CONTENT-->
    @endsection
    @section('css') @endsection
    @section('js') @endsection
