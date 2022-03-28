@extends('layouts.app')
@section('title-block')Checkout @endsection

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Оформление заказа</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="{{route('home')}}">Главная</a></li>
                    <li class="active">Оформление заказа</li>
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
            <form action="{{route('pass_checkout')}}" method="post">
            @csrf
            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Адрес доставки</h3>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="familiya" placeholder="Фамилия" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="imya" placeholder="Имя" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="otchestvo" placeholder="Отчество (при наличии)">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="address" placeholder="Адрес" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="city" placeholder="Город" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="country" placeholder="Страна" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="zipcode" placeholder="Почтовый индекс" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="tel" placeholder="Телефон" required>
                    </div>
                    <div class="form-group">
                        <div class="input-checkbox">
                            <input type="checkbox" id="create-account">
                            <label for="create-account">
                                <span></span>
                                Сохранить адрес?
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /Billing Details -->

                <!-- Order notes -->
                <div class="order-notes">
                    <textarea name="notes" class="input" placeholder="Дополнительная информация"></textarea>
                </div>
                <!-- /Order notes -->
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Ваш заказ</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>Товар</strong></div>
                        <div><strong>Стоимость</strong></div>
                    </div>
                    <div class="order-products">
                        @php $total = 0 @endphp
                        @if (session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @if ($details['sale']!=0)
                                    @php $total += $details['price'] * ($details['sale'] / 100) * $details['quantity'] @endphp
                                @else
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endif
                                <div class="order-col">
                                    <div>{{$details['quantity']}}x {{$details['name']}}</div>
                                    @if ($details['sale']!=0)
                                        <div>{{ $details['price'] * ($details['sale'] / 100) * $details['quantity'] }} руб.</div>
                                    @else
                                        <div>{{ $details['price'] * $details['quantity'] }} руб.</div>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="order-col">
                        <div>Доставка</div>
                        <div><strong>БЕСПЛАТНО</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>ИТОГО</strong></div>
                        <div><strong class="order-total">{{$total}} руб.</strong></div>
                    </div>
                    <input type="hidden" name="total_price" value="{{$total}}">
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-1">
                        <label for="payment-1">
                            <span></span>
                            Онлайн
                        </label>
                        <div class="caption">
                            <p>Вы будете перенаправлены на страницу оплаты</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2">
                        <label for="payment-2">
                            <span></span>
                            При получении
                        </label>
                        <div class="caption">
                            <p>Оплата курьеру при получении</p>
                        </div>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        Я прочитал <a href="#">условия</a>
                    </label>
                </div>
                <button type="submit" class="primary-btn order-submit">Заказать</button>
            </div>
            <!-- /Order Details -->
        </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection