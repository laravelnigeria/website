@extends('layouts.app')

@section('content')
    <div style="text-align: center; margin-top: 15%;">
        <div style="display: flex; justify-content: center;">
            <img class="img-responsive" src="{{ asset('img/logo@2x.png') }}" alt="{{ config('app.name') }}">
        </div>
        <h2><span style="color: #00baba;">500</span> - Internal server error!</h2>
        <p>The server encountered an internal error that prevented it from fulfilling this request</p>
    </div>
@endsection