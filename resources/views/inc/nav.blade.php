<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="{{ Route::currentRouteNamed('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Главная</a></li>
                <li class="{{ Route::currentRouteNamed('catalog') ? 'active' : '' }}"><a href="{{ route('catalog') }}">Каталог</a></li>
                <li class="{{ Route::currentRouteNamed('about') ? 'active' : '' }}"><a href="{{ route('about') }}">О магазине</a></li>
                <li class="{{ Route::currentRouteNamed('contacts') ? 'active' : '' }}"><a href="{{ route('contacts') }}">Контакты</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
