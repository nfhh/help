<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $categories = Category::with('children')->roots()->get();
        return view('admins.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {

    }

    public function edit(Category $category)
    {

    }

    public function update(Request $request, Category $category)
    {

    }

    public function destroy($id)
    {
        //
    }
}
