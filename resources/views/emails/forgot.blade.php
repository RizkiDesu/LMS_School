@component('mail::message')

hello {{ $user->name }},
<p>We Understanding it happent</p>
@component('mail::button', ['url'=>url('reset/' . $user->remember_token)])
Reset Your Password
@endcomponent

<p>In case you have isssue recovering your password, pleace contact us. </p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
