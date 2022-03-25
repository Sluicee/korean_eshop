@extends('layouts.app')
@section('title-block')Желаемое @endsection

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
                    <li class="active">Желаемое</li>
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
            <!-- store products -->
            <div class="row">
                @if(session('wishlist'))
                        @foreach(session('wishlist') as $id => $details)
                        <div class="col-md-3 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    @php
                                        $imageURL = $details['image'] ;
                                    @endphp
                                    <img src="{{asset("storage/image/$imageURL")}}" alt="">
                                    <div class="product-label">
                                        @if ($details['sale'] != 0)
                                            <span class="sale">-{{ $details['sale'] }}%</span>
                                        @endif
                                        @if (\Carbon\Carbon::parse($details['created_at'])->diffInDays() <= 7)
                                            <span class="new">NEW</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{ $details['category']->name }}</p>
                                    <h3 class="product-name"><a href="{{route('open-product', [$details['category']->name, $details['product_id']])}}">{{ $details['name'] }}</a></h3>
                                    @if ($details['sale'] != 0)
                                        <h4 class="product-price">{{$details['price'] * ($details['sale'] / 100)}} руб.  <del class="product-old-price">{{$details['price']}} руб.</del></h3>
                                    @else
                                        <h4 class="product-price">{{$details['price']}} руб.</h3>
                                    @endif
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
            </div>
            <!-- /store products -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection