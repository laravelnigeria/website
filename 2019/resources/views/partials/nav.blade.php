<nav id="navigation-bar" class="navbar navbar-expand-lg navbar-dark sticky-offset">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <div class="logo" style="background-image: url({{ asset('img/logo.png') }});"></div>
            <span class="logoword">{{ config('app.name') }}</span>
        </a>

        <svg data-toggle="collapse" data-target="#navDropdown" class="ham hamRotate ham1" viewBox="0 0 100 100" width="50" onclick="this.classList.toggle('active')">
            <path class="line top" d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
            <path class="line middle" d="m 30,50 h 40" />
            <path class="line bottom" d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
        </svg>

        <div class="collapse navbar-collapse" id="navDropdown">
            <ul class="navbar-nav ml-auto" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <li class="nav-item" itemprop="name">
                    <a itemprop="url" class="nav-link" href="{{ route('code-of-conduct') }}">Code of conduct</a>
                    <span class="dots">&#9679;</span>
                </li>
            </ul>
        </div>
    </div>
</nav>
