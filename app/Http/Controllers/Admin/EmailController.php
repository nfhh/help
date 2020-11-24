<?php

namespace App\Http\Controllers\Admin;

use App\Email;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::orderBy('created_at', 'desc')->paginate(10);
        return view('admins.emails.index', compact('emails'));
    }
}
