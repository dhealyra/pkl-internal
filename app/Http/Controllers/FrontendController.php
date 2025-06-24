<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function index()
    {
        $product = Product::latest()->take(8)->get();
        return view('index', compact('product'));
    }

    public function about()
    {
        return view('about');
    }

    public function product()
    {
        $product = Product::latest()->get();
        return view('product');
    }

    public function cart()
    {
        return view('cart');
    }
}
