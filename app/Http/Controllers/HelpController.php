<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->query('category_id', 2);
        $article = Article::where('category_id', $category_id)->first();
        $categories = Category::with('children')->roots()->get()->toArray();
        return view('helps.index', compact('categories', 'article'));
    }
}
