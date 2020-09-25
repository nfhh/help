<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Menu;
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
        $downloads = Download::where('product_id', $product->id)->get()->toArray();
        $menus = Menu::all()->toArray();

        $res = [];
        foreach ($downloads as $key => &$list) {
            $m_id = $list['menu_id'];
            if (isset($res[$m_id])) {
                $a = $res[$m_id];
                $a[] = $list;
                $res[$m_id] = $a;
            } else {
                $res[$m_id] = [$list];
            }
        }

        $res = array_values($res);
        return view('downloads.index', compact('product', 'menus', 'res'));
    }
}
