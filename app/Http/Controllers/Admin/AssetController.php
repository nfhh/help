<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::orderBy('created_at', 'desc')->paginate(10);
        return view('admins.assets.index', compact('assets'));
    }

    public function create()
    {
        return view('admins.assets.create');
    }

    public function store(Request $request)
    {
        Asset::create($request->all());
    }
}
