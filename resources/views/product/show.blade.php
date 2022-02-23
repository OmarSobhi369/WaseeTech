@extends('layouts.front')


@section('content')

<div class="product-details ptb-100 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 col-12">
                <div class="product-details-5 pr-70">
                    {{-- {{dd($product)}} --}}
                    @if(!empty($product->cover_img))
                        <img src="{{asset('storage/'.$product->cover_img)}}" alt="">
                    @else
                        <img src="{{asset('assets/img/product-details/l1-details-5.png') }}" alt="">
                    @endif
                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-12">
                <div class="product-details-content">
                    <h2>{{$product->name}}</h3>

                    <br>

                    <h4>{{$product->min_qty}} - {{$product->regprice_max_qty}} Units</h4>
                    <div class="details-price">
                        <span >{{$product->price}} L.E/Unit</span>
                    </div>

                    <br>

                    <h4>{{$product->regprice_max_qty + 1}}+ Units</h4>
                    <div class="details-price">
                        <span>{{$product->price + $product->discount_value}} L.E/Unit</span>
                    </div>


                    <div class="mb-5">
                        <h6>Minimum Quantity Per Order: <strong>{{ $product->min_qty }}</strong></h6>
                    </div>

                    <div class="quickview-plus-minus">

                        <div class="quickview-btn-cart">
                            <a class="btn-hover-black" href="{{route('cart.add', $product)}}">add to cart</a>
                        </div>

                    </div>
                    <div class="product-details-cati-tag mt-35">
                        <ul>

                            {{-- {{ dd($thisvendor) }} --}}
                            @if($thiscategory != null)
                                <li class="categories-title">Categories :</li>
                                <li><a href="{{route('products.index', ['category_id' => $thiscategory->first()->id])}}">{{ $thiscategory->first()->name }}</a></li>
                            @endif

                        </ul>

                        <ul>

                                <li class="categories-title">Vendor:</li>
                                <li><a href="{{route('products.thisvendor', ['vendor_id' => $thisvendor->id])}}">{{ $thisvendor->name }}</a></li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- description section --}}

@include('product._description')

{{-- @include('product._related-product') --}}

@endsection
