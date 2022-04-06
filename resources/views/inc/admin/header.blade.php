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

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">

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
