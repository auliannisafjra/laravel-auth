<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function list()
    {
        $products = Product::paginate(5);

        return view('products.list', compact('products'));
    }

    public function create()
    {
        return view('products.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('katalog', 'public');
        }

        $product = new Product();
        $product->user_id = Auth::id();
        $product->foto = $imagePath;
        $product->nama = $request->nama;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kondisi = $request->kondisi;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        return redirect()->route('products.list')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCreateRequest $request, $id)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('katalog', 'public');
        }

        $product = Product::findOrFail($id);
        $product->foto = $imagePath;
        $product->nama = $request->nama;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kondisi = $request->kondisi;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        return redirect()->route('products.list')->with('success', 'Produk berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.list')->with('success', 'Produk berhasil dihapus!');
    }
}
