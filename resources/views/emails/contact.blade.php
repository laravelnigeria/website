@component('mail::message')
# Contact form submitted
The contact form was submitted from the website. The contents of the email are outlined below:

@component('mail::panel')
{{ $details->get('message') }}
@endcomponent

{{ $details->get('name') }},<br />
{{ $details->get('email') }}

@endcomponent
