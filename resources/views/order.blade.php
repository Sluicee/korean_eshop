@extends('layouts.app')
@section('title-block')Заказ #{{$order->id}} @endsection

@section('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <h4>Заказ #{{$order->id}} </h4>
                <div>
                    <h4>Куда: </h4><p>{{$order->country}}, {{$order->city}}, {{$order->address}}</p>
                </div>
                <div>
                    <h4>Получатель: </h4><p>{{$order->familiya}}, {{$order->imya}}, {{$order->otchestvo}}</p>
                </div>
                <div>
                    <h4>Статус: </h4><p>{{$order->status}}</p>
                </div>
                <div>
                    <h4>Оформлен: </h4><p>{{$order->created_at}}</p>
                </div>
            </div>
            <div class="col-md-8">
                <h4>Состав заказа:</h4>
                @foreach ($cart as $item)
                    @php
                        $image = $item['image'];
                        $total = 0;
                    @endphp
                    <div class="card mb-3 border rounded-lg" style="max-width: 540px;">
                        <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset("storage/image/$image")}}" class="card-img" alt="cart item" style="width: 180px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">{{$item['name']}}</h5>
                            <p class="card-text">Количество: {{$item['quantity']}}</p>
                            <p class="card-text">Цена за 1шт: {{$item['price'] * ($item['sale'] /100)}}</p>
                            <p class="card-text">Стоимость: {{$item['quantity'] * $item['price'] * ($item['sale'] /100)}}</p>
                            </div>
                        </div>
                        </div>
                        @php
                            $total += $item['quantity'] * $item['price'] * ($item['sale'] /100);
                        @endphp
                    </div>
                @endforeach
                <h3>Сумма: {{$total}}</h3>
            </div>
            
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection