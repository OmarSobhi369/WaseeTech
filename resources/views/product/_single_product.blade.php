<div class="custom-col-style-2 custom-col-4">
    <div class="product-wrapper product-border mb-24">
        <div class="product-img-3">
            <a href="{{route('products.show', $product)}}">
                @if(!empty($product->cover_img))
                    <img src="{{asset('storage/'.$product->cover_img)}}" alt="">
                @else
                    <img src="{{asset('assets/img/product/electro/2.jpg') }}" alt="">
                @endif
            </a>
            <div class="product-action-right">
                <a class="animate-top" title="Add To Cart" href="{{route('cart.add', $product->id)}}">
                    <i class="pe-7s-cart"></i>
                </a>

            </div>
        </div>
        <div class="product-content-4 text-center">

            <h4><a href="{{route('products.show', $product)}}">{{$product->name}}</a></h4>
            {{-- <span>{!! $product->description !!}</span> --}}
            <h5>{{$product->price}} L.E/Unit</h5>
        <p>Vendor: {{$product->shop->name ?? 'n/a'}} <br>
        Category: {{$product->categories->first()->name ?? 'n/a'}}</p>
        </div>
    </div>
</div>
