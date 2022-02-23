@extends('layouts.front')

@section('content')

<div class="pl-200 pr-200 overflow clearfix">
    <div class="categori-menu-slider-wrapper clearfix">
        <div class="categories-menu">
            <div class="category-heading">
                <h3> All Categories <i class="pe-7s-angle-down"></i></h3>
            </div>
            <div class="category-menu-list">
                <ul>
                    @foreach($categories as $category)
                        <li>
                        <a href="{{route('products.index', ['category_id' => $category->id])}}">{{$category->name}}<i
                                    class="pe-7s"></i></a>

                                    @php
                                        $children = TCG\Voyager\Models\Category::where('parent_id', $category->id)->get();
                                    @endphp

                               @if($children->isNotEmpty())
                                <div class="category-menu-dropdown">

                                    @foreach ($children as $child)
                                        <div class="category-dropdown-style category-common3">
                                            <h4 class="categories-subtitle">
                                                <a href="{{route('products.index', ['category_id' => $child->id])}}">
                                                {{$child->name}}
                                                </a>

                                            </h4>
                                            @php
                                                $grandChild = TCG\Voyager\Models\Category::where('parent_id', $child->id)->get();
                                            @endphp
                                            @if($grandChild->isNotEmpty())
                                                <ul>
                                                    @foreach ($grandChild as $c)
                                                        <li><a href="{{route('products.index', ['category_id' => $c->id])}}">{{$c->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    @endforeach


                                </div>

                              @endif
                        </li>

                    @endforeach

                </ul>
            </div>
        </div>
        <div class="menu-slider-wrapper">

            <div class="slider-area">
                <div class="slider-active owl-carousel">
                    <div class="single-slider single-slider-hm3 bg-img pt-170 pb-173"
                        style="background-image: url(assets/img/slider/hp.jpeg)">
                        <div class="slider-animation slider-content-style-3 fadeinup-animated">
                            <h2 class="animated">Explore the Best Office Solutions </h2>
                            <h4 class="animated">Best Product With warranty </h4>
                            {{-- <a class="electro-slider-btn btn-hover" href="product-details.html">buy now</a> --}}
                        </div>
                    </div>
                    <div class="single-slider single-slider-hm3 bg-img pt-170 pb-173"
                        style="background-image: url(assets/img/slider/collection.jpg)">
                        <div class="slider-animation slider-content-style-3 fadeinup-animated">
                            <h2 class="animated">Get a discount Now!</h2>
                            <h4 class="animated">When Buying Over a Certain Quantity </h4>
                            {{-- <a class="electro-slider-btn btn-hover" href="product-details.html">buy now</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="electronic-banner-area">
        <div class="section-title-4 text-center mb-40">
            <h2>Our Top OEMs</h2>
        </div>
        <div class="custom-row-2">

            <div class="custom-col-style-2 electronic-banner-col-2 mb-30">
                <div class="electronic-banner-wrapper">
                    <img src="assets/img/banner/hplogo1.png"  alt="">
                    {{-- <div class="electro-banner-style electro-banner-position">
                        <h1>Live 4K! </h1>
                        <h4>Amazon exclusives</h4>
                        <a href="product-details.html">Buy Now→</a>
                    </div> --}}
                </div>
            </div>
            <div class="custom-col-style-2 electronic-banner-col-2 mb-30 ">
                <div class="electronic-banner-wrapper">
                    <img src="assets/img/banner/acerlogo.jpg"  alt="">
                </div>
            </div>
            <div class="custom-col-style-2 electronic-banner-col-2 mb-30">
                <div class="electronic-banner-wrapper">
                    <img src="assets/img/banner/lenovologo1.png"  alt="">
                </div>

            </div>
            <div class="custom-col-style-2 electronic-banner-col-2 mb-30">
                <div class="electronic-banner-wrapper">
                    <img src="assets/img/banner/delllogo.png"  alt="">
                </div>
            {{-- <div class="custom-col-style-2 electronic-banner-col-2 mb-30">
                <div class="electronic-banner-wrapper">
                    <img src="assets/img/banner/sell.png" alt="" width="">
                </div>
            </div> --}}
        </div>
    </div>

    <div class="electro-product-wrapper wrapper-padding pt-95 pb-45">

        <div class="container-fluid">
            <div class="section-title-4 text-center mb-40">
                <h2> Featured Products</h2>
            </div>
            <div class="top-product-style">

                <div>
                    <div id="electro1">
                        <div class="custom-row-2">

                            @foreach($allProducts as $product)
                                @include('product._single_product')

                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
