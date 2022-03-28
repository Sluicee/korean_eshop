<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                @if (Auth::check())
                    <li><a href="{{route('user.profile')}}"><i class="fa fa-user-o"></i> {{Auth::user()->name}}</a></li>
                    <li><a href="{{route('user.logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>
                @else
                    <li><a type="button" data-toggle="modal" data-target="#loginFormModal"><i class="fa fa-user-o"></i> Login</a></li>
                    <li><a type="button" data-toggle="modal" data-target="#registerFormModal"><i class="fa fa-user-o"></i> Register</a></li>
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
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
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
