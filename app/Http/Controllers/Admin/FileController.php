<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dir;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $dirs = Dir::with('children')->roots()->get();
        $query = request()->query();
        $files = File::with('dir')->where($query)->orderBy('id', 'DESC')->paginate(10);
        return view('admins.files.index', compact('files', 'dirs', 'query'));
    }

    public function create()
    {
        $dirs = Dir::with('children')->roots()->get();
        return view('admins.files.create', compact('dirs'));
    }

    public function store(Request $request)
    {
        $file = $request->file;
        $dir_id = $request->dir_id;
        $dir = Dir::find($dir_id);
        if ($request->hasFile('file')) {
            $path = $file->storeAs($dir->name, $file->getClientOriginalName());
        }
        File::create([
            'dir_id' => $dir_id,
            'path' => $path ?? '',
        ]);
        return redirect(route('admin.file.index'));
    }

    public function edit(File $file)
    {

    }

    public function update(Request $request, File $file)
    {

    }

    public function destroy($id)
    {

    }
}
