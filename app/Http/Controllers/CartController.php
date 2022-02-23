<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Product;
use Cart;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function add(Product $product)
    {
        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'min_qty' => $product->min_qty,
            'quantity' => $product->min_qty,
            'attributes' => array(),
            'regprice_max_qty' => $product->regprice_max_qty,
            'discount_value' => $product->discount_value,
            'associatedModel' => $product
        ));

        return back();
    }


    public function index()
    {
        $cartitems = \Cart::session(auth()->id())->getContent();

        foreach($cartitems as $item){
            
            if (!($item->conditions)) {
                if($item->quantity > $item->regprice_max_qty){

                    $productID = $item->id;
                    $discount = new \Darryldecode\Cart\CartCondition(array(
                    'name' => 'HIGH QTY DISCOUNT',
                    'type' => 'discount',
                    'value' => $item->discount_value,
                    ));

                    \Cart::session(auth()->id())->addItemCondition($productID, $discount);


                }
            } else {
                if($item->quantity <= $item->regprice_max_qty){
                    \Cart::session(auth()->id())->clearItemConditions($item->id);
                }
            }
        }

        return view('cart.index', compact('cartitems'));
    }


    public function destroy($itemId)
    {
        //remove the item using its ID
        \Cart::session(auth()->id())->remove($itemId);

        return back();
    }


    public function update($rowId)
    {
        \Cart::session(auth()->id())->update($rowId, [
            'quantity' => [
                'relative' => false,
                'value' => request('quantity')
            ]
        ]);

        return $this->index();
    }


    public function checkout()
    {
        $cartitems = \Cart::session(auth()->id())->getContent();
        return view('cart.checkout', compact('cartitems'));
    }


    public function applyCoupon()
    {
        $couponCode = request('coupon_code');

        $couponData = Coupon::where('code', $couponCode)->first();

        if(!$couponData) {
            return back()->withMessage('Sorry! Coupon does not exist');
        }


        //coupon logic
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name,
            'type' => $couponData->type,
            'target' => 'total',
            'value' => $couponData->value,
        ));

        Cart::session(auth()->id())->condition($condition); // for a specific user's cart


        return back()->withMessage('coupon applied');

    }
}
