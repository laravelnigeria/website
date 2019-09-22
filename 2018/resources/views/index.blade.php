@extends('layouts.app')

@section('content')
    <jumbo bg="/img/jumbo.jpg" :videos="true" :event='@json($meetup__next_event ?? null)'></jumbo>

    <section class="section speakers" id="ln-speakers">
        <div class="container">
            <div class="title-subtitle">
                <h2>Meet the Speakers</h2>
                <h4 class="subtitle">Awesome people giving talks at the next {{ config('app.name') }} meetup.</h4>
            </div>
            <div class="list">
                @isset ($meetup__next_event)
                    @forelse ($meetup__next_event->get('talks', []) as $talk)
                        <single-speaker :talk='@json($talk)'></single-speaker>
                        @if ($loop->last)
                            <a href="{{ route('talks') }}" class="standard-button block w-64 mt-32 mx-auto">
                                Previous talks
                            </a>
                        @endif
                    @empty
                        <div class="mt-10">
                            <img src="{{ asset('/img/conference.svg') }}" class="h-32 md:h-64 block mx-auto" />
                            <p class="text-sm text-grey-dark md:w-1/2 mx-auto text-center leading-normal my-10">
                                No speakers yet. If you're interested, you can apply to speak by using the link below.
                            </p>
                            <a
                                target="_blank"
                                rel="noopener noreferrer"
                                href="{{ config('app.cfp_link') }}"
                                class="standard-button block w-64 mx-auto"
                            >
                                Apply to Speak
                            </a>
                        </div>
                    @endforelse
                @else
                    <div class="mt-10">
                        <img src="{{ asset('/img/empty.svg') }}" class="h-32 md:h-64 block mx-auto" />
                        <p class="text-sm text-grey-dark md:w-1/2 mx-auto text-center leading-normal mt-10">
                            The next meetup has not been scheduled. While you wait, you can see
                            <a href="{{ route('talks') }}" class="text-primary no-underline hover:underline">previous talks</a>.
                        </p>
                    </div>
                @endisset
            </div>
        </div>
    </section>

    <single-tweet :tweet='@json($tweet)'></single-tweet>
    <learn-laravel :tracks="false"></learn-laravel>
    <slack-inviter team="{{ config('services.community_inviter.slack_team') }}"></slack-inviter>
    <sponsors-slider :sponsors='@json($sponsors)'></sponsors-slider>
@endsection
