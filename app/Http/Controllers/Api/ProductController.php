<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::orderBy('sort')->get());
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
