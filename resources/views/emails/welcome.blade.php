@component('mail::message')
# Welcome to cKlicky.com - the white label loyalty platform !
<div class="text-center mx-auto">
    We are happy to see you. cKlicky provides ready to use custom branded web solutions in just 14 days. <br><br>
    First please take advantage of our 14 days free trial. <br><br>
    We hope you love it.

    
</div>
<br>


@component('mail::button', ['url' => config('app.url') . '/dashboard', 'color' => 'go'])
Get started
@endcomponent


Have a great day,<br>
{{ config('app.name') }} Team



@endcomponent


