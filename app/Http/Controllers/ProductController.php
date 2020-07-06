<?php

namespace App\Http\Controllers;

use App\Models\GuideExcel;
use App\Models\Product;
use App\Models\Step;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show()
    {
        return view('products.show');
    }

    public function index(Request $request)
    {
        $name = $request->query('product');
        $product = Product::where('name', $name)->first();
        $product_id = $product->id;
        $excel = json_decode(GuideExcel::first()->excel,true);
        $steps = Step::where('product_id', $product_id)->orderBy('sort')->simplePaginate(1);
        return view('products.index', compact('steps', 'product_id', 'product', 'excel'));
    }
}
