<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Template;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->paginate(10)->toArray();
        return view('admins.articles.index', compact('articles'));
    }

    public function create()
    {
        $templates = Template::all();
        $categories = Category::with('grandchildren')->roots()->get();
        return view('admins.articles.create', compact('categories', 'templates'));
    }

    public function store(Request $request)
    {
        $form_data = $request->all();
        $excel_data = $request->hasFile('file') ? json_encode(readExcel($request->file, JSON_UNESCAPED_UNICODE)) : null;
        Article::create([
            'body' => $form_data['body'],
            'excel' => $excel_data,
            'category_id' => $form_data['category_id'],
        ]);

        return redirect(route('admin.article.index'));
    }

    public function edit(Article $article)
    {
        $templates = Template::all();
        $categories = Category::with('grandchildren')->roots()->get();
        return view('admins.articles.edit', compact('article', 'categories', 'templates'));
    }

    public function update(Request $request, Article $article)
    {
        $article->body = $request->body;
        if ($request->hasFile('file')) {
            $excel_data = readExcel($request->file);
            $article->excel = json_encode($excel_data, JSON_UNESCAPED_UNICODE);
        }
        $article->category_id = $request->category_id;
        $article->save();
        return redirect(route('admin.article.index'));
    }

    public function destroy($id)
    {
        //
    }
}
