@extends('layouts.app')

@section('content')
   <div style="text-align: center; margin-top: 15%;">
       <div style="display: flex; justify-content: center;">
           <img class="img-responsive" src="{{ asset('img/logo@2x.png') }}" alt="{{ config('app.name') }}">
       </div>
       <h2><span style="color: #00baba;">404</span> Page Not Found!</h2>
   </div>
@endsection