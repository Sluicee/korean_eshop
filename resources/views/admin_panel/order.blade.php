@extends('layouts.admin')
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
                <hr>
                <div>
                    <h4>Куда: </h4><p>{{$order->address}}</p>
                </div>
                <div>
                    <h4>Получатель: </h4><p>{{$order->fio}}</p>
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
                @php
                    $total = 0;
                @endphp
                @foreach ($cart as $item)
                    @php
                        $image = $item['image'];
                    @endphp
                    <div class="card mb-3 border rounded-lg" style="max-width: 540px;">
                        <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset("/storage/image/$image")}}" class="card-img" alt="cart item" style="width: 180px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">{{$item['name']}}</h5>
                            <p class="card-text">Количество: {{$item['quantity']}}</p>
                            <p class="card-text">Цена за 1шт: {{$item['price'] - $item['price'] * ($item['sale'] /100)}}</p>
                            <p class="card-text">Стоимость: {{$item['quantity'] * ($item['price'] - $item['price'] * ($item['sale'] /100))}}</p>
                            </div>
                        </div>
                        </div>
                        @php
                            $total += $item['quantity'] * ($item['price'] - $item['price'] * ($item['sale'] /100));
                        @endphp
                    </div>
                @endforeach
                <hr>
                <h3>Сумма: {{$total}}</h3>

                
            </div>
            <div class="buttons">
                @if ($order->status == 'В обработке')
                    <a class="alert alert-primary" href="{{route('admin.approveOrder', $order->id)}}">Подтвердить</a>
                    <a class="alert alert-danger" href="{{route('admin.rejectOrder', $order->id)}}">Отклонить</a>
                @elseif ($order->status == 'Подтверждён')
                    <a class="alert alert-success" href="{{route('admin.sendOrder', $order->id)}}">Отправить</a>
                    <a class="alert alert-danger" href="{{route('admin.rejectOrder', $order->id)}}">Отклонить</a>
                @else
                    <a class="alert alert-danger" href="{{route('admin.rejectOrder', $order->id)}}">Отклонить</a>
                @endif
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection