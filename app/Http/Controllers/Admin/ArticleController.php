<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Excel;
use App\Models\Template;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->paginate(10);
        return view('admins.articles.index', compact('articles'));
    }

    public function create()
    {
        $templates = Template::all();
        $categories = Category::with('children')->roots()->get();
        return view('admins.articles.create', compact('categories', 'templates'));
    }

    public function store(Request $request)
    {
        $form_data = $request->all();
        $article = Article::create([
            'body' => $form_data['body'],
            'category_id' => $form_data['category_id'],
        ]);

        $excel_data = readExcel($request->file);
        Excel::create([
            'text' => json_encode($excel_data),
            'article_id' => $article->id
        ]);

        return redirect(route('admin.article.index'));
    }

    public function edit(Article $article)
    {
        $templates = Template::all();
        $categories = Category::with('children')->roots()->get();
        return view('admins.articles.edit', compact('article', 'categories', 'templates'));
    }

    public function update(Request $request, Article $article)
    {
        $article->body = $request->body;
        $article->category_id = $request->category_id;
        $article->save();

        if ($request->hasFile('file')) {
            $excel_data = readExcel($request->file);
            $excel = Excel::where('article_id', $article->id)->first();
            $excel->text = json_encode($excel_data);
            $excel->save();
        }

        return redirect(route('admin.article.index'));
    }

    public function destroy($id)
    {
        //
    }
}
