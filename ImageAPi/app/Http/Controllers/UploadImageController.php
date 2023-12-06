<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $user_image = $request->file('user_image');
        $user_image_url = $user_image->store('public/images/users');
        return response()->json(['message' => $user_image_url]);
    }
    public function getImage(Request $request)
    {
        $image_url = Storage::url($request->url);
        return response()->json(['image_url' => $image_url]);
    }
    public function getParams(Request $request)
    {
        // $name = $request->input('name');
        $data = $request->input('name');
        return response()->json(['data' => [$data]]);
    }
    public function getQuery($name = null)
    {
        return response()->json(['name' => $name]);
    }
}
