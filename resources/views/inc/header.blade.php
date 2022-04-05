<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="https://yandex.ru/maps/-/CCUBf8XJgA" target="_blank"><i class="fa fa-envelope-o"></i> korchow@sluicee.space</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Ижевск, Ленина, 68</a></li>
            </ul>
            <ul class="header-links pull-right">
                @if (Auth::check())
                    <li><a href="{{route('user.profile')}}"><i class="fa fa-user-o"></i> {{Auth::user()->name}}</a></li>
                    <li><a href="{{route('user.logout')}}"><i class="fa fa-user-o"></i> Выход</a></li>
                @else
                    <li><a type="button" data-toggle="modal" data-target="#loginFormModal"><i class="fa fa-user-o"></i> Авторизация</a></li>
                    <li><a type="button" data-toggle="modal" data-target="#registerFormModal"><i class="fa fa-user-o"></i> Регистрация</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="/img/logo.svg" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <div>
                            <input class="input" placeholder="Поиск..." id="search_input">
                            <a href="" onclick="this.href='{{route('catalog', '')}}?search='+document.getElementById('search_input').value"><button class="search-btn">Найти</button></a>
                        </div>
                    </div>
                </div>
                <!-- /SEARCH BAR -->
                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="{{route('wishlist.list')}}">
                                <i class="fa fa-heart-o"></i>
                                <span>Желаемое</span>
                                <div class="qty">
                                    @if (session('wishlist'))
                                        {{count(session('wishlist'))}}
                                    @else
                                        0
                                    @endif
                                </div>
                            </a>
                        </div>
                        <!-- /Wishlist -->
                        <!-- Cart -->
                        <div class="dropdown">
                            <a href="{{route('cart.list')}}">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Корзина</span>
                                <div class="qty">
                                    @if (session('cart'))
                                        {{count(session('cart'))}}
                                    @else
                                        0
                                    @endif
                                </div>
                            </a>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Меню</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
