@component('mail::message')
# {{ $message->name }} ({{ $message->email }}) pisze:

{{ $message->message }}

@endcomponent
