<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Remark;
use App\Models\Template;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function index()
    {
        $remarks = Remark::paginate(20);
        return view('admins.remarks.index', compact('remarks'));
    }

    public function create()
    {
        $templates = Template::all();
        return view('admins.remarks.create', compact('templates'));
    }

    public function store(Request $request)
    {
        $form_data = $request->except('_token');
        $excel_data = $request->hasFile('file') ? json_encode(readExcel($request->file, JSON_UNESCAPED_UNICODE)) : null;
        $form_data['excel'] = $excel_data;
        unset($form_data['file']);
        Remark::create($form_data);
        return redirect(route('admin.remark.index'));
    }

    public function edit(Remark $remark)
    {
        $templates = Template::all();
        return view('admins.remarks.edit', compact('remark', 'templates'));
    }

    public function update(Request $request, Remark $remark)
    {
        $form_data = $request->except('_token');
        if ($request->hasFile('file')) {
            $excel_data = readExcel($request->file);
            $form_data['excel'] = json_encode($excel_data, JSON_UNESCAPED_UNICODE);
            unset($form_data['file']);
        }
        $remark->update($form_data);
        return redirect(route('admin.remark.index'));
    }

    public function destroy(Remark $remark)
    {
        //
    }
}
