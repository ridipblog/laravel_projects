<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CompressImageController extends Controller
{
    public function compressImage(Request $request)
    {
        $image_path = null;
        $image = $request->file('image');
        $file_name = 'uploads/' . time() . '.' . $image->getClientOriginalExtension();
        $image_compress = Image::make($image)->encode($image->getClientOriginalExtension(), 10);
        // $image_compress->save(public_path($file_name));
        Storage::put($file_name, $image_compress);
        return response()->json(['message' => $file_name]);
    }
}
