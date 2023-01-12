<tr>
    <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;" height="20"></td>
</tr>
<tr>
    <td
        style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 12px; padding-left: 48px; padding-right: 48px; --text-opacity: 1; color: #eceff1; color: rgba(236, 239, 241, var(--text-opacity));">
        <p align="center" style="cursor: default; margin-bottom: 16px;">
        @if(env('FB_URL'))
            <a href="{{ env('FB_URL') }}"
                style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity)); text-decoration: none;"><img
                    src="{{ asset('/images/email/facebook.png') }}" width="17" alt="Facebook"
                    style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
            •
        @endif
        @if(env('TWITTER_URL'))
            <a href="{{ env('TWITTER_URL') }}"
                style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity)); text-decoration: none;"><img
                    src="{{asset('/images/email/twitter.png')}}" width="17" alt="Twitter"
                    style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
            •
        @endif
        @if(env('IG_URL'))
            <a href="{{ env('IG_URL') }}"
                style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity)); text-decoration: none;"><img
                    src="{{ asset('/images/email/instagram.png') }}" width="17" alt="Instagram"
                    style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
        @endif
        </p>
        <p style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity));">
            {{ Illuminate\Mail\Markdown::parse($slot) }}
        </p>
    </td>
</tr>
<tr>
    <td style="font-family: 'Montserrat',Arial,sans-serif; height: 16px;" height="16"></td>
</tr>
