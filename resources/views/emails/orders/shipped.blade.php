@component('mail::message')
# Introduction

Detail of your purchase.

@component('mail::table')
| Name       | Price         | Quantity  | Total  |
| ------------- |:-------------:| --------:| --------:|
@foreach(collect($cart) as $item)
|{{ $item['product']['parent']['title'] }}| ${{ round($item['product']['price'], 2) }}| {{ $item['quantity'] }} | $ {{ round($item['product']['price'], 2) * $item['quantity']}}
@endforeach
@endcomponent
###Total purchase: ${{ $total }}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
