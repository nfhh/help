<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::with(['menu', 'product'])->paginate(10)->toArray();
        return view('admins.downloads.index', compact('downloads'));
    }

    public function create()
    {
        $products = Product::all();
        $menus = Menu::all()->toArray();
        return view('admins.downloads.create', compact('products', 'menus'));
    }

    public function store(Request $request)
    {
        $excel_data = $request->has('file') ? readExcel2($request->file) : [];
        Download::create([
            'body' => json_encode($excel_data),
            'product_id' => $request->product_id,
            'menu_id' => $request->menu_id,
        ]);
        return redirect(route('admin.download.index'));
    }

    public function edit(Download $download)
    {
        $products = Product::all();
        $menus = Menu::all()->toArray();
        return view('admins.downloads.edit', compact('products', 'menus', 'download'));
    }

    public function update(Request $request, Download $download)
    {
        $download->product_id = $request->product_id;
        $download->menu_id = $request->menu_id;
        $download->body = $request->body;
        $download->save();
        return redirect(route('admin.download.index'));
    }

    public function destroy($id)
    {
        //
    }
}
