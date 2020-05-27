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

        $product_id = $request->query('product_id');

        $steps = Step::where([
            'product_id' => $product_id
        ])->offset($offset)->limit($page_count)->get();

        $total_page = ceil($steps->count() / $page_count);

        $url_params = [];
        $link = $link . ($url_params ? '?' . $url_params[0] . '&' : '?');

        $product = Product::find($product_id);

        return view('products.index', compact('page_num', 'total_page', 'page_count', 'link', 'steps', 'product_id', 'product'));
    }
}
