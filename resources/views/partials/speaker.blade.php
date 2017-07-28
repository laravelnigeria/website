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
                            <a href="{{ $link }}" title="I'm on {{ $network }}" target="_blank">
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
        <div class="links">
            <ul>
                @if ( ! empty($talk['link_video']))
                    <li class="video icon">
                        <a href="{{ $talk['link_video'] }}" target="_blank" title="Video of &#8220;{{ $talk['topic'] }}&#8221;"><i class="fa fa-video-camera"></i></a>
                    </li>
                @endif

                @if ( ! empty($talk['link_slides']))
                    <li class="slides icon">
                        <a href="{{ $talk['link_slides'] }}" target="_blank" title="Slides of &#8220;{{ $talk['topic'] }}&#8221;"><i class="fa fa-picture-o"></i></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>