@component('mail::message')
Hello,

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
