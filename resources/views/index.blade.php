@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbo">
        <div class="green-overlay">&nbsp;</div>
        <div class="container">
            <span class="event">
                Building world class applications &mdash; <span class="date">July 15, 2017</span>
                <span class="hidden-xs">@ <span class="location">Lagos, Nigeria</span></span>
            </span>
            <h1>Bringing together the brightest PHP and Laravel developers in Nigeria</h1>
            <a class="btn btn-lg btn-block cta" href="#" title="Get free tickets">Get your free ticket</a>
            <span class="guests-count">407 people are attending the event.</span>
        </div>
    </div>

    <section class="section speakers" id="ln-speakers">
        <div class="container">
            <div class="title-subtitle">
                <h2>Meet the Speakers</h2>
                <h4 class="subtitle">Awesome people giving talks at the Laravel Nigeria meetup.</h4>
            </div>
            <div class="list">
                <div class="row speaker">
                    <div class="col col-xs-12 col-sm-4 col-md-4 col-lg-4 profile-wrapper">
                        <div class="photo">
                            <img src="{{ asset('img/photo-placeholder.png') }}" alt="Speaker name" />
                        </div>
                        <div class="profile">
                            <ul>
                                <li class="name">Neo Ighodaro</li>
                                <li class="position">CTO, Hotels.ng</li>
                                <li class="social">
                                    <a href="#" title="Follow on Facebook" target="_blank">
                                        <svg class="icon"><use xlink:href="{{ asset('/img/sprite.svg#icon-fb') }}"/></svg>
                                    </a>
                                    <a href="#" title="Follow on Twitter" target="_blank">
                                        <svg class="icon"><use xlink:href="{{ asset('/img/sprite.svg#icon-tw') }}"/></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-xs-12 col-sm-7 col-md-8 col-lg-6 topic-wrapper">
                        <h3>Lean controllers with Vue</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
                <div class="row speaker">
                    <div class="col col-xs-12 col-sm-4 col-md-4 col-lg-4 profile-wrapper">
                        <div class="photo">
                            <img src="{{ asset('img/photo-placeholder.png') }}" alt="Chris Nwamba" />
                        </div>
                        <div class="profile">
                            <ul>
                                <li class="name">Chris Nwamba</li>
                                <li class="position">Deepstream Hub</li>
                                <li class="social">
                                    <a href="#" title="Follow on Facebook" target="_blank">
                                        <svg class="icon"><use xlink:href="{{ asset('/img/sprite.svg#icon-fb') }}"/></svg>
                                    </a>
                                    <a href="#" title="Follow on Twitter" target="_blank">
                                        <svg class="icon"><use xlink:href="{{ asset('/img/sprite.svg#icon-tw') }}"/></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-xs-12 col-sm-7 col-md-8 col-lg-6 topic-wrapper">
                        <h3>Lean controllers with Vue</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
                <a class="btn btn-block btn-lg old-talks" href="#" title="See previous Laravel Nigeria talks">Previous Event Talks</a>
            </div>
        </div>
    </section>

    <section class="section xperience" id="ln-twitter">
        <div class="container">
            <div class="photo">
                <img src="{{ asset('img/photo-placeholder.png') }}" alt="@codebeast" />
            </div>
            <a class="handle" href="#" target="_blank" title="Follow @codebeast on Twitter">Chris Nwamba (@codebeast)</a>
            <div class="tweet">
                <span>Hanging out with the beautiful people at #LaravelNigeria. If you are not here then you are missing the time of your life!</span>
            </div>
            <a class="btn btn-block btn-lg" href="#" target="_blank" title="Launch the Laravel Nigeria Experience app.">
                <svg class="icon"><use xlink:href="{{ asset('/img/sprite.svg#icon-tw-nude') }}"/></svg>
                <span>Tweet your Experience</span>
            </a>
        </div>
    </section>

    <section class="section learn">
        <div class="container">
            <div class="title-subtitle">
                <h2>Join a learning track</h2>
                <h4 class="subtitle">Enjoy plenty educational resources to start off with Laravel and PHP.</h4>
            </div>
            <div class="row slicky-learn">
                <div class="track"><img src="{{ asset('img/track-placeholder.png') }}"></div>
                <div class="track"><img src="{{ asset('img/track-placeholder.png') }}"></div>
                <div class="track"><img src="{{ asset('img/track-placeholder.png') }}"></div>
                <div class="track"><img src="{{ asset('img/track-placeholder.png') }}"></div>
                <div class="track"><img src="{{ asset('img/track-placeholder.png') }}"></div>
            </div>
        </div>
    </section>

    <section class="section sponsors">
        <div class="container">
            <div class="title-subtitle">
                <h2>Meet the Sponsors</h2>
                <h4 class="subtitle">The companies that help make the meetup a success.</h4>
            </div>
            <div class="row slicky-sponsors">
                <div class="sponsor">
                    <a href="#" title="Pusher" target="_blank"><img src="{{ asset('img/sponsor-pusher.png') }}"></a>
                </div>
                <div class="sponsor">
                    <a href="#" title="CreativityKills" target="_blank"><img src="{{ asset('img/sponsor-ck.png') }}"></a>
                </div>
                <div class="sponsor">
                    <a href="#" title="GigaLayer" target="_blank"><img src="{{ asset('img/sponsor-gigalayer.png') }}"></a>
                </div>
                <div class="sponsor">
                    <a href="#" title="Andela" target="_blank"><img src="{{ asset('img/sponsor-andela.png') }}"></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section speak">
        <div class="green-overlay">&nbsp;</div>
        <div class="container">
            <div class="title-subtitle">
                <h2>Speaking at Laravel Nigeria</h2>
                <h4 class="subtitle">We would like to hear from first-time and seasoned speakers alike. Get in touch if you’d like to propose a talk or recommend a speaker.</h4>
            </div>
            <a class="btn btn-block btn-lg" href="#" title="Speak at the next Laravel Nigeria meetup">Contact Us</a>
        </div>
    </section>
@endsection

{{-- Custom Styles --}}
@section('styles')
    <style type="text/css">
        .slick-list,.slick-slider,.slick-track{position:relative;display:block}.slick-loading .slick-slide,.slick-loading .slick-track{visibility:hidden}.slick-slider{box-sizing:border-box;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-touch-callout:none;-khtml-user-select:none;-ms-touch-action:pan-y;touch-action:pan-y;-webkit-tap-highlight-color:transparent}.slick-list{overflow:hidden;margin:0;padding:0}.slick-list:focus{outline:0}.slick-list.dragging{cursor:pointer;cursor:hand}.slick-slider .slick-list,.slick-slider .slick-track{-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0);-o-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}.slick-track{top:0;left:0}.slick-track:after,.slick-track:before{display:table;content:''}.slick-track:after{clear:both}.slick-slide{display:none;float:left;height:100%;min-height:1px}[dir=rtl] .slick-slide{float:right}.slick-slide img{display:block}.slick-slide.slick-loading img{display:none}.slick-slide.dragging img{pointer-events:none}.slick-initialized .slick-slide{display:block}.slick-vertical .slick-slide{display:block;height:auto;border:1px solid transparent}.slick-arrow.slick-hidden{display:none}
    </style>
@endsection

{{-- Custom Scripts --}}
@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script type="text/javascript">
        (function () {
            $(document).ready(function(){
                var opts = { dots:false, infinite:true, slidesToShow:3, slidesToScroll:3, arrows: false, lazyLoad: 'ondemand', autoplay: true};
                opts.responsive = [
                    { breakpoint:640,settings:{slidesToShow:1,slidesToScroll:1 }},
                    { breakpoint:1024,settings:{ slidesToShow:2, slidesToScroll:2 }},
                ];
                $(".slicky-learn").slick(opts);
                opts.slidesToScroll = opts.slidesToShow = 4;
                opts.responsive = [
                    { breakpoint:640,settings:{slidesToShow:1,slidesToScroll:1 }},
                    { breakpoint:1024,settings:{ slidesToShow:3, slidesToScroll:3 }},
                ];
                $(".slicky-sponsors").slick(opts);
            });
        }());
    </script>
@endsection