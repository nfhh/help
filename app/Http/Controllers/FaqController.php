<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Subject;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $subject_id = $request->subject_id;
        $subject = Subject::find($subject_id);
        $parent_id = $subject->parent_id;
        if ($subject->parent_id === 0) {
            $subjects = Subject::where('parent_id', $subject_id)->get()->toArray();
            $faqs = Faq::whereIn('subject_id', array_column($subjects, 'id'))->paginate(10);
        } else {
            $subject = Subject::where('id', $subject_id)->first();
            $subjects = Subject::where('parent_id', $subject->parent_id)->get()->toArray();
            $faqs = Faq::where('subject_id', $subject_id)->paginate(10);
        }
        return view('faqs.index', compact('subjects', 'faqs', 'parent_id'));
    }

    public function show(Faq $faq)
    {
        $subject_id = $faq->subject_id;
        $subject = Subject::where('id', $subject_id)->first();
        $subjects = Subject::where('parent_id', $subject->parent_id)->get();
        return view('faqs.show', compact('subjects', 'faq'));
    }
}
