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
        Subject::create($request->except('_token'));
        return redirect(route('admin.subject.index'));
    }

    public function edit(Subject $subject)
    {
        $subjects = Subject::with('children')->roots()->get()->toArray();
        return view('admins.subjects.edit', compact('subject', 'subjects'));
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->except('_token'));
        return redirect(route('admin.subject.index'));
    }

    public function destroy($id)
    {
        //
    }
}
