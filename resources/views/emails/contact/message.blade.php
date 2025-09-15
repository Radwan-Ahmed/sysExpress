@component('mail::message')
# New Contact Form Message

**Name:** {{ $data['name'] }}
**Email:** {{ $data['email'] }}

**Message:**
{{ $data['message'] }}

@endcomponent
