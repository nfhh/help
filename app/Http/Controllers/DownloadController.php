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
        $menusx = [];
        foreach ($menus as $item){
            $menusx[$item['id']] = $item;
        }

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
        ksort($res);
        return view('downloads.index', compact('product', 'menusx', 'res'));
    }
}
