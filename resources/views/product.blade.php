@extends('layouts.app')
@section('title-block'){{$product->name}} @endsection

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
                    <li><a href="{{route('catalog')}}">Каталог</a></li>
                    @if (App\Models\Category::find($product->category) != null)
                        <li><a href="{{route('catalog', "category=$product->category")}}">{{App\Models\Category::find($product->category)->name}}</a></li>
                    @else
                        <li><a href="#">-</a></li>
                    @endif
                    <li class="active">{{$product->name}}</li>
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
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    @foreach ($product->images as $image)
                    <div class="product-preview">
                        <img src="{{asset("storage/image/$image->url")}}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    @foreach ($product->images as $image)
                    <div class="product-preview">
                        <img src="{{asset("storage/image/$image->url")}}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$product->name}}</h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Review(s) | Add your review</a>
                    </div>
                    <div>
                        @if ($product->stock)
                            @if ($product->sale != 0)
                                <h3 class="product-price">{{$product->price * ($product->sale / 100)}} руб.  <del class="product-old-price">{{$product->price}} руб.</del></h3>
                            @else
                                <h3 class="product-price">{{$product->price}} руб.</h3>
                            @endif
                            <span class="product-available">В наличии</span>
                        @else
                            <del class="product-price">Нет в наличии</del>
                        @endif
                    </div>
                    <p>{!!$product->short_description!!}</p>

                    @if ($product->stock)
                        <form action="{{route('cart.store', $product->id)}}" method="post">
                            @csrf    
                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Количество
                                    <div class="input-number">
                                        <input type="number" name='qty_to_cart' value='1'>
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> в корзину</button>
                            </div>
                        </form>
                        <ul class="product-btns">
                            <li><a href="{{route('wishlist.store', $product->id)}}"><i class="fa fa-heart-o"></i> добавить в желаемое</a></li>
                        </ul>
                    @else 
                        <div class="add-to-cart">
                            <a href="{{route('wishlist.store', $product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-heart-o"></i> в желаемое</button></a>
                        </div>
                    @endif                    

                    <ul class="product-links">
                        <li>Category:</li>
                        @if (App\Models\Category::find($product->category) != null)
                            <li><a href="#">{{App\Models\Category::find($product->category)->name}}</a></li>
                        @else
                            <li><a href="#">-</a></li>
                        @endif
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Описание</a></li>
                        <li><a data-toggle="tab" href="#tab3">Отзовы ({{count($reviews)}})</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{!!$product->description!!}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>{{round($product->rating, 1)}}</span>
                                            <div class="rating-stars">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < $product->rating)
                                                        <i class="fa fa-star"></i>
                                                    @else
                                                        <i class="fa fa-star-o"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            @php
                                                $ratings = array();
                                                foreach ($reviews as $item) {
                                                    array_push($ratings, $item->rating);
                                                }
                                                $array = array(3,3,2,3,3,1,3,4,5);

                                                function array_avg($array, $round=1){
                                                    $num = count($array);
                                                    return array_map(
                                                        function($val) use ($num,$round){
                                                            return array('count'=>$val,'avg'=>round($val/$num*100, $round));
                                                        },
                                                        array_count_values($array)
                                                    );
                                                }

                                                $avgs = array_avg($ratings);
                                            @endphp
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 
                                                    @if (array_key_exists(5, $avgs))
                                                        {{$avgs[5]['avg']}}%
                                                    @else
                                                        0%
                                                    @endif
                                                    "></div>
                                                </div>
                                                <span class="sum">
                                                    @if (array_key_exists(5, $avgs))
                                                        {{$avgs[5]['count']}}
                                                    @else
                                                        0
                                                    @endif</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 
                                                    @if (array_key_exists(4, $avgs))
                                                        {{$avgs[4]['avg']}}%
                                                    @else
                                                        0%
                                                    @endif
                                                    "></div>
                                                </div>
                                                <span class="sum">
                                                    @if (array_key_exists(4, $avgs))
                                                        {{$avgs[4]['count']}}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 
                                                    @if (array_key_exists(3, $avgs))
                                                        {{$avgs[3]['avg']}}%
                                                    @else
                                                        0%
                                                    @endif
                                                    "></div>
                                                </div>
                                                <span class="sum">
                                                    @if (array_key_exists(3, $avgs))
                                                        {{$avgs[3]['count']}}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 
                                                    @if (array_key_exists(2, $avgs))
                                                        {{$avgs[2]['avg']}}%
                                                    @else
                                                        0%
                                                    @endif
                                                    "></div>
                                                </div>
                                                <span class="sum">
                                                    @if (array_key_exists(2, $avgs))
                                                        {{$avgs[2]['count']}}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 
                                                    @if (array_key_exists(1, $avgs))
                                                        {{$avgs[1]['avg']}}%
                                                    @else
                                                        0%
                                                    @endif
                                                    "></div>
                                                </div>
                                                <span class="sum">
                                                    @if (array_key_exists(1, $avgs))
                                                        {{$avgs[1]['count']}}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            @foreach ($reviews as $item)
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">{{$item->author}}</h5>
                                                    <p class="date">{{$item->created_at}}</p>
                                                    <div class="review-rating">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if ($i < $item->rating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>{{$item->review}}</p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <ul class="reviews-pagination">
                                            {{$reviews->links()}}
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        @if (Auth::check())
                                            <form class="review-form" action="{{route('uploadReview', $product->id)}}" method="POST">
                                                @csrf
                                                <textarea class="input" placeholder="Ваш отзыв" name="review_text"></textarea>
                                                <div class="input-rating">
                                                    <span>Оценка: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                        <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                        <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                        <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                        <input id="star1" name="rating" value="1" type="radio" checked><label for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Отправить</button>
                                            </form>
                                        @else
                                            <a type="button" class="primary-btn" data-toggle="modal" data-target="#loginFormModal"> Войти, чтобы оставить отзыв</a>
                                        @endif
                                        
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Похожие продукты:</h3>
                </div>
            </div>

            {{-- TODO: --}}

            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                @foreach ($sameProducts as $item)
                                    @if ($item->category == $product->category and $item->id != $product->id)
                                        @include('inc.product_card')
                                    @endif
                                @endforeach 
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

@endsection