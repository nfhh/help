<?php

namespace App\Http\Controllers;

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
        $page_num = 1;
        $page_count = 1;
        $link = '/quickguide/steps';

        $offset = ($page_num - 1) * $page_count;

        $name = $request->query('product');

        $product = Product::where('name', $name)->first();

        $product_id = $product->id;

        $steps = Step::where([
            'product_id' => $product->id
        ])->offset($offset)->limit($page_count)->get();

        $total_page = ceil($steps->count() / $page_count);

        $url_params = [];
        $link = $link . ($url_params ? '?' . $url_params[0] . '&' : '?');


        return view('products.index', compact('page_num', 'total_page', 'page_count', 'link', 'steps', 'product_id', 'product'));
    }
}
