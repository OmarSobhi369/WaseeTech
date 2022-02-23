@component('mail::message')
# Congratulations

Your shop is now active, you can start selling your products now!

@component('mail::button', ['url' => url('/admin')])
You Can Visit Your Shop From Here
@endcomponent

Regards,<br>
{{ config('app.name') }} Team
@endcomponent
