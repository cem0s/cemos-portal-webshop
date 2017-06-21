@component('mail::message')
Hi {{$content['name']}}

You had requested for a password reset. Kindly click the link below to reset your password.

@component('mail::button', ['url' =>  $content['url']])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
