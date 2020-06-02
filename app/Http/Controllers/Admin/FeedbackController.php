<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->paginate(10);
        return view('admins.feedbacks.index', compact('feedbacks'));
    }

    public function update(Request $request)
    {
        $feedback = Feedback::find($request->id);
        $feedback->status = $request->status;
        $feedback->save();
        return response()->json([
            'code' => 0,
            'message' => null,
            'data' => null,
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
