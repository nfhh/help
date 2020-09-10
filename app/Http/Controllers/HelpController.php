<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class HelpController extends Controller
{
    public function index($var = null)
    {
        $category = $var ? Category::findOneByVar($var) : Category::first();
        $article = Article::where('category_id', $category->id)->first();
        $fenlei = Category::findAllToTree();
        $parent_id = 'tos_help';
        return view('helps.index', compact('fenlei', 'article', 'parent_id'));
    }
}
