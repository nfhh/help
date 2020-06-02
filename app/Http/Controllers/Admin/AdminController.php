<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function edit()
    {
        return view('admins.admins.edit');
    }

    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->password = bcrypt($request->password);
        $admin->save();
        return back()->with('success', '修改密码成功！');
    }
}
