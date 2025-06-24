<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest()->get();

        $tittle = 'Hapus Data!';
        $text = 'Apakah anda yakin?';
        confirmDelete($tittle, $text);

        return view('backend.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required',
            'category_id'=>'required',
            'price'=> 'required|numeric',
            'description'=>'required',
            'stock'=>'required|numeric',
            'image'=>'required|image|mimes:jpg, png',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        // upload gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $randomName = Str::random(20). '-' . $file->getClientOriginalExtension();
            $path = $file->storeAs('products', $randomName, 'public');
            // Masukkan nama image ke db
            $product->image = $path;
        }

        $product->save();
        toast('Data berhasil disimpan', 'success');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        return view('backend.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'=> 'required',
            'category_id'=>'required',
            'price'=> 'required|numeric',
            'description'=>'required',
            'stock'=>'required|numeric',
            // 'image'=>'required|image|mimes:jpg, png',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        // upload gambar
        if ($request->hasFile('image')) {
            // hapus fto lama
            Storage::disk('public')->delete($product->image);
            // up foto baru
            $file = $request->file('image');
            $randomName = Str::random(20). '-' . $file->getClientOriginalExtension();
            $path = $file->storeAs('products', $randomName, 'public');
            // Masukkan nama image ke db
            $product->image = $path;
        }

        $product->save();
        toast('Data berhasil disimpan', 'success');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Storage::disk('public')->delete($product->image);
        $product->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('product.index');
    }
}
