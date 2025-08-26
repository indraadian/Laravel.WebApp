<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List semua produk
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Form create
    public function create()
    {
        return view('products.create');
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($request->except("_token"));

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Form edit
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate.');
    }

    // Hapus produk
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
