@extends('layouts.app')

@section('content')
    <jumbo bg="/img/talks.jpg" message="All talks" sub-message="Archive of all the talks ever given at our meetups." clss="lean"></jumbo>

    <section class="section speakers single">
        <div class="container -mt-5">
            <div class="list">
                @forelse ($meetups as $meetup)
                    <div class="meetup-with-talks py-5">
                        <div class="meetup-title mb-12">
                            <h3 class="text-primary text-center text-xl md:text-3xl mb-2 font-semibold">
                                {{ data_get($meetup, 'details.name', 'Unknown event') }}
                            </h3>
                            <span class="text-xs tracking-wide text-grey-dark block text-center uppercase">
                                <span class="human-time">
                                    {{ data_get($meetup, 'details.starts_at', now())->diffForHumans() }}
                                </span>
                                &mdash;
                                <span class="date">
                                    {{ data_get($meetup, 'details.starts_at', now())->format('F d, Y') }}
                                </span>
                            </span>
                        </div>
                        @forelse ($meetup->get('talks', []) as $talk)
                            <single-speaker :talk='@json($talk)'></single-speaker>
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
                    </div>
                @empty
                    <div class="mt-10">
                        <img src="{{ asset('/img/conference.svg') }}" class="h-32 md:h-64 block mx-auto" />
                        <p class="text-sm text-grey-dark md:w-1/2 mx-auto text-center leading-normal my-10">
                            No meetups have been scheduled yet. You should subscribe below to receive notifications.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
