@extends('layouts.app')
@section('title-block')Политика конфеденциальности @endsection

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-6">
                <h3>Контакты</h3>
                <p>Адресс: <a href="https://yandex.ru/maps/-/CCUBf8XJgA" target="_blank">Россия, Ижевск, Ленина 68</a></p>
                <p>Режим работы: <span>Ежедневно с 9:00 до 20:00 МСК</span></p>
                <p>Email: <span>korchow@sluicee.space</span></p>
                <p>Телефон: <span><i class="fa fa-phone"></i> +021-95-51-84</span></p>
            </div>
            
            <div class="item col-md-6 map-full padding0">
                <div class="right_block_store contacts_map">
                    <div class="bx-yandex-view-layout swipeignore">
                        <div class="bx-yandex-view-map">
                            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A0e36c754c8ee9528286046f255ce7b2ece91b0c91f77146c5a388530ecb6d3bf&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
                        </div>
                        <div class="yandex-map__mobile-opener"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection