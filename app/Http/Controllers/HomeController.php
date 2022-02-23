<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::take(30)->get();

        $categories = Category::whereNull('parent_id')->get();


        return view('home', ['allProducts' => $product,'categories'=>$categories]);
    }

    public function contact()
    {
        return view('contact');
    }
}
