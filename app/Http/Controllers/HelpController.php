<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class HelpController extends Controller
{
    public function index()
    {
        $fenlei = Category::findAllToTree();
        $articles = Article::with('category')->orderBy('click', 'desc')->paginate(10);
        return view('helps.index', compact('fenlei', 'articles'));
    }

    public function show($var)
    {
        $category = Category::findOneByVar($var);
        $article = Article::where('category_id', $category->id)->first();
        $fenlei = Category::findAllToTree();
        $parent_id = 'tos_help';
        return view('helps.show', compact('fenlei', 'article', 'parent_id'));
    }
}
