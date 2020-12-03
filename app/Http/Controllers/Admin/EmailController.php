<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EmailsQueryExport;
use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::latest()->paginate();
        $start_date = now()->format('Y-m-d');
        $end_date = now()->addDays(7)->format('Y-m-d');
        return view('admins.emails.index', compact('emails', 'start_date', 'end_date'));
    }

    public function export(Request $request)
    {
        return new EmailsQueryExport([$request->start_date.' 00:00:00', $request->end_date.' 23:59:59']);
    }
}
