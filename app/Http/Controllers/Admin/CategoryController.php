<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('grandchildren')->roots()->paginate(10)->toArray();
        return view('admins.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::with('grandchildren')->roots()->get()->toArray();
        return view('admins.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create($request->except('_token'));
        return redirect(route('admin.category.index'));
    }

    public function edit(Category $category)
    {
        $categories = Category::with('grandchildren')->roots()->get()->toArray();
        return view('admins.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->except('_token'));
        return redirect(route('admin.category.index'));
    }

    public function destroy($id)
    {
        //
    }
}
