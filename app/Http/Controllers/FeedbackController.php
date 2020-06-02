<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Jobs\SendEmail;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $url = $request->url;
        $body = $request->body;
        Feedback::create([
            'url' => $url,
            'reasons' => implode(',', $request->reasons),
            'body' => $body,
        ]);

        dispatch(new SendEmail(env('WEBMASTER_EMAIL'), [
            'url' => $url,
            'body' => $body,
        ]));

        return response()->json([
            'code' => 0,
            'message' => null,
            'data' => null,
        ], 201);
    }
}
