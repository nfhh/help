<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort')->get();
        return view('admins.products.index', compact('products'));
    }

    public function create()
    {
        return view('admins.products.create');
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'sort' => $request->sort
        ]);
        return redirect(route('admins.products.index'));
    }

    public function edit(Product $product)
    {
        return view('admins.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->sort = $request->sort;
        $product->save();
        return redirect(route('admins.products.index'));
    }

    public function destroy(Product $product)
    {
        //
    }
}
