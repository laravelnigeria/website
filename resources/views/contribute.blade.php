@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbo pages" style="background: url({{ asset('img/contribute.jpg') }}) center center;">
        <div class="green-overlay">&nbsp;</div>
        <div class="container">
            <h1>Contribute to {{ config('app.name') }}</h1>
            <h2>Find out how you can help out with {{ config('app.name') }}.</h2>
        </div>
    </div>

    <section class="section">
        <div class="container">
            Content should come here! @todo design.
        </div>
    </section>

    @include('partials.speak')
@endsection