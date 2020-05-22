<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Subject;
use App\Models\Template;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('subject')->paginate(10)->toArray();
        return view('admins.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $templates = Template::all();
        $subjects = Subject::with('children')->roots()->get();
        return view('admins.faqs.create', compact('subjects', 'templates'));
    }

    public function store(Request $request)
    {
        $form_data = $request->all();
        $excel_data = $request->hasFile('file') ? json_encode(readExcel($request->file)) : null;
        Faq::create([
            'title' => $form_data['title'],
            'body' => $form_data['body'],
            'excel' => $excel_data,
            'subject_id' => $form_data['subject_id'],
        ]);

        return redirect(route('admin.faq.index'));
    }

    public function edit(Faq $faq)
    {
        $templates = Template::all();
        $subjects = Subject::with('children')->roots()->get();
        return view('admins.faqs.edit', compact('faq', 'subjects', 'templates'));
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->title = $request->title;
        $faq->body = $request->body;
        if ($request->hasFile('file')) {
            $excel_data = readExcel($request->file);
            $faq->excel = json_encode($excel_data);
        }
        $faq->subject_id = $request->subject_id;
        $faq->save();
        return redirect(route('admin.faq.index'));
    }

    public function destroy($id)
    {
        //
    }
}
