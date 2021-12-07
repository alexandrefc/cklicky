@component('mail::message')
Thank you for the payment

{{ $paymentIntent->name }} !
We are happy to see you at cKlicky.com!
Please follow 


@component('mail::button', ['url' => 'https://cklicky.com/app-development-stages'])
Moving forward
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
