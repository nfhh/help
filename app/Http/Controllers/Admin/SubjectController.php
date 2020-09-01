<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('children')->roots()->paginate(10)->toArray();
        return view('admins.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $subjects = Subject::with('children')->roots()->get()->toArray();
        return view('admins.subjects.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $excel_data = $request->has('file') ? readExcel2($request->file) : [];
        foreach ($excel_data as $k => &$arr) {
            $arr['parent_id'] = $request->parent_id;
            $arr['created_at'] = now();
            $arr['updated_at'] = now();
        }
        Subject::insert($excel_data);
        return redirect(route('admin.subject.index'));
    }

    public function edit(Subject $subject)
    {
        $subjects = Subject::with('children')->roots()->get()->toArray();
        return view('admins.subjects.edit', compact('subject', 'subjects'));
    }
}
