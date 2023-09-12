<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Upload
{
    function upload($file, $dir)
    {
        $file_name = time() . '_' . $file->getClientOriginalName();
        if (!Storage::disk('public')->exists($dir)) {
            mkdir(storage_path('app/public/' . $dir));
        }
        return $file->storeAs($dir, $file_name, 'public');
    }
}
