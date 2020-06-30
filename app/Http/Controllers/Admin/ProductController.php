<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Step;
use App\Models\ProductExcel;
use App\Models\Template;
use App\Models\Template2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort')->get();
        return view('admins.products.index', compact('products'));
    }

    public function create()
    {
        return view('admins.products.create');
    }

    public function store(Request $request)
    {
        $form_data = $request->except('token');
        $excel_data = $request->hasFile('file') ? json_encode(readExcel($request->file), JSON_UNESCAPED_UNICODE) : null;
        Product::create([
            'name' => $form_data['name'],
            'size' => $form_data['size'],
            'type' => $form_data['type'],
            'sort' => $form_data['sort'],
            'excel' => $excel_data,
        ]);

        return redirect(route('admin.product.index'));
    }

    public function edit(Product $product)
    {
        return view('admins.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->size = $request->size;
        $product->type = $request->type;
        $product->sort = $request->sort;
        if ($request->hasFile('file')) {
            $excel_data = readExcel($request->file);
            $product->excel = json_encode($excel_data, JSON_UNESCAPED_UNICODE);
        }
        $product->save();
        return redirect(route('admin.product.index'));
    }

    public function listStepByproductId($product_id)
    {
        $steps = Step::with('product')->where('product_id', $product_id)->paginate(10);
        $product = Product::findOrFail($product_id);
        return view('admins.products.steps.index', compact('steps', 'product'));
    }

    public function createStep()
    {
        $products = Product::select('id', 'name')->get();
        $templates = Template2::all();
        return view('admins.products.steps.create', compact('products', 'templates'));
    }

    public function storeStep(Request $request)
    {
        Step::create([
            'title' => $request->title,
            'body' => $request->body,
            'product_id' => $request->product_id,
            'sort' => $request->sort,
        ]);
        parse_str(parse_url(URL::previous(), PHP_URL_QUERY), $arr);
        return redirect($arr['redirect_url']);
    }

    public function editStep(Request $request)
    {
        $step = Step::find($request->step_id);
        $products = Product::select('id', 'name')->get();
        $templates = Template2::all();
        return view('admins.products.steps.edit', compact('step', 'products', 'templates'));
    }

    public function updateStep(Request $request)
    {
        $step = Step::find($request->id);
        $step->title = $request->title;
        $step->body = $request->body;
        $step->product_id = $request->product_id;
        $step->sort = $request->sort;
        $step->save();
        parse_str(parse_url(URL::previous(), PHP_URL_QUERY), $arr);
        return redirect($arr['redirect_url']);
    }

    public function copySteps(Request $request)
    {
        $steps = Step::where('product_id', $request->old_product_id)->get();
        $product_id = $request->product_id;
        $data = [];
        foreach ($steps as $k => $step) {
            $data[$k]['title'] = $step->title;
            $data[$k]['body'] = $step->body;
            $data[$k]['product_id'] = $product_id;
            $data[$k]['sort'] = $step->sort;
            $data[$k]['created_at'] = $data[$k]['updated_at'] = now();
        }
        Step::insert($data); // bool
        return redirect(route('admin.product.index'));
    }

    public function destroy(Product $product)
    {
        //
    }
}
