@extends('frontend.layout')
@section('title','Tüm Ürünler')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Tüm Ürünler<span>Dükkan</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="#">Dükkan</a></li>
                    <li class="breadcrumb-item"><a href="#">Tüm Ürünler</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Showing <span>9 of 56</span> Products
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Most Popular</option>
                                            <option value="rating">Most Rated</option>
                                            <option value="date">Date</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                                <div class="toolbox-layout">
                                    <a href="category-list.html" class="btn-layout">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4"></rect>
                                            <rect x="6" y="0" width="10" height="4"></rect>
                                            <rect x="0" y="6" width="4" height="4"></rect>
                                            <rect x="6" y="6" width="10" height="4"></rect>
                                        </svg>
                                    </a>

                                    <a href="category-2cols.html" class="btn-layout">
                                        <svg width="10" height="10">
                                            <rect x="0" y="0" width="4" height="4"></rect>
                                            <rect x="6" y="0" width="4" height="4"></rect>
                                            <rect x="0" y="6" width="4" height="4"></rect>
                                            <rect x="6" y="6" width="4" height="4"></rect>
                                        </svg>
                                    </a>

                                    <a href="category.html" class="btn-layout active">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4"></rect>
                                            <rect x="6" y="0" width="4" height="4"></rect>
                                            <rect x="12" y="0" width="4" height="4"></rect>
                                            <rect x="0" y="6" width="4" height="4"></rect>
                                            <rect x="6" y="6" width="4" height="4"></rect>
                                            <rect x="12" y="6" width="4" height="4"></rect>
                                        </svg>
                                    </a>

                                    <a href="category-4cols.html" class="btn-layout">
                                        <svg width="22" height="10">
                                            <rect x="0" y="0" width="4" height="4"></rect>
                                            <rect x="6" y="0" width="4" height="4"></rect>
                                            <rect x="12" y="0" width="4" height="4"></rect>
                                            <rect x="18" y="0" width="4" height="4"></rect>
                                            <rect x="0" y="6" width="4" height="4"></rect>
                                            <rect x="6" y="6" width="4" height="4"></rect>
                                            <rect x="12" y="6" width="4" height="4"></rect>
                                            <rect x="18" y="6" width="4" height="4"></rect>
                                        </svg>
                                    </a>
                                </div><!-- End .toolbox-layout -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                @foreach($products as $product)
                                <div class="col-6 col-md-4 col-lg-4">
                                    <div class="product product-7 text-center">
                                        <figure style="background-color: white;" class="product-media">
                                            @if($product->stock==0)<span class="product-label label-out">Tükendi</span>
                                            @elseif($product->stock<6 && $product->stock!=0)<span style="background-color: brown" class="product-label label-out">Tükeniyor</span>@endif
                                            <div class="d-flex justify-content-center">
                                            <a href="{{route('single.product',$product->id)}}">
                                                <img style="width: auto;height: 200px;" src="{{asset('public_directory')}}/image/products/{{$product->images[0]->image}}" alt="Product image" class="product-image">
                                            </a></div>
                                            <div class="product-action">
                                                <a href="{{route('single.product',$product->id)}}" class="btn-product btn-cart"><span>Ürünü İncele</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$product->categories->name}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{route('single.product',$product->id)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                {{$product->price}}TL
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( {{$product->images->count()}} Resim )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-lg-4 -->
                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item-total">of 6</li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1" class="">
                                        Tüm Kategoriler
                                    </a>
                                </h3><!-- End .widget-title -->
                                <form method="GET" action="">

                                <div class="collapse show" id="" style="overflow-y: auto;height: 300px">

                                    <div class="widget-body">

                                        @php $categoryIndex=0; @endphp
                                        @foreach($data['categories_all'] as $category)

                                        <div class="filter-items filter-items-count">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input  name="category[]" @if($category->products->count()==0) disabled @endif  type="checkbox"  value="{{$category->id}}"
                                                            @php if(request()->get('category')[$categoryIndex]==$category->id){echo "checked"; $categoryIndex++;}  @endphp
                                                            class="custom-control-input" id="cat-{{$loop->iteration}}">
                                                    <label class="custom-control-label" for="cat-{{$loop->iteration}}">{{$category->name}}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{$category->products->count()}}</span>
                                            </div><!-- End .filter-item -->
                                        </div><!-- End .filter-items -->

                                        @endforeach

                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                                    <div class="col-md-12"><div class="row"> <div class="form-group col-md-6 mt-1"><input class="form-control" placeholder="min" name="min" type="number"></div><div class="form-group col-md-6 mt-1"><input class="form-control" name="max" placeholder="max" type="number"></div></div> </div>
                                <button type="submit" class="btn btn-outline-dark mt-1 col-md-12">Filtrele</button>
                                </form>
                            </div><!-- End .widget -->


                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>
@endsection
@section('css') @endsection
@section('js')@endsection
