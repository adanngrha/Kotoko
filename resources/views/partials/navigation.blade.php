<!-- NAVIGATION -->
    <nav id="navigation">
        @php
            $categories = App\Models\Category::all();
        @endphp
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    @foreach ($categories as $category)
                        <li><a href="/category/{{ $category->slug }}" class="@if (Request::is('category/{{ $category->slug }}'))
                            'active'
                        @endif">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->
