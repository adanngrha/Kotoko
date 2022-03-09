<!-- HEADER -->
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
                @auth
                @if(Auth::user()->hasRole('buyer'))
                <li style="color: white"> Hola, {{ Auth::user()->username }}!</li>
                @if (!request()->routeIs('account'))
                <li><a href="{{ url('/account') }}"><i class="fa fa-user-o"></i> Profile</a></li>
                @endif
                @elseif(Auth::user()->hasRole('seller'))
                <li style="color: white"> Hola, Seller!</li>
                @endif
                <li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                @else
                <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a></li>
                <li><a href="{{route('register')}}"><i class="fa fa-user-o"></i> Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->

        @if (request()->routeIs('home') || request()->routeIs('search') || request()->routeIs('category') || request()->routeIs('product'))
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="/" class="logo">
                            <img src="{{ asset("electro/img/logo.png") }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->
                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="/search">
                            @csrf
                            <select class="input-select" name="category">
                                <option value="all">All Categories</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input class="input" type="text" placeholder="Search here" name="search" value="{{ request('search') ? request('search') : old('search')}}">
                            <button class="search-btn" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="/wishlist">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Wishlist</span>
                                    <div class="qty">2</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Cart</span>
                                    <div class="qty">3</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ asset('electro/img/product01.png') }}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>

                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{ asset('electro/img/product02.png') }}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-summary">
                                        <small>3 Item(s) selected</small>
                                        <h5>SUBTOTAL: $2940.00</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="{{url('view-cart')}}">View Cart</a>
                                        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                   <!-- /ACCOUNT -->

                @else
                <div class="container">
                    <div class="row">
                        <!-- LOGO -->
                        <div class="col-md-12">
                            <div class="header-logo" style="justify-content: center">
                                @guest
                                <a href="/" class="logo">
                                    <img src="{{ asset('electro/img/logo.png') }}" alt="">
                                </a>
                                @endguest
                                @auth
                                @if(Auth::user()->hasRole('seller') || Auth::user()->hasRole('admin'))
                                <a href="#" class="logo">
                                    <img src="{{ asset('electro/img/logo.png') }}" alt="">
                                </a>
                                @else
                                <a href="/" class="logo">
                                    <img src="{{ asset('electro/img/logo.png') }}" alt="">
                                </a>
                                @endif
                                @endauth
                            </div>
                        </div>
                        <!-- /LOGO -->
                    </div>
                </div>
                @endif
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
