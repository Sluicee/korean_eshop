@extends('layouts.app')
@section('title-block'){{Auth::user()->name}} @endsection

@section('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <h2>Заказы</h2>
            <table id="cart" class="dataTable table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Номер заказа</th>
                        <th>Статус</th>
                        <th>Статус оплаты</th>
                        <th>Сумма</th>
                        <th>Оформлен</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td><a href="{{route('get_order', $order->id)}}">Заказ #{{$order->id}}</a></td>
                        @if ($order->status == 'В обработке')
                            <td class="alert-primary">{{$order->status}}</td>
                        @elseif ($order->status == 'Отменён')
                            <td class="alert-danger">{{$order->status}}</td>
                        @else
                            <td class="alert-success">{{$order->status}}</td>
                        @endif
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->total_price}} руб.</td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection