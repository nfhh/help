<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dir;
use Illuminate\Http\Request;

class DirController extends Controller
{
    public function index()
    {
        $dirs = Dir::with('children')->roots()->paginate(10);
        return view('admins.dirs.index', compact('dirs'));
    }

    public function create()
    {
        $dirs = Dir::with('children')->roots()->get();
        return view('admins.dirs.create', compact('dirs'));
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
