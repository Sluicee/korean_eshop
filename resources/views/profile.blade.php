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
            <table id="cart" class="table table-hover table-condensed">
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
                        <td class="btn btn-info">{{$order->status}}</td>
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