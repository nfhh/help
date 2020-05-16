<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Excel;
use App\Models\Template;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

        $excel_data = $this->readExcel($request->file);
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

        if ($request->file) {
            $excel_data = $this->readExcel($request->file);
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

    protected function readExcel($file)
    {
        $sh = [];
        $arr = [];
        $spreadsheet = IOFactory::load($file);
        foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
            $excel_data = [];
            foreach ($sheet->getRowIterator() as $key1 => $row) {
                $ce = array();
                if ($key1 == 1) {
                    $a = $row->getCellIterator();
                    foreach ($a as $aa) {
                        $arr[] = $aa->getValue();
                    }
                    continue;
                }
                $k = 0;
                foreach ($row->getCellIterator() as $key2 => $cell) {
                    $data = $cell->getValue();
                    $ce[$arr[$k]] = $data;
                    $k++;
                }
                $excel_data[$ce[$arr[2]]] = $ce;
            }
            $sh[] = $excel_data;
        }
        return $sh[0];
    }
}
