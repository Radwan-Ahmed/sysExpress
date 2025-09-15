<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin:0; padding:0;">

    {{-- Logo --}}
    <div style="text-align:center; padding:20px 0;">
    <img src="data:images/jpg;base64,{{ base64_encode(file_get_contents(public_path('images/background.jpg'))) }}"
     alt="SYS Express Logo" style="max-width:150px;">

    </div>

    {{-- Message Body --}}
    <div style="padding: 0 20px;">
        <p><strong>Name:</strong> {{ $details['name'] }}</p>
        <p><strong>Email:</strong> {{ $details['email'] }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $details['message'] }}</p>
        <p>Best regards,<br>SYS Express Team</p>
    </div>

    {{-- Footer --}}
    <div style="text-align:center; font-size:12px; color:#888; padding:20px 0;">
        &copy; {{ date('Y') }} SYS Express. All rights reserved.
    </div>

</body>
</html>
