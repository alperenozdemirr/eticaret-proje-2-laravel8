@extends('backend.layout')
@section('title','Bekci Anasayfa')
@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-success color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">0</h2>
                            <div class="m-b-5">Yeni Siparişler</div><i class="ti-shopping-cart widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>2% Yükseliş</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-info color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">0</h2>
                            <div class="m-b-5">Sepet'de bekleyen ürünler</div><i class="ti-bar-chart widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>1% Yükseliş</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-warning color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">0 TL</h2>
                            <div class="m-b-5">Toplam Kazanç</div><i class="fa fa-money widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>1% Yükseliş</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-danger color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">1</h2>
                            <div class="m-b-5">Kazanılan Kullanıcılar</div><i class="ti-user widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>12% Yükseliş</small></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END PAGE CONTENT-->
    @endsection
    @section('css') @endsection
    @section('js') @endsection
