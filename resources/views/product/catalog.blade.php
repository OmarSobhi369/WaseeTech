@extends('layouts.front')


@section('content')





    <div class="container">
        <div class="custom-row-2">






                    {{-- {{$products->appends(['query'=>request('query')])->render()}} --}}


            <div class="shop-product-wrapper res-xl res-xl-btn">
                <div class="shop-bar-area">
                    <div class="shop-bar pb-60">
                        <div class="shop-found-selector">
                            <div class="shop-found">
                                <p><span>{{ $productcount }}</span> Products Found </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <span>Sort By: </span>
                        <a href="{{URL::current()."?sort=price_asc"}}">Price - Low to High</a>/
                        <a href="{{URL::current()."?sort=price_desc"}}">Price - High to Low</a>

                    </div>
                    <div class="shop-product-content tab-content">
                        <div id="grid-sidebar1" class="tab-pane fade active show">
                            <div class="row">

                                @foreach($products as $product)
                                    @include('product._single_product')
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
