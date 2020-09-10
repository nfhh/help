<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Subject;

class FaqController extends Controller
{
    public function index($var)
    {
        $subject = Subject::findOneByVar($var);
        if ($subject->parent_id === 0) {
            $subjects = Subject::where('parent_id', $subject->id)->get()->toArray();
            $faqs = Faq::whereIn('subject_id', array_column($subjects, 'id'))->paginate(10);
        } else {
            $subjects = Subject::where('parent_id', $subject->parent_id)->get()->toArray();
            $faqs = Faq::with('subject')->where('subject_id', $subject->id)->paginate(10);
        }
        return view('faqs.index', [
            'fenlei' => $subjects,
            'faqs' => $faqs,
        ]);
    }

    public function show($var, $title)
    {
        $faq = Faq::where('title', $title)->first();
        $subject_id = $faq->subject_id;
        $subject = Subject::where('id', $subject_id)->first();
        $subjects = Subject::where('parent_id', $subject->parent_id)->get();
        return view('faqs.show', [
            'fenlei' => $subjects,
            'faq' => $faq,
        ]);
    }
}
