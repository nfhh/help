<?php

namespace App\Http\Controllers;

use App\Models\Remark;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($var)
    {
        $remark = Remark::findOneBySlug($var);
        return view('post.show', compact('remark'));
    }
}
