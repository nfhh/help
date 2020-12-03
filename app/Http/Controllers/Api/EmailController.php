<?php

namespace App\Http\Controllers\Api;

use App\Models\Email;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        if ($request->email === 'admin@qq.com' || !$request->email) {
            return response()->json([
                'code' => 0,
            ], 200);
        }
        Email::create($request->all());
        return response()->json([
            'code' => 0,
        ], 201);
    }
}
