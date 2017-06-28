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
            <h1>{{ config('app.welcome_message') }}</h1>
            @if ($next_event)
            <a class="btn btn-lg btn-block cta" href="{{ $next_event->get('link') }}" title="RSVP to {{ config('app.name') }}" target="_blank">RSVP for this event</a>
            <span class="guests-count">
                <span class="count">{{ $next_event['yes_rsvp_count'] ?? 0 }} people are attending the meetup.</span>
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
                <h4 class="subtitle">Awesome people giving talks at the {{ config('app.name') }} meetup.</h4>
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
                <a class="btn btn-block btn-lg old-talks" href="{{ route('talks') }}" title="See previous {{ config('app.name') }} talks">Previous Meetup Talks</a>
            </div>
        </div>
    </section>
    @endif

    @if ($tweet)
    <section class="section xperience" id="ln-twitter">
        <div class="container">
            <div class="photo">
                <img src="{{ asset(Twitter::profileImage($tweet->user, 'bigger')) }}" alt="{{ config('app.name')." - @{$tweet->user->screen_name}" }}" />
            </div>
            <a class="handle" href="{{ Twitter::linkUser($tweet->user) }}" target="_blank" title="Follow {{ "@{$tweet->user->screen_name}" }} on Twitter">
                {{ "{$tweet->user->name} (@{$tweet->user->screen_name})" }}
            </a>
            <div class="tweet">
                <span>{!! Twitter::linkify($tweet->text) !!}</span>
            </div>
            @if (env('TWITTER_SHARE_TEXT'))
            <a class="btn btn-block btn-lg"
               href="https://twitter.com/intent/tweet?url={{ config('app.url') }}&amp;text={{ env('TWITTER_SHARE_TEXT') }}&amp;hashtags={{ env('TWITTER_SHARE_HASHTAGS') }}&amp;related={{ env('TWITTER_HANDLE') }}"
               target="_blank" title="Tweet about your {{ config('app.name') }} experience.">
                <svg class="icon"><use xlink:href="{{ asset('/img/sprite.svg#icon-twitter-nude') }}"/></svg>
                <span>Share your Experience</span>
            </a>
            @endif
            @if (env('TWITTER_HANDLE'))
            <a class="twitter-follow-button" data-show-count="false" href="https://twitter.com/{{ env('TWITTER_HANDLE') }}">Follow {{ '@'.env('TWITTER_HANDLE') }}</a>
            @endif
        </div>
    </section>
    @endif

    <section class="section learn" id="learning-track">
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

    @if (config('services.community_inviter.slack_team'))
    <section class="section slack" id="slack-invite">
        <div class="white-overlay">&nbsp;</div>
        <div class="container">
            <div id="CommunityInviter"></div>
            <span class="link">
                <a href="https://{{ config('services.community_inviter.slack_team') }}.slack.com" target="_blank"
                   title="{{ config('services.community_inviter.slack_team_readable') }} PHP community on Slack">
                    Jump to Slack Channel
                </a>
            </span>
            <style type="text/css">
                #CommunityInviter > div:after {
                    content: "Join the {{ config('services.community_inviter.slack_team_readable') }} community on Slack. 🔥";
                }
            </style>
        </div>
    </section>
    @endif

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
                <h2>Speaking at {{ config('app.name') }}</h2>
                <h4 class="subtitle">We would like to hear from first-time and seasoned speakers alike. Get in touch if you'd like to propose a talk or recommend a speaker.</h4>
            </div>
            <a class="btn btn-block btn-lg contact-popup-toggle" href="#" title="Speak at the next {{ config('app.name') }} meetup">Contact Us</a>
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

        @if (config('services.community_inviter.slack_team'))
        (function () {
            window.CommunityInviterAsyncInit = function () {
               CommunityInviter.init({
                   app_url: "{{ config('services.community_inviter.join_url') }}",
                   team_id: "{{ config('services.community_inviter.slack_team') }}",
               });
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//communityinviter.com/js/communityinviter.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'Community_Inviter'));
        }());
        @endif
    </script>
@endsection