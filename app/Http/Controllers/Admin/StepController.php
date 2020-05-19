<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExcelTwo;
use App\Models\Product;
use App\Models\Step;
use App\Models\Template;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function index()
    {
        $steps = Step::with('product')->paginate(10);
        return view('admins.steps.index', compact('steps'));
    }

    public function create()
    {
        $templates = Template::all();
        $products = Product::all();
        return view('admins.steps.create', compact('products', 'templates'));
    }

    public function store(Request $request)
    {
        $form_data = $request->all();
        $step = Step::create([
            'body' => $form_data['body'],
            'product_id' => $form_data['product_id'],
            'sort' => $form_data['sort'],
        ]);

        $excel_data = readExcel($request->file);
        ExcelTwo::create([
            'text' => json_encode($excel_data),
            'step_id' => $step->id
        ]);

        return redirect(route('admin.step.index'));
    }

    public function edit(Step $step)
    {
        $templates = Template::all();
        $products = Product::all();
        return view('admins.steps.edit', compact('step', 'products', 'templates'));
    }

    public function update(Request $request, Step $step)
    {
        $step->body = $request->body;
        $step->product_id = $request->product_id;
        $step->sort = $request->sort;
        $step->save();

        if ($request->hasFile('file')) {
            $excel_data = readExcel($request->file);
            $excel = ExcelTwo::where('step_id', $step->id)->first();
            $excel->text = json_encode($excel_data);
            $excel->save();
        }

        return redirect(route('admin.step.index'));
    }

    public function destroy($id)
    {
        //
    }
}
