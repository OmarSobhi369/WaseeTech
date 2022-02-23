@extends('layouts.seller')


@section('content')

<h3>Order Summary</h3>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price/Unit</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td scope="row">
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
                {{$total}} L.E
            </td>
        </tr>
        @endforeach


    </tbody>
</table>

@endsection
