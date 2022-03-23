<div class="col-md-4 col-xs-6">
    <div class="product">
        <div class="product-img">
            @php
                $imageURL = $item->images[0]->url;
            @endphp
            <img src="{{asset("storage/image/$imageURL")}}" alt="">
            <div class="product-label">
                @if ($item->sale != 0)
                    <span class="sale">-{{ $item->sale }}%</span>
                @endif
                @if (\Carbon\Carbon::parse($item->created_at)->diffInDays() <= 7)
                    <span class="new">NEW</span>
                @endif
            </div>
        </div>
        <div class="product-body">
            @if (Request::route()->getName() == "open-product")
                <p class="product-category">{{ $item->name }}</p>
                <h3 class="product-name"><a href="{{route('open-product', [$item->name, $item->id])}}">{{ $item->name }}</a></h3>
            @else
                <p class="product-category">{{ App\Models\Category::find($item->category)->name }}</p>
                <h3 class="product-name"><a href="{{route('open-product', [App\Models\Category::find($item->category)->name, $item->id])}}">{{ $item->name }}</a></h3>
            @endif
            @if ($item->sale != 0)
                <h4 class="product-price">{{$item->price * ($item->sale / 100)}} руб.  <del class="product-old-price">{{$item->price}} руб.</del></h3>
            @else
                <h4 class="product-price">{{$item->price}} руб.</h3>
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
        <div class="add-to-cart">
            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
        </div>
    </div>
</div>