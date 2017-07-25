<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}" title="{{ config('app.name') }}">
                <img src="{{ asset('img/logo@2x.png') }}" alt="{{ config('app.name') }} Logo" />
            </a>
        </div>

        <div class="le-navigation">
            <ul class="nav navbar-nav" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                {{--<li itemprop="name"><a itemprop="url" href="{{ route('contribute') }}" title="Contribute to {{ config('app.name') }}">Contribute</a></li>--}}
                <li itemprop="name"><a itemprop="url" href="{{ route('index') }}" title="Home">Home</a></li>
                <li itemprop="name"><a itemprop="url" href="{{ route('talks') }}" title="Talks given at {{ config('app.name') }}">Talks</a></li>
                <li itemprop="name"><a itemprop="url" href="/#slack-invite" title="{{ config('app.name') }} Community">Community</a></li>
                <li itemprop="name"><a itemprop="url" href="/#learning-track" title="Learn">Learn</a></li>
                <li itemprop="name"><a itemprop="url" href="https://larajobs.com?partner=1844" title="{{ config('app.name') }} Jobs" target="_blank">Jobs</a></li>
                <li itemprop="name"><a itemprop="url" href="https://medium.com/laravelnigeria" title="{{ config('app.name') }} Blog">Blog</a></li>

                @if (Auth::user())
                    <li class="dropdown hidden-xs hidden-sm">
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
                @endif
            </ul>
        </div>
    </div>
</nav>