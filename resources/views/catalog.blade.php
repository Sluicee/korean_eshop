@extends('layouts.app')
@section('title-block')Store @endsection

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{route('home')}}">Главная</a></li>
                    <li class="active">Каталог</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Категории</h3>
                    <div class="checkbox-filter">
                        <a href="{{route('catalog')}}">
                            <button type="button" class="btn btn-light mt-3" style="margin-top: 3px">Все</button>
                        </a>
                        @foreach ($categories as $cat)
                            <a href="{{route('catalog', "category=$cat->id")}}">
                                @if (app('request')->input('category') == "$cat->id")
                                    <button type="button" class="btn btn-info" style="margin-top: 3px">{{$cat->name}}<small>({{$cat->products_count}})</small></button>
                                @else
                                    <button type="button" class="btn btn-light" style="margin-top: 3px">{{$cat->name}}<small>({{$cat->products_count}})</small></button>
                                @endif
                            </a>
                        @endforeach
                        

                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Цена</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                    <a href="" onclick="this.href='{{request()->fullUrlWithQuery(['' => ''])}}&min_price='+document.getElementById('price-min').value+'&max_price='+getElementById('price-max').value" class="btn btn-info">Поиск</a>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Рекомендуем</h3>
                    @foreach ($recs as $item)
                        <div class="product-widget">
                            <div class="product-img">
                                @php
                                    $imageURL = $item->images[0]->url;
                                @endphp
                                <img src="{{asset("storage/image/$imageURL")}}" alt="">
                            </div>
                            <div class="product-body">
                                @if (App\Models\Category::find($item->category) != null)
                                    <p class="product-category">{{ App\Models\Category::find($item->category)->name }}</p>
                                    <h3 class="product-name"><a href="{{route('open-product', [App\Models\Category::find($item->category)->name, $item->id])}}">{{ $item->name }}</a></h3>
                                @else
                                    <p class="product-category">NO CATEGORY</p>
                                    <h3 class="product-name"><a href="{{route('open-product', ["no", $item->id])}}">{{ $item->name }}</a></h3>
                                @endif
                                @if ($item->sale != 0)
                                    <h4 class="product-price">{{$item->price - $item->price * ($item->sale / 100)}} руб.  <del class="product-old-price">{{$item->price}} руб.</del></h3>
                                @else
                                    <h4 class="product-price">{{$item->price}} руб.</h3>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                {{-- <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div> --}}
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    @foreach ($data as $item)
                        <!-- product -->
                        @include('inc.product_card')
                        <!-- /product -->
                    @endforeach
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Отображается {{$data->count()}} из {{ $data->total() }} товаров.</span>
                    <ul class="store-pagination">
                        {{$data->links()}}
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection