@unless (in_array('slack_invite', $hide ?? []))
<slack-invite></slack-invite>
@endunless

@unless (in_array('last_conference', $hide ?? []))
<section class="last-conference">
    <div class="conference-wrap">
        <div class="row no-gutters">
            <div class="col-12 col-md-8">
                <div class="container">
                    <div class="title">
                        <div class="text">
                            <div class="wow fadeInUp">
                                <span>Missed last years conference?<br />Here are some memories</span>
                            </div>
                            <div class="forward-arrow wow fadeInLeft" data-wow-delay="0.3s">
                                <svg width="41" height="23" viewBox="0 0 41 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.32424 7.73768C2.4426 7.73768 1.59706 8.08791 0.973648 8.71133C0.350231 9.33474 0 10.1803 0 11.0619C0 11.9436 0.350231 12.7891 0.973648 13.4125C1.59706 14.0359 2.4426 14.3862 3.32424 14.3862L25.4858 14.3862V19.9266C25.4857 20.3442 25.6035 20.7533 25.8258 21.1068C26.048 21.4604 26.3656 21.7439 26.742 21.9248C27.1184 22.1057 27.5382 22.1766 27.9531 22.1293C28.368 22.082 28.7611 21.9184 29.0871 21.6574L40.1679 12.7927C40.4275 12.5851 40.6371 12.3218 40.7812 12.0221C40.9252 11.7225 41 11.3944 41 11.0619C41 10.7295 40.9252 10.4013 40.7812 10.1017C40.6371 9.80208 40.4275 9.53872 40.1679 9.3311L29.0871 0.466459C28.7548 0.217575 28.3622 0.061739 27.9497 0.0149956C27.5372 -0.0317459 27.1197 0.0322952 26.7402 0.200523C26.3644 0.381563 26.0473 0.664991 25.8254 1.01822C25.6035 1.37145 25.4858 1.78014 25.4858 2.19728V7.73768L3.32424 7.73768Z" fill="#01BABA"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <a class="video-play-wrap" href="#" title="Laravel Nigeria conference recap">
                    <div class="play-wrap">
                        <div class="play-btn">
                            <svg fill="none" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" width="65px" heoght="65px">
                                <path d="m50 100c27.614 0 50-22.386 50-50s-22.386-50-50-50-50 22.386-50 50 22.386 50 50 50z" clip-rule="evenodd" fill="#F5F6FA" fill-opacity=".01" fill-rule="evenodd"/>
                                <mask id="b" x="0" y="0" width="100" height="100" mask-type="alpha" maskUnits="userSpaceOnUse">
                                    <path d="m50 100c27.614 0 50-22.386 50-50s-22.386-50-50-50-50 22.386-50 50 22.386 50 50 50z" clip-rule="evenodd" fill="#fff" fill-rule="evenodd"/>
                                </mask>
                                <g mask="url(#b)">
                                    <rect width="100" height="100" fill="#01BABA"/>
                                </g>
                                <path d="m57.952 50.814c0.5583-0.3988 0.5583-1.2286 0-1.6275l-13.643-9.745c-0.6619-0.4727-1.5812 4e-4 -1.5812 0.8138v19.49c0 0.8134 0.9193 1.2865 1.5812 0.8137l13.643-9.745z" clip-rule="evenodd" fill="#000" fill-opacity=".7" fill-rule="evenodd"/>
                                <mask id="a" x="42" y="39" width="17" height="22" mask-type="alpha" maskUnits="userSpaceOnUse">
                                    <path d="m57.952 50.814c0.5583-0.3988 0.5583-1.2286 0-1.6275l-13.643-9.745c-0.6619-0.4727-1.5812 4e-4 -1.5812 0.8138v19.49c0 0.8134 0.9193 1.2865 1.5812 0.8137l13.643-9.745z" clip-rule="evenodd" fill="#fff" fill-rule="evenodd"/>
                                </mask>
                                <g mask="url(#a)">
                                    <rect x="30" y="30" width="40" height="40" fill="#fff"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="video" style="background-image: url(/img/speaker-stage.png);">
                        <div class="wrap"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endunless

@unless (in_array('sponsors', $hide ?? []))
<section class="sponsors">
    <div class="sponsors-wrap">
        <div class="spoonsor-title">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="sponsor-green">
                            <h2>Sponsors</h2>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <span>The companies that help make <br/> our community a success.</span>
                    </div>
                </div>
                <div class="sponsor-icons">
                    <div class="icons-wrap">
                        <div class="row no-row">
                            @foreach ($sponsors ?? [] as $sponsor)
                            <div class="col-6 col-lg-3 col-md-3 sponsor-col">
                                <a
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    href="{{ $sponsor['link'] }}"
                                    title="{{ $sponsor['title'] }}"
                                    class="sponsors-img wow fadeInUp"
                                    style="background-image: url({{ asset($sponsor['image']) }});">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endunless

<footer>
    <div class="footer-wrap">
        <div class="container">
            <div class="row no-gutters align-items-center">
                <div class="col-lg-3 col-md-12 footer-logo-wrap">
                    <div class="footer-logo wow fadeInUp">
                        <a href="{{ route('index') }}" title="Home">
                            <img src="{{ asset('/img/logo-colored.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="container footer-list">
                                <ul>
                                    <li class="wow fadeInUp"><a href="https://www.youtube.com/channel/UC_cOgecDfhakxSJN9Cwhz3w" title="Previous talks from past conferences">Previous Talks</a></li>
                                    <li class="wow fadeInUp" data-wow-delay="0.1s"><a href="{{ route('code-of-conduct') }}" title="Code of Conduct">Code of Conduct</a></li>
                                    <li class="wow fadeInUp" data-wow-delay="0.2s"><a target="_blank" rel="noopener noreferrer" href="https://laracast.com" title="Learn more">Learn</a></li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s"><a href="https://medium.com/laravelnigeria" title="Link title">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 footer-social-wrap">
                    <div class="row no-gutters">
                        <div class="col">
                            <ul>
                                <li class="wow fadeIn" data-wow-delay="0.3s">
                                    <a href="https://twitter.com/laravelnigeria" target="_blank" rel="noopener noreferrer" title="Follow us on Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="0.4s">
                                    <a href="https://laravelnigeria.slack.com/" target="_blank" rel="noopener noreferrer" title="Slack Channel">
                                        <i class="fab fa-slack"></i>
                                    </a>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="0.5s">
                                    <a href="https://instagram.com/laravelnigeria" target="_blank" rel="noopener noreferrer" title="Follow us on Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="0.6s">
                                    <a href="https://www.youtube.com/channel/UC_cOgecDfhakxSJN9Cwhz3w" target="_blank" rel="noopener noreferrer" title="YouTube Channel">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container copyright">
            <span class="copy">
                <a href="https://creativitykills.co" target="_blank" rel="noopener noreferrer" title="CreativityKills is a Nigerian based web development agency">CreativityKills Co</a> •
                &copy; 2017 - {{ date('Y') }} Laravel Nigeria
            </span>
        </div>
    </div>
</footer>
