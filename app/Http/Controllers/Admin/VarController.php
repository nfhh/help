<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VarController extends Controller
{
    public function index()
    {
        return view('admins.var.index');
    }

    public function handle(Request $request)
    {
        $arr = $request->except('_token');
        $arr = explode(PHP_EOL, $arr['var']);
        $str = '';
        foreach ($arr as $v) {
            preg_match_all('/\w+/', $v, $matches);
            $res = implode('_', $matches[0]);
            $str .= $res . PHP_EOL;
        }
        return response()->json([
            'data' => rtrim($str, PHP_EOL)
        ]);
    }
}
