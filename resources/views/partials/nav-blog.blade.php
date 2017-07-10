<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}" title="{{ config('app.name') }}">
                <img src="{{ asset('img/logo@2x.png') }}" alt="{{ config('app.name') }} Logo" />
            </a>
        </div>

        <div class="le-navigation">
            <ul class="nav navbar-nav" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <li itemprop="name"><a itemprop="url" href="{{ route('home') }}" title="Go back to the {{ config('app.name') }} home">Home</a></li>

                @if ($featuredCategories ?? false)
                    @foreach ($featuredCategories as $category)
                    <li itemprop="name"><a itemprop="url" href="{{ route('blog.category', ['slug' => str_slug($category->name)]) }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
                    @endforeach
                @endif

                {{-- @if (Auth::user())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif --}}
            </ul>
        </div>
    </div>
</nav>