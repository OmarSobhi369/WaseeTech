<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getShippingFullAddressAttribute()
    {

        return  $this->shipping_fullname."<br>".$this->shipping_address . ', ' . $this->shipping_city . ', ' . $this->shipping_state . ', ' . $this->shipping_zipcode . "<br> phone: " . $this->shipping_phone;
    }

    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }

    public function generateSubOrders($grand_total)
    {
        $orderItems = $this->items;

        foreach($orderItems->groupBy('shop_id') as $shopId => $products) {

            $shop = Shop::find($shopId);
            /*
            $grand_total = 0;
            dd($products);
            foreach ($products as $product) {
                $grand_total = $product->pivot->price * $product->pivot->quantity;
            } */

            $suborder = $this->subOrders()->create([
                'order_id'=> $this->id,
                'seller_id'=> $shop->user_id ?? 1,
                'grand_total'=> $grand_total,
                'item_count'=> $products->count()
            ]);

            foreach($products as $product) {
                $suborder->items()->attach($product->id, ['price' => $product->pivot->price, 'quantity' => $product->pivot->quantity]);
            }

        }

    }
}
