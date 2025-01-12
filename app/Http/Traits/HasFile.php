<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait HasFile
{
    //Main Upload File Method
    public function uploadRequestFile($model, $request, $file_input_name)
    {
        $extension = $request->file($file_input_name)->getClientOriginalExtension();
        $file_name = Str::random(20).md5(microtime()).'.'.$request->file($file_input_name)->getClientOriginalExtension() ;
        Storage::disk('public')->putFileAs($model, $request->file($file_input_name), $file_name);
        return "{$model}/".$file_name;
    }

    //Full image path
    public function getFileUrl($field)
    {
        return url(Storage::disk('public')->url($field));
    }
}
