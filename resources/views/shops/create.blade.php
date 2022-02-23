@extends('layouts.front')


@section('content')
@if ($companyname != "found")
<div class="summary">
<h2 class="cart">Shop Creation Request Submission</h2>

    <form action="{{route('shop.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Name of Shop</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" value="{{ $companyname }}" readonly>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="" rows="3" placeholder="Please describe your Company in details(your main product(s) being sold, physical address, etc. ), provide as much details as possible to increase your chance of approval"></textarea>
        </div>
        <div class="submit-btn">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@else
    <div class="cart">
        <p class="vendor">The shop creation request that you have already sent is being reviewed by the admin, <br>
        Patience is key!</p>
    </div>
@endif
</div>
@endsection
