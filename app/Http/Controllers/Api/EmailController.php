<?php

namespace App\Http\Controllers\Api;

use App\Email;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        Email::create($request->all());
        return response()->json([
            'code' => 0,
        ], 201);
    }
}
