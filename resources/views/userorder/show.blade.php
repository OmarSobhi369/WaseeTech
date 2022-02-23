@extends('layouts.front')

@section('content')
<div class="cart">
<button class="btn btn-primary"><a href="{{ route('orders.index') }}">Back To My Orders</a></button>
<h3>Order Summary</h3>
</div>
<div class="summary">
<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price/Unit</th>
            <th>Subtotal <br> Per Item</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{dd($order)}} --}}
        @php
            $totalprice = 0;
        @endphp

        @foreach ($items as $item)
        <tr>
            <td scope="row">
                <img src="{{asset('storage/'.$item->cover_img)}}" alt="" width="10%" >
            </td>
            <td>
                {{$item->name}}
            </td>
            <td>
                {{$item->pivot->quantity}}
            </td>
            <td>
                {{$item->pivot->price}} L.E/Unit
            </td>
            <td>
                @php
                    $total = ($item->pivot->price) * ($item->pivot->quantity);
                @endphp
                @php
                $totalprice = $totalprice + $total;
                @endphp
                {{$total}} L.E
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="cart">
<h3> Grand Total(Shipping Excluded): <strong>{{ $order->grand_total }} L.E</strong></h3>
</div>
@endsection
