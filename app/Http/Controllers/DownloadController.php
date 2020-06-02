<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Product;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function show()
    {
        return view('downloads.show');
    }

    public function index(Request $request)
    {
        $product = Product::where('name', $request->product)->first();
        $downloads = Download::with('menu')->where('product_id', $product->id)->get()->toArray();

        $menu_id = [];
        foreach ($downloads as $key => &$list) {
            $b = $list['body'];
            $list['body'] = [$b];
            foreach ($menu_id as $k => $m_id) {
                if ($m_id == $list['menu_id']) {
                    $p_data = $downloads[$k];
                    $p_body = $p_data['body'];
                    $p_body[] = $b;
                    $p_data['body'] = $p_body;
                    $downloads[$k] = $p_data;
                    unset($downloads[$key]);
                }
            }
            $menu_id[] = $list['menu_id'];
        }

        return view('downloads.index', compact('product', 'downloads'));
    }
}
