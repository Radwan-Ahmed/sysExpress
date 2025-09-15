<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; line-height:1.6; color:#333; margin:0; padding:0;">

    {{-- Logo --}}
    <div style="text-align:center; padding:20px 0;">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/sys.png'))) }}"
             alt="SYS Express Logo" style="max-width:150px;">
    </div>

    {{-- Message Body --}}
    <div style="padding:0 20px;">
        <h2>Hello {{ $details['name'] }},</h2>
        <p>Thanks for reaching out to <strong>SYS Express</strong> 🚀.</p>
        <p>We have received your message and will reply as soon as possible.</p>

        <hr>

        <p><strong>Your Message:</strong></p>
        <p>{{ $details['message'] }}</p>

        <p>Best regards,<br>SYS Express Team</p>
    </div>

    {{-- Featured Products --}}
    @if(isset($products) && count($products) > 0)
        <div style="padding:20px;">
            <h3 style="text-align:center;">Our Featured Products</h3>
            <table role="presentation" style="width:100%; border-spacing:20px; text-align:center;">
                <tr>
                    @foreach($products as $product)
                        <td style="vertical-align:top; width:33%; border:1px solid #eee; border-radius:8px; padding:10px;">
                            @if($product->image)
                                <img src="{{ url('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}"
                                     style="max-width:100%; height:auto; border-radius:5px;">
                            @endif
                            <h4 style="margin:10px 0; font-size:16px; color:#333;">{{ $product->name }}</h4>
                            <p style="font-size:14px; color:#666;">{{ Str::limit($product->description, 50) }}</p>
                            <p style="font-size:15px; font-weight:bold; color:#000;">৳ {{ number_format($product->price, 2) }}</p>
                            <a href="{{ url(path: '/products/' . $product->id) }}"
                               style="display:inline-block; padding:8px 12px; background:#007BFF; color:#fff; text-decoration:none; border-radius:5px; font-size:14px;">
                               View Product
                            </a>
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>
    @endif

    {{-- Footer --}}
    <div style="text-align:center; font-size:12px; color:#888; padding:20px 0;">
        &copy; {{ date('Y') }} SYS Express. All rights reserved.
    </div>

</body>
</html>
