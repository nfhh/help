<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Mavinoo\Batch\BatchFacade;


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

    public function edit()
    {
        $subjects = Subject::with('children')->roots()->get()->toArray();
        return view('admins.subjects.edit', compact('subjects'));
    }

    public function update()
    {
        $parent_id = request('parent_id');
        $subject = Subject::findOrFail($parent_id); // str
        $subject_children = $subject->children->toArray();
        $excel_data = request()->has('file') ? readExcel2(request()->file) : [];

        $update = [];
        $add = [];
        foreach ($excel_data as $row) {
            $f = true;
            foreach ($subject_children as $item) {
                if ($row['var'] === $item['var']) {
                    if ($row['zh-cn'] !== $item['zh-cn'] || $row['zh-hk'] !== $item['zh-hk'] || $row['en-us'] !== $item['en-us'] || $row['ko-kr'] !== $item['ko-kr'] || $row['ja-jp'] !== $item['ja-jp'] || $row['de-de'] !== $item['de-de'] || $row['fr-fr'] !== $item['fr-fr'] || $row['it-it'] !== $item['it-it'] || $row['es-es'] !== $item['es-es'] || $row['hu-hu'] !== $item['hu-hu'] || $row['pl-pl'] !== $item['pl-pl'] || $row['tr-tr'] !== $item['tr-tr'] || $row['ru-ru'] !== $item['ru-ru']) {
                        unset($item['created_at']);
                        $item['updated_at'] = now();
                        $update[] = array_merge($item, $row);
                    }
                    $f = false;
                    break;
                }
            }
            if ($f == true) {
                $add[] = $row;
            }
        }

        $subjectInstance = new Subject;
        BatchFacade::update($subjectInstance, $update, 'id');

        $subject->children()->createMany($add);

        return redirect(route('admin.subject.index'))->with('success', '编辑FAQ分类管理成功！');
    }
}
