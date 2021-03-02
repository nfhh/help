<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function index()
    {
        return view('test.index');
    }

    public function store()
    {
        $file = request()->file('file');
        dd(readExcel2($file));
    }
}
