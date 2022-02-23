<?php

namespace App\Http\Controllers;

use App\Product;
use App\Shop;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryId = request('category_id');

        $category = Category::find($categoryId);
        $categoryName = ucfirst($category->name);

        $products = $category->allProducts();



        return view('product.index', compact('products', 'categoryName'));
    }

    public function thisvendor()
    {

        $vendorId = request('vendor_id');
        $vendor = Shop::find($vendorId);
        $products = Product::where('shop_id', $vendorId)->paginate(4);
        $vendorName = $vendor->name;

        return view('product.thisvendor', compact('products', 'vendorName'));
    }

    public function search(Request $request)
    {
        /* dd($request->input('sort')); */
        $query = $request->input('query');
        /* dd($query); */
        $results = Product::where('name','LIKE',"%$query%");

        if( $request->input('sort') == 'price_asc'){

            $products = $results->orderBy('price')->get();
            $productcount = count($products);

            return view('product.catalog',compact('products', 'productcount'));

        }elseif( $request->input('sort') == 'price_desc'){

            $products = $results->orderByDesc('price')->get();
            $productcount = count($products);
            /* dd($products); */
            return view('product.catalog',compact('products', 'productcount'));

        }else{

            $products = $results->get();
            $productcount = count($products);
            /* dd($products); */

            return view('product.catalog',compact('products', 'productcount'));
        }


    }

    public function show(Product $product)
    {
        $thiscategory = $product->categories;
        $thisvendor = $product->shop;

        if(($thiscategory->first()) != null){
            return view('product.show', compact('product', 'thiscategory', 'thisvendor'));
        }else {
            return view('product.show', compact('product', 'thisvendor'))->with('thiscategory', null);
        }


    }


}
