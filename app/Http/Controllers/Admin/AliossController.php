<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Storage;

class AliossController extends Controller
{
    public function dir()
    {
        $dirs = Storage::allDirectories();
        return view('admins.alioss.dir', compact('dirs'));
    }

    public function index()
    {
        $files = Storage::allFiles(request()->query('dir'));
        return view('admins.alioss.files', compact('files'));
    }
}
