<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Download;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

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
        foreach ($menus as $item) {
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

    public function downapp()
    {
        $agent = new Agent();
        if ($agent->isPhone()) {
            return redirect()->to('https://apps.apple.com/cn/app/tnas-mobile/id1244630532');
        }
        return redirect()->to(config('filesystems.disks.oss.oss_url').Asset::where('apk',
                1)->orderByDesc('created_at')->first()->url);
    }
}
