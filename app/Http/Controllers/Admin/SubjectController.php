<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Subject;
use Mavinoo\Batch\BatchFacade;


class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('children')->roots()->get();
        return view('admins.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $subjects = Subject::with('children')->roots()->get()->toArray();
        return view('admins.subjects.create', compact('subjects'));
    }

    public function store()
    {
        $subjects = Subject::all();
        $excel_data = request()->has('file') ? readExcel2(request()->file) : [];
        $parent_id = request('parent_id');

        if ($subjects->isEmpty()) {
            foreach ($excel_data as $k => &$arr) {
                $arr['parent_id'] = $parent_id;
                $arr['created_at'] = now();
                $arr['updated_at'] = now();
            }
            Subject::insert($excel_data);
            return redirect(route('admin.subject.index'))->with('success', '添加FAQ分类管理成功！');
        }

        $subject = Subject::findOrFail($parent_id); // str
        $subject_children = $subject->children->toArray();

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

    public function update()
    {
        $id_sort = request('sorts');
        $update = [];
        foreach ($id_sort as $k => $v) {
            $update[] = [
                'id' => $k,
                'sort' => $v,
            ];
        }
        $subjectInstance = new Subject;
        BatchFacade::update($subjectInstance, $update, 'id');
        return redirect(route('admin.subject.index'))->with('success', 'FAQ分类排序成功！');
    }

    public function destroy($id)
    {
        $faqs = Faq::where('subject_id', $id)->get();
        if (!($faqs->isEmpty())) {
            return response()->json([
                'code' => -1,
                'message' => '该分类下有文章删除失败！'
            ]);
        }
        Subject::destroy($id);
        return response()->json([
            'code' => 0,
            'message' => '删除分类成功！'
        ]);
    }
}
