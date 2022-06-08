@extends('layouts.app')
@section('title-block')Cart @endsection

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Цена</th>
                        <th>Скидка</th>
                        <th>Количество</th>
                        <th class="text-center">Стоимость</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @if ($details['sale']!=0)
                                @php $total += ($details['price'] - $details['price'] * ($details['sale'] / 100)) * $details['quantity'] @endphp
                            @else
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endif
                            @php $image = $details['image'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs"><img src="{{asset("storage/image/$image")}}" width="100" height="100" class="img-responsive"/></div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">{{ $details['price'] }} руб.</td>
                                @if ($details['sale']!=0)
                                    <td data-th="Price">{{ $details['sale'] }}% </td>
                                @else
                                    <td data-th="Price">-</td>
                                @endif
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                </td>
                                @if ($details['sale']!=0)
                                    <td data-th="Subtotal" class="text-center">{{ ($details['price'] - $details['price'] * ($details['sale'] / 100)) * $details['quantity'] }} руб.</td>
                                @else
                                    <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} руб.</td>
                                @endif
                                <td class="actions" data-th="">
                                    <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-right"><h3><strong>Общая стоимость: {{ $total }} руб.</strong></h3></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-right">
                            <a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Продолжить покупки</a>
                            @if (session('cart') != [])
                                @if(Auth::check())
                                    <a href="{{ route('checkout') }}" class="btn btn-success"><i class="fa fa-angle-right"></i> Перейти к оформлению</a>
                                @else
                                    <a class="btn btn-success" type="button" data-toggle="modal" data-target="#loginFormModal"><i class="fa fa-angle-right"></i> Перейти к оформлению</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection