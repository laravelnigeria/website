@extends('layouts.front')

@section('content')
<header class="jumbo fullscreen">
    <video muted="muted" id="bgvid" loop="loop" preload="metadata" autoplay="autoplay" class="video">
        <source src="{{ asset('/videos/bg.mp4') }}" type="video/mp4">
        <source src="{{ asset('/videos/bg.ogv') }}" type="video/ogg">
        <source src="{{ asset('/videos/bg.webm') }}" type="video/webm">
    </video>
    <div class="green-overlay">&nbsp;</div>
    <section class="h-100">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-7 col-md-7">
                    <h1 class="banner-caption wow fadeIn" data-wow-delay="0.2s">
                        Nigeria's Biggest PHP Conference
                    </h1>
                    <div class="green-divider wow fadeIn"></div>
                    <span class="banner-subcaption wow fadeIn" data-wow-delay="0.2s">
                        Bringing together the best Laravel<br/>
                        developers in Nigeria
                    </span>
                    <div class="invisible-line"></div>
                    <!-- @TODO: Event thing for Google Search -->
                    <div class="date wow fadeInUp" data-wow-delay="0.2s">
                        <i class="icon far fa-calendar-alt"></i>
                        <span>16<sup>th</sup> of November, 2019</span>
                    </div>
                    <div class="location wow fadeInUp" data-wow-delay="0.2s">
                        <i class="icon fas fa-map-marker-alt"></i>
                        <span>
                            Zone Tech Park, Gbagada, Lagos
                            <a
                                target="_blank"
                                title="Find the location"
                                href="https://www.google.com/maps/place/Zone+Tech+Park/@6.5514308,3.3746513,17z/data=!3m1!4b1!4m5!3m4!1s0x103b8d73a658782b:0x7a1de11d89cccc84!8m2!3d6.5514308!4d3.37684"
                            >
                                <sup><i class="icon fas fa-map" style="font-size:11px;"></i></sup>
                            </a>
                        </span>
                    </div>
                    <tito-button class="ticket-button btn btn-block btn-primary rounded-lg wow fadeInUp" data-wow-delay="0.2s" event="laravelnigeria/2019">
                        Get Tickets
                    </tito-button>
                    <div class="sponsor-mobile">
                        <div class="content">
                            <span>Gold Sponsor:</span>
                            <a href="https://corporate.aboutyou.de/en/?utm_source=laravel-nigeria&utm_medium=referral&utm_campaign=tech" target="_blank" rel="noopener noreferrer" class="gold-sponsor">
                                <img src="{{ asset('img/sponsor.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="right-wrap">
                        <div class="video-play wow fadeIn" data-wow-delay="0.2s">
                            <a class="icon wow tada" data-wow-delay="1.5s" title="Watch Laravel Nigeria Video"></a>
                            <span>Watch some of the<br/>memories</span>
                        </div>
                    </div>
                </div>
                <div class="mouse wow fadeInUp" data-wow-delay="0.2s">
                    <span></span>
                </div>
            </div>
            <div class="sponsor">
                <div class="content wow fadeInUp" data-wow-delay="0.2s">
                    <span>Gold Sponsor:</span>
                    <div class="gold-sponsor">
                        <a href="https://corporate.aboutyou.de/en/?utm_source=laravel-nigeria&utm_medium=referral&utm_campaign=tech" target="_blank">
                            <img src="{{ asset('img/sponsor.png') }}" alt="Laravel Nigeria is sponsored by ABOUT YOU GmbH">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>

<section class="about-us section">
    <div class="container">
        <div class="about-wrap">
            <h2 class="wow fadeInUp">About this conference</h2>
            <h3 class="wow fadeInUp" data-wow-delay="0.1s">Laravel Nigeria 2019</h3>
            <h5 class="wow fadeIn" data-wow-delay="0.2s">
                Laravel Nigeria will host the largest gathering of Laravel developers in Nigeria
                On 16th of November 2019 in Lagos.
            </h5>
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <p class="wow fadeIn" data-wow-delay="0.3s">
                        This is a FREE non-profit conference that is hosted yearly to boost the Nigerian tech ecosystem.
                        PHP developers from all over Nigeria are welcome to join the sessions to learn about Laravel and
                        connect with other Laravel developers.
                    </p>
                </div>
                <div class="col-sm-12 col-md-1">&nbsp;</div>
                <div class="col-sm-12 col-md-4">
                    <p class="lighter wow fadeIn" data-wow-delay="0.5s">
                        All developers are welcome to join the conference regardless of where you might be in Nigeria. See you there.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hype section">
    <div class="row no-gutters">
        <div class="col-lg-6 col-md-6">
            <div class="img-wrap">
                <div class="img slant-left"></div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="text-content bottom">
                <div class="green-divider"></div>
                <h3 class="wow fadeInUp" data-wow-delay="0.2s">Celebrate the Laravel Nigeria Community</h3>
                <p class="wow fadeInUp" data-wow-delay="0.3s">
                    Nigeria is one of the fastest growing producers of tech developers in the world.
                    Every year, we hope to celebrate and build the Nigerian developer community
                    using Laravel Nigeria.
                </p>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-lg-6 col-md-6">
            <div class="text-content bottom">
                <div class="green-divider"></div>
                <h3 class="wow fadeInUp" data-wow-delay="0.2s">Grow with the community</h3>
                <p class="wow fadeInUp" data-wow-delay="0.4s">
                    Laravel Nigeria is not just a conference. We want to build the community.
                    You can join numerous meetups in your city and also host one if your city has none.
                    Join our <a href="https://meetup.com/LaravelNigeria" title="Laravel Nigeria on meetup.com" target="_blank">meetup.com community</a>.
                </p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-b">
            <div class="img-wrap">
                <div class="img slant-right"></div>
            </div>
        </div>
    </div>
</section>

<speakers></speakers>
    {{-- Moved here because script tags in Vue components breaks the app --}}
    <div class="text-center">
      {{-- <a
        class="btn btn-lg btn-primary"
        href="https://laravelnigeria.typeform.com/to/rosG3K"
      >Submit Talk</a> --}}
      {{-- <a class="typeform-share button" href="https://laravelnigeria.typeform.com/to/rosG3K" data-mode="popup" style="display:inline-block;text-decoration:none;background-color:#00BABA;color:white;cursor:pointer;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:50px;text-align:center;margin:0;height:50px;padding:0px 33px;border-radius:25px;max-width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:bold;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;" data-hide-footer=true data-submit-close-delay="1" target="_blank">Submit Talk </a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script> --}}
    </div>

<section class="schedules">
    <div class="schedules-wrap">
        <div class="container">
            <div class="title">
                <h2 class="title-text mt-2">Schedule</h2>
                <div class="title-div"></div>
            </div>

            <schedule
                grey="true"
                :duration="{start:'09:20am', end:'09:50am'}"
                :details="{title:'Breakfast & Check-in', overview: 'Register, get your swag & light breakfast, and find a seat.'}">
            </schedule>

            <schedule
                :duration="{start:'10:00am', end:'10:15am'}"
                :details="{title:'Introduction', overview: 'Welcome to the 2019 Laravel Nigeria Conference!'}">
            </schedule>

            <schedule
                :duration="{start:'10:20am', end:'10:50am'}"
                :details="{title:'Failure-As-A-Service: Dealing with failure and tough situations as a Developer', overview: 'Christian Jombo'}">
            </schedule>

            <schedule
                :duration="{start:'10:55am', end:'11:25am'}"
                :details="{title:'Building, testing and scaling Laravel APIs effectively', 'overview': 'Frantz Kati'}">
            </schedule>

            <schedule
                :duration="{start:'11:30am', end:'12:00am'}"
                :details="{title:'Getting started with Laravel', 'overview': 'Chisom Mbama'}">
            </schedule>

            <schedule
                grey="true"
                :duration="{start:'12:05pm', end:'12:35pm'}"
                :details="{title:'Lunch & Networking', overview: 'Grab some lunch and mingle with the towns people'}">
            </schedule>

            <schedule
                :duration="{start:'12:40am', end:'12:55pm'}"
                :details="{title:'UI Rendering on the Web', 'overview': 'Wisdom Ebong'}">
            </schedule>

            <schedule
                :duration="{start:'01:00pm', end:'01:30pm'}"
                :details="{title:'TDD: Building Maintainable Apps Through Tests', overview: 'Sodeeq Elusoji'}">
            </schedule>

            <schedule
                grey="true"
                :duration="{start:'01:35pm', end:'01:50pm'}"
                :details="{title:'Games and Giveaways', overview: 'Kahoots, prizes, and some fun'}">
            </schedule>

            <schedule
                :duration="{start:'01:55pm', end:'02:25pm'}"
                :details="{title:'Asynchronous PHP and why you should care as a PHP Developer', 'overview': 'Olatunbosun Egberinde'}">
            </schedule>

            <schedule
                :duration="{start:'02:30pm', end:'03:00pm'}"
                :details="{title:'Web Accessibility: Building With Inclusion.', 'overview': 'Omoike Sarah'}">
            </schedule>

            <schedule
                :duration="{start:'03:10pm', end:'03:40pm'}"
                :details="{title:'SOLID in Laravel: Too Much or Not Enough?', 'overview': 'Etinosa Obaseki'}">
            </schedule>

            <schedule
                grey="true"
                :duration="{start:'03:45pm', end:'04:00pm'}"
                :details="{title:'Games and Giveaways', overview: 'Kahoots, prizes, and some fun'}">
            </schedule>

            <schedule
                :duration="{start:'04:00pm', end:'04:20pm'}"
                :details="{title:'How to Deploy Laravel Applications securely on DigitalOcean', 'overview': 'Michael Okoh'}">
            </schedule>

            <schedule
                grey="true"
                :duration="{start:'04:25pm', end:'04:40pm'}"
                :details="{title:'Last Words', 'overview': 'Neo Ighodaro'}">
            </schedule>
            <schedule
                :duration="{start:'04:45pm', end:'05:00pm'}"
                :details="{title:'Photos / Interview', 'overview': 'For speakers and some random attendees'}">
            </schedule>
        </div>
    </div>
</section>

@include('partials.footer', compact('sponsors'))
@endsection
