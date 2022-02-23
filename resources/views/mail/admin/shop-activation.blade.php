@component('mail::message')
# Shop activation request

A shop with the following details has submitted an activation Request, <br>
Please consider reviewing it ASAP.

Shop Name : {{$shop->name}} <br>
Shop Owner : {{$shop->owner->name}}

@component('mail::button', ['url' => url('/admin/shops')])
Manage Shops
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
