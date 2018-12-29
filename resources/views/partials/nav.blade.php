<nav class="main fixed pin-t w-full bg-white shadow-md z-10" smooth-scroll>
    <div class="flex flex-col lg:flex-row container px-0">
        <div class="flex flex-shrink py-4 items-center">
            <a class="flex-1 text-center" href="/#" title="{{ config('app.name') }}">
                <img src="{{ asset('img/logo@2x.png') }}" alt="{{ config('app.name') }} Logo" class="h-7 lg:h-10" />
            </a>
        </div>

        <div class="flex-1 border-t border-b border-grey-lighter lg:border-none">
            <ul itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                {{-- <li itemprop="name"><a itemprop="url" href="/#" title="Home">Home</a></li> --}}
                <li itemprop="name">
                    <a itemprop="url" href="{{ route('talks') }}" title="Talks given at {{ config('app.name') }}">Talks</a>
                </li>
                <li itemprop="name">
                    <a itemprop="url" href="/#slack-invite" title="{{ config('app.name') }} Community">Community</a>
                </li>
                <li itemprop="name">
                    <a itemprop="url" href="/#learning-track" title="Learn">Learn</a>
                </li>
                {{--<li itemprop="name"><a itemprop="url" href="{{ route('contribute') }}" title="Contribute to {{ config('app.name') }}">Contribute</a></li>--}}
                {{-- <li itemprop="name"><a itemprop="url" href="https://larajobs.com?partner=1844" title="{{ config('app.name') }} Jobs">Jobs</a></li> --}}
                <li itemprop="name">
                    <a itemprop="url" href="https://medium.com/laravelnigeria" title="{{ config('app.name') }} Blog">Blog</a>
                </li>
                <li itemprop="name">
                    <a itemprop="url" href="#" onclick="toggleContactModal();return false;" title="Contact us">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
