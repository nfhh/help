<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductResource::collection(Product::orderBy('sort')->get());
        foreach ($products as &$product) {
            $product['type'] = trans('help.' . Str::lower($product['type']));
        }
        return $products;
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
