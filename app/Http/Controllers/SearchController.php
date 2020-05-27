<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Faq;
use App\Models\Subject;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $form_data = $request->query();
        $kw = $form_data['kw'];
        $tb = $form_data['tb'];

        if ($tb === 'articles') {
            $results = Article::where('excel', 'LIKE', "%$kw%")->paginate(10);
        } else {
            $arr = explode('|', $tb);
            $subject_id = $arr[1] === '1' ? 1 : 2;
            $subjects = Subject::where('parent_id', $subject_id)->get()->toArray();
            $results = Faq::where('excel', 'LIKE', "%$kw%")->whereIn('subject_id', array_column($subjects, 'id'))->paginate(10);
        }
        return view('search.index', compact('results', 'tb'));
    }
}
