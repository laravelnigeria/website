@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbo">
        <div class="green-overlay">&nbsp;</div>
        <div class="container">
            @if ($next_event)
            <span class="event">
                {{ $next_event['name'] ?? null }} &mdash;
                <span class="date">{{ $next_event['time_object']->format('F d, Y') }}</span>
                <span class="hidden-xs">
                    <span class="separator">@</span>
                    <span class="location">
                        {{ array_get($next_event, 'venue.city') }},
                        {{ array_get($next_event, 'venue.localized_country_name') }}
                    </span>
                </span>
            </span>
            @endif
            <h1>Bringing together the brightest PHP and Laravel developers in Nigeria</h1>
            @if ($next_event)
            <a class="btn btn-lg btn-block cta" href="{{ $next_event->get('link') }}" title="Get free tickets" target="_blank">RSVP for this event</a>
            <span class="guests-count">
                <span class="count">{{ $next_event['yes_rsvp_count'] ?? 0 }} people are attending the event.</span>
                @if (array_get($next_event, 'seats_left') && $next_event['seats_left'] <= 50)
                    <span class="remaining">
                        {{ $next_event['seats_left'] <= 0 ? 'Tickets sold out' : 'Hurry, '.$next_event['seats_left'].' spots left' }}
                    </span>
                @endif
            </span>
            @endif
        </div>
    </div>

    @if ($next_event)
    <section class="section speakers" id="ln-speakers">
        <div class="container">
            <div class="title-subtitle">
                <h2>Meet the Speakers</h2>
                <h4 class="subtitle">Awesome people giving talks at the Laravel Nigeria meetup.</h4>
            </div>
            <div class="list">
                @foreach ($next_event->get('talks') as $talk)
                <div class="row speaker">
                    <div class="col col-xs-12 col-sm-4 col-md-4 col-lg-4 profile-wrapper">
                        <div class="photo">
                            <img src="{{ asset(array_get($talk, 'user.avatar')) }}" alt="{{ array_get($talk, 'user.name') }}" />
                        </div>
                        <div class="profile">
                            <ul>
                                <li class="name">{{ array_get($talk, 'user.name') }}</li>
                                <li class="position">{{ array_get($talk, 'user.job') }}</li>
                                @if (is_array(array_get($talk, 'user.social_links')))
                                    <li class="social">
                                        @foreach(array_get($talk, 'user.social_links') as $network => $link)
                                            <a href="#" title="I'm on {{ $network }}" target="_blank">
                                                <svg class="icon"><use xlink:href="{{ asset('/img/sprite.svg#icon-'.strtolower($network)) }}" /></svg>
                                            </a>
                                        @endforeach
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col col-xs-12 col-sm-7 col-md-8 col-lg-6 topic-wrapper">
                        <h3>{{ $talk['topic'] ?? 'Talk topic is missing' }}</h3>
                        <p>{{ $talk['overview'] ?? 'Talk overview is missing' }}</p>
                    </div>
                </div>
                @endforeach
                <a class="btn btn-block btn-lg old-talks" href="{{ route('talks') }}" title="See previous Laravel Nigeria talks">Previous Event Talks</a>
            </div>
        </div>
    </section>
    @endif

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
                <svg class="icon"><use xlink:href="{{ asset('/img/sprite.svg#icon-twitter-nude') }}"/></svg>
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
                @foreach ($sponsors as $sponsor)
                <div class="sponsor">
                    <a href="{{ $sponsor->link }}" title="{{ $sponsor->name }} &mdash; {{ $sponsor->description }}" target="_blank"><img src="{{ asset($sponsor->logo) }}">&nbsp;</a>
                </div>
                @endforeach
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