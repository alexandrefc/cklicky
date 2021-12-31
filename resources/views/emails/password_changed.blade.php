@component('mail::message')
# You have successfully changed your password !

You can now login using new credentials.

@component('mail::button', ['url' => config('app.url') . '/dashboard', 'color' => 'go'])
Go to your account
@endcomponent

Please let us know if you need any help by contacting our support at support@cklicky.com.


Have a great day,<br>
{{ config('app.name') }}
@endcomponent
