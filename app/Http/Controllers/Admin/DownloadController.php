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
        $downloads = Download::with(['menu', 'product'])->orderBy('created_at', 'DESC')->paginate(20);
        return view('admins.downloads.index', compact('downloads'));
    }

    public function create()
    {
        $products = Product::all();
        $menus = Menu::all();
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
        return redirect(route('admin.download.index'))->with('success', '添加下载成功！');
    }

    public function edit(Download $download)
    {
        $products = Product::all();
        $menus = Menu::all();
        return view('admins.downloads.edit', compact('products', 'menus', 'download'));
    }

    public function update(Request $request, Download $download)
    {
        $data = [];
        if ($request->has('file')) {
            $excel_data = readExcel2($request->file);
            $data['body'] = json_encode($excel_data);
        }
        $data['product_id'] = $request->product_id;
        $data['menu_id'] = $request->menu_id;
        $download->update($data);
        return redirect(route('admin.download.index'))->with('success', '编辑下载成功！');
    }

    public function destroy($id)
    {
        Download::destroy($id);
        return response()->json([
            'code' => 0,
            'message' => '删除成功！'
        ]);
    }
}
