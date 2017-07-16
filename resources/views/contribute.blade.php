@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endsection

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
            {{--Content should come here! @todo design.--}}
            <h2 class="text-center">Contributors</h2><br>
            <div>
                <div class="row">
                    @foreach($result as $data)
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-body" style='background: url("{{ $data->avatar_url }}") center no-repeat; height: 15em;'>
                                </div>
                                <div class="panel-footer">{{ ucfirst($data->login) }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="text-center">
                    <a class="btn btn-default btn-lg" href="https://github.com/laravelnigeria/website" title="Contribute to {{ config('app.name') }}" style="background: #F0F0F0; border: hidden; color: #00BABA;">Contribute to {{ config('app.name') }}</a>
                </div>
            </div>


        </div>
    </section>

    @include('partials.speak')
@endsection
