@extends('layouts.front')

@section('content')
<div class="cart">
    <h3>My Orders</h3>
    <table class="table">
            @if ($orders)
            <thead>
                <tr>
                    <th>Order number</th>
                    <th>Status</th>
                    <th>Item count</th>
                    <th>Shipping Address</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            @endif
            @forelse ($orders as $Order)

            <tbody>
                <tr>
                    <td scope="row">
                        {{$Order->order_number}}
                    </td>
                    <td>
                        {{$Order->status}}
                    </td>

                    <td>
                        {{$Order->item_count}}
                    </td>

                    <td>
                    {!! $Order->shipping_address !!}
                    </td>

                    <td>
                        {{ $Order->notes ?? 'N/A'}}
                    </td>

                    <td>
                        <a name="" id="" class="btn btn-primary btn-sm" href="{{route('orders.show', $Order)}}" role="button">View</a>
                    </td>
                </tr>
            @empty

            <p>You don't have any orders yet</p>

            <button class="btn btn-primary"><a href="{{ route('home') }}">Go Shopping!</a></button>


            </tbody>
            @endforelse





</table>
</div>

@endsection
