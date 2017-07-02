@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbo pages parallaxbg" style="background: url({{ asset('img/talks.jpg') }}) center top;">
        <div class="green-overlay">&nbsp;</div>
        <div class="container">
            <h1>{{ config('app.name') }} Meetups</h1>
            <h2>Archive of all the talks ever given at {{ config('app.name') }}.</h2>
        </div>
    </div>

    <section class="section speakers single">
        <div class="container">
            <div class="list">
                @foreach ($meetups as $meetup)
                    <div class="meetup-title">
                        <h3>{{ $meetup['details']['name'] ?? 'Unknown Event' }}</h3>
                        <span class="event-date">
                            <span class="human-time">{{ $meetup['details']['time_object']->diffForHumans() }}</span> &mdash;
                            <span class="date">{{ $meetup['details']['time_object']->format('F d, Y') }}</span>
                        </span>
                    </div>
                    @foreach ($meetup['talks'] as $talk)
                    @include('partials.speaker')
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.speak')
@endsection