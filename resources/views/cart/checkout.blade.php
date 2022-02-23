@extends('layouts.front')

@section('content')

    <div class="checkout-form">
     <h2>Checkout</h2>

     <h3>Shipping Information</h3>

     <form action="{{ route('orders.store') }}" method="post">
        @csrf


        <div class="form-group">
        <label for="">Full Name</label>
        <input type="text" name="shipping_fullname" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="">State</label>
            <input type="text" name="shipping_state" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group">
                <label for="">City</label>
                <input type="text" name="shipping_city" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="">Zip</label>
            <input type="text" name="shipping_zipcode" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="">Full Address</label>
            <input type="text" name="shipping_address" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="">Mobile</label>
            <input type="text" name="shipping_phone" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="">Notes Regarding your Delivery? (Optional)</label>
            <textarea id="" name="notes" rows="4" class="form-control"></textarea>
        </div>

        <h4>Payment Option</h4>

        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" value="cash_on_delivery">
            Cash on Delivery
          </label>
         <br>
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" value="cash_on_delivery">
            Pay by Credit card
          </label>
          <br>
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" value="cash_on_delivery">
            Applying for a loan
          </label>
        </div>

        <div class="order-btn">
        <button type="submit" class="btn btn-primary mt-3">Place Order</button>
        </div>
    </div>
    </form>



        @endsection
