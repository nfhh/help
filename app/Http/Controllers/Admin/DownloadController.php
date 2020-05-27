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

    }

    public function create()
    {
        $products = Product::all();
        $menus = Menu::all()->toArray();
        return view('admins.downloads.create', compact('products', 'menus'));
    }

    public function store(Request $request)
    {
        Dir::create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
        ]);
        return redirect(route('admin.dir.index'));
    }

    public function edit(Dir $dir)
    {
        $dirs = Dir::with('children')->roots()->get();
        return view('admins.dirs.edit', compact('dir', 'dirs'));
    }

    public function update(Request $request, Dir $dir)
    {
        $dir->name = $request->name;
        $dir->parent_id = $request->parent_id;
        $dir->save();
        return redirect(route('admin.dir.index'));
    }

    public function destroy($id)
    {
        //
    }
}
