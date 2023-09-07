<?php

namespace App\Http\Controllers\_front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('_front.home');
    }

    public function shop()
    {
        return view('_front.shop');
    }

    public function product(Product $product)
    {
        return view('_front.product', compact('product'));
    }

    public function checkout()
    {
        return view('_front.checkout');
    }
}
