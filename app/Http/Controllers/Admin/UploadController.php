<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function check(Request $request)
    {
        $asset = Asset::where('key', $request->key)->first();
        if ($asset) {
            return response()->json([
                'data' => $asset
            ]);
        }
        return response()->json([
            'data' => null
        ]);
    }

    public function upload(Request $request)
    {
        $form_data = json_decode($request->data, true);
        $name = $form_data['name'];
        $shardIndex = $form_data['shardIndex'];
        $shardTotal = $form_data['shardTotal'];
        if ($request->hasFile('shard')) {
//            $path = $request->shard->storeAs('package', $name);
            $path = Storage::append('package/' . $name, $request->shard);
        }
        Asset::create([
            'path' => $path,
            'shard_index' => $shardIndex,
            'shard_size' => $form_data['shardSize'],
            'shard_total' => $shardTotal,
            'name' => $form_data['name'],
            'suffix' => $form_data['suffix'],
            'size' => $form_data['size'],
            'key' => $form_data['key'],
        ]);
    }
}
