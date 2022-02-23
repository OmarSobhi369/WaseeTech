@extends('layouts.front')


@section('content')

<div class="container">

    <h2> {{ $vendorName ?? null }} Products </h2>

    <div class="custom-row-2">
    @foreach ($products as $product)

        @include('product._single_product')
    @endforeach

    </div>


</div>

@endsection


