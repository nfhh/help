<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuideExcel;
use Illuminate\Http\Request;

class GuideExcelController extends Controller
{
    public function create()
    {
        return view('admins.guide_excel.create');
    }

    public function store(Request $request)
    {
        $excel_data = $request->has('file') ? readExcel($request->file) : [];
        foreach ($excel_data as $k => &$arr) {
            $arr['created_at'] = now();
            $arr['updated_at'] = now();
        }
        GuideExcel::truncate();
        GuideExcel::create(['excel' => json_encode($excel_data, JSON_UNESCAPED_UNICODE)]);
        return back()->with('success', '上传成功！');
    }
}
