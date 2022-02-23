@extends('layouts.front')

@section('content')
<div class="cart">
    <h2 class="cart-name">Your Cart</h2>


    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Minimum Quantity <br> Required by Vendor</th>
                <th>Price/Unit</th>
                <th>Discounted Value <br> Per Unit</th>
                <th>Quantity</th>
                <th>Subtotal <br> Per Item</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($cartitems->first()->model->categories)}} --}}
            @foreach ($cartitems as $item)

            <tr>
                <td scope="row"><a href="{{route('products.show', $item->model)}}">{{ $item->name }}</a></td>
                <td>{{ $item->min_qty }} Units</td>
                <td>
                    @if ($item->conditions)
                        @php
                            $newprice = $item->price + $item->discount_value;
                        @endphp
                        {{ $newprice }} L.E
                    @else
                        {{$item->price}} L.E
                    @endif
                </td>
                <td>
                    @if ($item->conditions)
                        @php
                            $discountvalue = $item->discount_value;
                        @endphp
                        {{ $discountvalue }} L.E
                    @else
                        {{ 'N/A' }}
                    @endif
                </td>
                <td>

                    @php
                        if($item->quantity < $item->min_qty){
                            $totalqty = $item->min_qty;
                        }else{
                            $totalqty = $item->quantity;
                        }
                    @endphp

                    <form action={{ route('cart.update', $item -> id) }}>
                        <input type="number" name="quantity" value="{{ $totalqty }}" min="{{ $item->min_qty }}">
                        <input type="submit" value="Refresh Cart">
                    </form>
                </td>
                <td>
                    @if ($item->conditions)
                        @php
                            $newsubtotal = \Cart::session(auth()-> id())->get($item->id)->getPriceSum() + ($discountvalue * $totalqty);
                        @endphp
                        {{ $newsubtotal }} L.E
                    @else
                        {{ \Cart::session(auth()-> id())->get($item->id)->getPriceSum() }} L.E
                    @endif
                </td>
                <td>
                    <a href="{{ route('cart.destroy', $item -> id) }}">Delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
    @if (count($cartitems) !== 0)
    <div class="full-cart">
    <h3>
        Grand Total : <strong>{{ \Cart::session(auth()->id())-> getTotal() }} L.E (Shipping Excluded)</strong>
    </h3>
    <div class="order-btn">
    <a name="checkout" id="" class="btn btn-primary" href="{{ route('cart.checkout') }}" role="button">Proceed to Checkout</a>
    </div>
</div>
    @else
        <p class="empty-cart">Cart Empty</p> <br>
        <p class="empty-cart">Please add a product to your cart first</p>
    @endif



 @endsection

