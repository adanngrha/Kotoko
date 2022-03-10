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
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                        <div class="col-md-3">
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
                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        @php
                            $user = App\Models\User::find(auth()->id());
                            $wishlist = count(App\Models\Wishlist::where('user_id', $user->id)->get());
                            $cart = count(App\Models\Cart::where('user_id', $user->id)->get());
                            $user->load('cart');
                            $carts = $user->cart;
                            $categories = App\Models\Category::all();
                        @endphp
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
                            @auth
                            <!-- Wishlist -->
                            <div>
                                <a href="/wishlist">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Wishlist</span>
                                    <div class="qty">{{ $wishlist }}</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Cart</span>
                                    <div class="qty">{{ $cart }}</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @forelse ($carts as $one_cart)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="https://source.unsplash.com/300x300/?{{ $one_cart->category->slug }}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name">{{ $one_cart->name }}</h3>
                                                <h4 class="product-price"><span class="qty">{{ $qty = $one_cart->pivot->quantity }}x</span>IDR {{ number_format( $pr = $one_cart->price, 2) }}</h4>
                                            </div>
                                            {{-- <button class="delete"><i class="fa fa-close"></i></button> --}}
                                        </div>
                                        @php
                                            $p = $pr * $qty;
                                            $total += $p;
                                        @endphp
                                        @empty
                                            <div class="text-center">There's no product yet.</div>
                                        @endforelse
                                    </div>
                                    <div class="cart-summary">
                                        <small>{{ $cart }} Item(s) selected</small>
                                        <h5>SUBTOTAL: IDR {{ number_format($total, 2) }}</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="{{ url('view-cart') }}">View Cart</a>
                                        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->
                            @endauth
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
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
