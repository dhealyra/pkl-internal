<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::select('products.id', 'products.name', 'products.slug', 'products.image','products.description', 'products.price', 'products.stock', 'categories.name as nama_kategori')->join('categories', 'products.category_id', '=', 'categories.id')->orderBy('products.created_at', 'DESC')->get();
        
        // buat respon dlu
        $res = [
            'success' => true,
            'message' => 'List Product',
            'data' => $product,
        ];

        return response()->json($res, 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (! $product) {
            $res = [
                'success' => false,
                'message' => 'Product Not Found',
            ];

            return response()->json($res, 404);
        }
    }
}
