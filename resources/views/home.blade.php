@extends('layouts.app')
@section('title-block')Главная @endsection

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop01.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Свежая<br>Кимчхи</h3>
                        <a href="{{route('catalog', 'category=2')}}" class="cta-btn">Выбрать <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop03.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Лапша<br>Nongshim</h3>
                        <a href="{{route('catalog', 'category=1')}}" class="cta-btn">Выбрать <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop02.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Рисовые<br>клёцки</h3>
                        <a href="{{route('catalog', 'category=4')}}" class="cta-btn">Выбрать <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">НОВИНКИ</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                @foreach ($data as $item)
                                <!-- product -->
                                @if (\Carbon\Carbon::parse($item->created_at)->diffInDays() <= 7)
                                @include('inc.product_card')
                                @endif
                                <!-- /product -->
                                @endforeach
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>-40</h3>
                                <span>%</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>-50</h3>
                                <span>%</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>-60</h3>
                                <span>%</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>-70</h3>
                                <span>%</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">ПРЕДЛОЖЕНИЕ НЕДЕЛИ</h2>
                    <p>СКИДКИ ДО 70% НА ЛАПШУ И НАПИТКИ</p>
                    <a class="primary-btn cta-btn" href="{{route('catalog')}}">Купить</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Лучшие предложения</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Лапша</a></li>
                            <li><a data-toggle="tab" href="#tab3">Рис, токпокки</a></li>
                            <li><a data-toggle="tab" href="#tab4">Кимчхи</a></li>
                            <li><a data-toggle="tab" href="#tab5">Напитки</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                @foreach ($data as $item)
                                <!-- product -->
                                @if ($item->category == 1)
                                    @include('inc.product_card')
                                @endif
                                <!-- /product -->
                                @endforeach
                            </div>
                        </div>
                        <div id="tab3" class="tab-pane fade in">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                @foreach ($data as $item)
                                <!-- product -->
                                @if ($item->category == 4)
                                    @include('inc.product_card')
                                @endif
                                <!-- /product -->
                                @endforeach
                            </div>
                        </div>
                        <div id="tab4" class="tab-pane fade in">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                @foreach ($data as $item)
                                <!-- product -->
                                @if ($item->category == 2)
                                    @include('inc.product_card')
                                @endif
                                <!-- /product -->
                                @endforeach
                            </div>
                        </div>
                        <div id="tab5" class="tab-pane fade in">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                @foreach ($data as $item)
                                <!-- product -->
                                @if ($item->category == 10)
                                    @include('inc.product_card')
                                @endif
                                <!-- /product -->
                                @endforeach
                            </div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


@endsection